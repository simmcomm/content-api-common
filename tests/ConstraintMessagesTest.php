<?php

namespace Flowly\Content\CommonTest;

use Flowly\Content\Request\GetSceneRequest;
use Flowly\Content\Request\GetScenesLandingRequest;
use Flowly\Content\Request\GetScenesRequest;
use Flowly\Content\Request\GetSceneSuggestRequest;
use Flowly\Content\Request\PostRatingRequest;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @author Ivan Pepelko <ivan.pepelko@gmail.com>
 *
 * @covers \Flowly\Content\Request\GetSceneRequest
 * @covers \Flowly\Content\Request\GetScenesLandingRequest
 * @covers \Flowly\Content\Request\GetScenesRequest
 * @covers \Flowly\Content\Request\GetSceneSuggestRequest
 * @covers \Flowly\Content\Request\PostRatingRequest
 * @covers \Flowly\Content\Request\Part\OrderTrait
 * @covers \Flowly\Content\Request\Part\ResolutionTrait
 */
class ConstraintMessagesTest extends TestCase
{
    private ValidatorInterface $validator;

    public function testGetSceneRequest(): void
    {
        $request = new GetSceneRequest('abc');

        $violations = $this->validator->validate($request);

        self::assertCount(1, $violations);
        self::assertSame('Parameter \'id\' must be valid uuid.', $violations[0]->getMessage());
    }

    /**
     * traits are tested here, they do not need to be tested in other tests
     */
    public function testGetScenesLandingRequest(): void
    {
        $request = new GetScenesLandingRequest();

        $request->setBlockSize(-1)
                ->setOrderBy('negative')
                ->setOrderDir('ass')
                ->setVideoResolution(1024)
                ->setImageResolution(1024);

        $violations = $this->validator->validate($request);

        self::assertCount(5, $violations);

        /** @var ConstraintViolationInterface $violation */
        foreach ($violations as $violation) {
            switch ($violation->getPropertyPath()) {
                case 'blockSize':
                    self::assertEquals('Query parameter \'blockSize\' must be positive.', $violation->getMessage());
                    break;
                case 'orderBy':
                    self::assertEquals(
                        'Query parameter \'orderBy\' must be one of "added", "duration", "name", "usage", "rating", \'"negative"\' given.',
                        $violation->getMessage()
                    );
                    break;
                case 'orderDir':
                    self::assertEquals('Query parameter \'orderDir\' must be one of "asc", "desc", \'"ass"\' given.', $violation->getMessage());
                    break;
                case 'videoResolution':
                    self::assertEquals('Query parameter \'videoResolution\' must be one of 1080, 720, 480, 360, \'1024\' given.', $violation->getMessage());
                    break;
                case 'imageResolution':
                    self::assertEquals(
                        'Query parameter \'imageResolution\' must be one of 1080, 720, 640, 480, 360, \'1024\' given.', $violation->getMessage()
                    );
                    break;
                default:
                    throw new RuntimeException("Unexpected property {$violation->getPropertyPath()}");
            }
        }
    }

    public function testGetScenesRequest(): void
    {
        $request = new GetScenesRequest();

        $request->setCategories(['abc', 123])
                ->setCategoriesExclude(['abc', 123])
                ->setActors(['abc', 123])
                ->setOffset(-1)
                ->setLimit(-1);

        $violations = $this->validator->validate($request);

        self::assertCount(5, $violations);

        /** @var ConstraintViolationInterface $violation */
        foreach ($violations as $violation) {
            switch ($violation->getPropertyPath()) {
                case 'categories[0]':
                    self::assertEquals('Query parameter \'categories\' must contain only integer values.', $violation->getMessage());
                    break;
                case 'categoriesExclude[0]':
                    self::assertEquals('Query parameter \'categoriesExclude\' must contain only integer values.', $violation->getMessage());
                    break;
                case 'actors[0]':
                    self::assertEquals('Query parameter \'actors\' must contain only integer values.', $violation->getMessage());
                    break;
                case 'offset':
                    self::assertEquals('Query parameter \'offset\' must be positive or 0.', $violation->getMessage());
                    break;
                case 'limit':
                    self::assertEquals('Query parameter \'limit\' must be positive.', $violation->getMessage());
                    break;
                default:
                    throw new RuntimeException("Unexpected property {$violation->getPropertyPath()}");
            }
        }
    }

    public function testGetSceneSuggestRequest(): void
    {
        $request = new GetSceneSuggestRequest('123');

        $request->setMinCount(-1)->setLimit(-1);

        $violations = $this->validator->validate($request);

        self::assertCount(3, $violations);

        /** @var ConstraintViolationInterface $violation */
        foreach ($violations as $violation) {
            switch ($violation->getPropertyPath()) {
                case 'id':
                    self::assertEquals('Parameter \'id\' must be valid uuid.', $violation->getMessage());
                    break;
                case 'minCount':
                    self::assertEquals('Query parameter \'minCount\' must be positive or 0.', $violation->getMessage());
                    break;
                case 'limit':
                    self::assertEquals('Query parameter \'limit\' must be positive.', $violation->getMessage());
                    break;
                default:
                    throw new RuntimeException("Unexpected property {$violation->getPropertyPath()}");
            }
        }
    }

    public function testPostScenesRatingRequest(): void
    {
        $request = new PostRatingRequest('nothing', '123', '123', 0);

        $violations = $this->validator->validate($request);

        /** @var ConstraintViolationInterface $violation */
        foreach ($violations as $violation) {
            switch ($violation->getPropertyPath()) {
                case 'type':
                    self::assertEquals('Parameter \'type\' must be one of "scene", "actor", \'"nothing"\' given.', $violation->getMessage());
                    break;
                case 'rating':
                    self::assertEquals('Parameter \'rating\' must >= 1.', $violation->getMessage());
                    break;
                default:
                    throw new RuntimeException("Unexpected property {$violation->getPropertyPath()}");
            }
        }

        $request->setRating(6);

        $violations = $this->validator->validate($request);

        /** @var ConstraintViolationInterface $violation */
        foreach ($violations as $violation) {
            if ($violation->getPropertyPath() === 'rating') {
                self::assertEquals('Parameter \'rating\' must be <= 5.', $violation->getMessage());
            }
        }
    }

    protected function setUp(): void
    {
        $this->validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
    }
}
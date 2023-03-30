<?php

namespace Flowly\Content\CommonTest\Request;

use Flowly\Content\Request\GetSceneRequest;
use Flowly\Content\Request\GetScenesLandingRequest;
use Flowly\Content\Request\GetScenesRequest;
use Flowly\Content\Request\GetSceneSuggestRequest;
use Flowly\Content\Request\PostRatingRequest;
use Generator;
use PHPUnit\Framework\TestCase;
use ReflectionException;

class GenericRequestTest extends TestCase
{

    /**
     * @param class-string $class
     * @dataProvider provideRequestClassNames
     * @throws ReflectionException
     *
     * @covers       \Flowly\Content\Request\GetSceneRequest::setId
     *
     * @covers       \Flowly\Content\Request\GetScenesLandingRequest::setBlockSize
     * @covers       \Flowly\Content\Request\GetScenesLandingRequest::setBlacklistedIncluded
     *
     * @covers       \Flowly\Content\Request\GetScenesRequest::setCategories
     * @covers       \Flowly\Content\Request\GetScenesRequest::setCategoriesExclude
     * @covers       \Flowly\Content\Request\GetScenesRequest::setActors
     * @covers       \Flowly\Content\Request\GetScenesRequest::setOffset
     * @covers       \Flowly\Content\Request\GetScenesRequest::setLimit
     * @covers       \Flowly\Content\Request\GetScenesRequest::setRating
     * @covers       \Flowly\Content\Request\GetScenesRequest::setSearch
     *
     * @covers       \Flowly\Content\Request\GetSceneSuggestRequest::setId
     * @covers       \Flowly\Content\Request\GetSceneSuggestRequest::setMinCount
     * @covers       \Flowly\Content\Request\GetSceneSuggestRequest::setLimit
     *
     * @covers       \Flowly\Content\Request\PostRatingRequest::setType
     * @covers       \Flowly\Content\Request\PostRatingRequest::setUserId
     * @covers       \Flowly\Content\Request\PostRatingRequest::setContentId
     * @covers       \Flowly\Content\Request\PostRatingRequest::setRating
     *
     * @covers       \Flowly\Content\Request\Part\LicensorTrait::setLicensor()
     * @covers       \Flowly\Content\Request\Part\LinksTrait::setLinks()
     * @covers       \Flowly\Content\Request\Part\OrderTrait::setOrderBy()
     * @covers       \Flowly\Content\Request\Part\OrderTrait::setOrderDir()
     * @covers       \Flowly\Content\Request\Part\ResolutionTrait::setVideoResolution()
     * @covers       \Flowly\Content\Request\Part\ResolutionTrait::setImageResolution()
     * @covers       \Flowly\Content\Request\Part\TranslatableTrait::setLanguage()
     */
    public function testSettersReturnSelf(string $class): void
    {
        $refl = new \ReflectionClass($class);

        $request = $refl->newInstanceWithoutConstructor();

        foreach ($refl->getMethods() as $method) {
            if (!str_starts_with($method->getName(), 'set')) {
                continue;
            }

            $param = $method->getParameters()[0];

            $returnValue = $method->invoke($request, self::getSampleValue($param->getType()->getName()));

            self::assertSame($request, $returnValue, sprintf('%s:%s', $method->getFileName(), $method->getStartLine()));
        }
    }

    private static function getSampleValue(string $type)
    {
        switch ($type) {
            case 'string':
                return 'sample';
            case 'int':
                return 1;
            case 'float':
                return 1.;
            case 'bool':
                return true;
            case 'array':
                return [1, 2, 3];
        }

        throw new \RuntimeException("Unexpected test type $type");
    }

    public function provideRequestClassNames(): Generator
    {
        yield [GetSceneRequest::class];
        yield [GetScenesLandingRequest::class];
        yield [GetScenesRequest::class];
        yield [GetSceneSuggestRequest::class];
        yield [PostRatingRequest::class];
    }
}

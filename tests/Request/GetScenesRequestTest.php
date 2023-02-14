<?php

namespace Flowly\Content\CommonTest\Request;

use Flowly\Content\Request\GetScenesRequest;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @author Ivan Pepelko <ivan.pepelko@gmail.com>
 * @covers       \Flowly\Content\Request\GetScenesRequest
 */
class GetScenesRequestTest extends TestCase
{

    private const DEFAULTS = [
        'categories' => [],
        'categoriesExclude' => [],
        'actors' => [],
        'offset' => 0,
        'limit' => 25,
        'rating' => '>=1.0 <=10.0',
        'search' => null,
        'language' => null,
        'orderBy' => 'added',
        'orderDir' => 'desc',
        'links' => false,
        'videoResolution' => 1080,
        'imageResolution' => 1080,
        'licensor' => null,
    ];

    /**
     * @dataProvider provideCases
     *
     * @param GetScenesRequest $request
     * @param array            $expected
     */
    public function testToArray(GetScenesRequest $request, array $expected): void
    {
        self::assertSame($expected, $request->toArray());
    }

    public function provideCases(): Generator
    {
        yield [new GetScenesRequest(), self::DEFAULTS];

        $r = new GetScenesRequest();
        $r->setRating('>=1.0 <=4');
        yield [$r, array_merge(self::DEFAULTS, ['rating' => $r->getRating()])];
    }

    public function testGetSetCategories(): void
    {
        $r = new GetScenesRequest();

        $r->setCategories([1,2,3]);

        self::assertSame([1,2,3],$r->getCategories());
    }

    public function testGetSetCategoriesExclude(): void
    {
        $r = new GetScenesRequest();

        $r->setCategoriesExclude([1,2,3]);

        self::assertSame([1,2,3], $r->getCategoriesExclude());
    }

    public function testGetSetActors(): void
    {
        $r = new GetScenesRequest();

        $r ->setActors([1,2,3]);

        self::assertSame([1,2,3], $r->getActors());
    }

    public function testGetSetOffset(): void
    {
        $r = new GetScenesRequest();

        $r->setOffset(0);

        self::assertIsInt(0, $r->getOffset());
    }

    public function testGetSetLimit(): void
    {
        $r = new GetScenesRequest();

        $r ->setLimit(25);

        self::assertSame(25, $r->getLimit());
    }

    public function testGetSetRating(): void
    {
        $r = new GetScenesRequest();

        $r -> setRating('>=1.0 <=10.0');

        self::assertSame('>=1.0 <=10.0', $r->getRating());
    }

    public function testGetSetLicensor(): void
    {
        $r = new GetScenesRequest();

        $r->setLicensor(null);

        self::assertNull($r->getLicensor());
    }

	public function testGetSetLanguage(): void
	{
		$r = new GetScenesRequest();
		$r->setLanguage('de');
		self::assertSame('de', $r->getLanguage());
	}
}

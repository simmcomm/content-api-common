<?php

namespace Flowly\Content\CommonTest\Request;

use Flowly\Content\Request\GetScenesRequest;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @author Ivan Pepelko <ivan.pepelko@gmail.com>
 */
class GetScenesRequestTest extends TestCase
{

    private const DEFAULTS = [
        'categories'        => [],
        'categoriesExclude' => [],
        'actors'            => [],
        'offset'            => 0,
        'limit'             => 25,
        'rating'            => '>=1.0 <=10.0',
        'orderBy'           => 'added',
        'orderDir'          => 'desc',
        'links'             => false,
        'videoResolution'   => 1080,
        'imageResolution'   => 1080,
        'licensor'          => null,
    ];

    /**
     * @dataProvider provideCases
     * @covers       \Flowly\Content\Request\GetScenesRequest
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
}

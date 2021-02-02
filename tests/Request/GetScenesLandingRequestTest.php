<?php

namespace Flowly\Content\CommonTest\Request;

use Flowly\Content\Request\GetScenesLandingRequest;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @author Ivan Pepelko <ivan.pepelko@gmail.com>
 */
class GetScenesLandingRequestTest extends TestCase
{
    private const DEFAULTS = [
        'blockSize'       => 25,
        'orderBy'         => 'added',
        'orderDir'        => 'desc',
        'links'           => false,
        'videoResolution' => 1080,
        'imageResolution' => 1080,
        'licensor'        => null,
    ];

    /**
     * @dataProvider provideCases
     * @covers       \Flowly\Content\Request\GetScenesLandingRequest::toArray()
     *
     * @param GetScenesLandingRequest $request
     * @param array                   $expected
     */
    public function testToArray(GetScenesLandingRequest $request, array $expected): void
    {
        self::assertSame($expected, $request->toArray());
    }

    public function provideCases(): Generator
    {
        yield [new GetScenesLandingRequest(), self::DEFAULTS];

        $r = new GetScenesLandingRequest();
        $r->setLinks(true);
        yield [$r, array_merge(self::DEFAULTS, ['links' => $r->isLinks()])];
    }

}

<?php

namespace Flowly\Content\CommonTest\Request;

use Flowly\Content\Request\GetSceneRequest;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class GetSceneRequestTest
 * @covers \Flowly\Content\Request\GetSceneRequest
 */
class GetSceneRequestTest extends TestCase
{
    private const ID = '9fe133b0-daf3-49ab-a1db-dec10d038458';

    private const DEFAULTS = [

        'imageResolution' => 1080,
        'videoResolution' => 1080
    ];

    /**
     * @dataProvider provideCases
     *
     * @param GetSceneRequest $request
     * @param array $expected
     */

    public function testToArray(GetSceneRequest $request, array $expected): void
    {
        self::assertArrayNotHasKey('id', $expected);
        self::assertSame(self::ID, $request->getId());
        self::assertSame($expected, $request->toArray());
    }

    public function provideCases(): Generator
    {
        yield [new GetSceneRequest(self::ID), self::DEFAULTS];

        $r = new GetSceneRequest(self::ID);
        $r->setImageResolution(1080);
        yield [$r, array_merge(self::DEFAULTS, ['imageResolution' => $r->getImageResolution()])];
    }

    public function testGetSetId(): void
    {
        $r = new GetSceneRequest('9fe133b0-daf3-49ab-a1db-dec10d038458');
        $r->setId('9fe133b0-daf3-49ab-a1db-dec10d038458');
        self::assertSame('9fe133b0-daf3-49ab-a1db-dec10d038458', $r->getId());
    }

    public function testGetSetImageResolution(): void
    {
        $r = new GetSceneRequest('9fe133b0-daf3-49ab-a1db-dec10d038458');

        $r->setImageResolution(1080);

        self::assertSame(1080, $r->getImageResolution());
    }

    public function testGetSetVideoResolution(): void
    {
        $r = new GetSceneRequest('9fe133b0-daf3-49ab-a1db-dec10d038458');

        $r->setVideoResolution(1080);

        self::assertSame(1080, $r->getVideoResolution());
    }
}
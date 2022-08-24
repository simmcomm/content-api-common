<?php

namespace Flowly\Content\CommonTest\Request;

use Flowly\Content\Request\GetSceneSuggestRequest;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @author Ivan Pepelko <ivan.pepelko@gmail.com>
 * @covers       \Flowly\Content\Request\GetSceneSuggestRequest
 */
class GetSceneSuggestRequestTest extends TestCase
{
    private const ID = '6e3410f5-f698-488f-87a5-79eba974e756';

    private const DEFAULTS = [
        'minCount' => 0,
        'limit' => 25,
        'orderBy' => 'added',
        'orderDir' => 'desc',
        'links' => false,
        'videoResolution' => 1080,
        'imageResolution' => 1080,
    ];

    /**
     * @dataProvider provideCases
     *
     * @param GetSceneSuggestRequest $request
     * @param array $expected
     */
    public function testToArray(GetSceneSuggestRequest $request, array $expected): void
    {
        self::assertArrayNotHasKey('id', $expected);
        self::assertSame(self::ID, $request->getId());
        self::assertSame($expected, $request->toArray());
    }

    public function provideCases(): Generator
    {
        yield [new GetSceneSuggestRequest(self::ID), self::DEFAULTS];

        $r = new GetSceneSuggestRequest(self::ID);
        $r->setLimit(128);
        yield [$r, array_merge(self::DEFAULTS, ['limit' => $r->getLimit()])];
    }

    public function testGetSetId(): void
    {
        $r = new GetSceneSuggestRequest('6e3410f5-f698-488f-87a5-79eba974e756');

        $r->setId('6e3410f5-f698-488f-87a5-79eba974e756');

        self::assertSame('6e3410f5-f698-488f-87a5-79eba974e756', $r->getId());
    }

    public function testGetSetMinCount(): void
    {
        $r = new GetSceneSuggestRequest('6e3410f5-f698-488f-87a5-79eba974e756');

        $r->setMinCount(0);

        self::assertSame(0, $r->getMinCount());
    }

    public function testGetSetLimit(): void
    {
        $r = new GetSceneSuggestRequest('6e3410f5-f698-488f-87a5-79eba974e756');

        $r->setLimit(25);

        self::assertSame(25,$r->getLimit());
    }

    public function testGetSetOrderBy(): void
    {
        $r = new GetSceneSuggestRequest('6e3410f5-f698-488f-87a5-79eba974e756');

        $r ->setOrderBy('added');

        self::assertIsString('added', $r->getOrderBy());
    }

    public function testGetSetOrderDir(): void
    {
        $r = new GetSceneSuggestRequest('6e3410f5-f698-488f-87a5-79eba974e756');

        $r-> setOrderDir('desc');

        self::assertIsString('desc', $r->getOrderDir());
    }

    public function testIsSetLinks(): void
    {
        $r = new GetSceneSuggestRequest('6e3410f5-f698-488f-87a5-79eba974e756');
        $r -> setLinks('false');

        self::assertIsNotBool('false', $r->isLinks());
    }

}

<?php

namespace Flowly\Content\CommonTest\Request;

use Flowly\Content\Request\GetSceneSuggestRequest;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @author Ivan Pepelko <ivan.pepelko@gmail.com>
 */
class GetSceneSuggestRequestTest extends TestCase
{
    private const ID = '6e3410f5-f698-488f-87a5-79eba974e756';

    private const DEFAULTS = [
        'minCount' => 0,
        'limit'    => 25,
        'orderBy'  => 'added',
        'orderDir' => 'desc',
        'links'    => false,
    ];

    /**
     * @dataProvider provideCases
     *
     * @param GetSceneSuggestRequest $request
     * @param array                  $expected
     */
    public function testToArray(GetSceneSuggestRequest $request, array $expected)
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
}

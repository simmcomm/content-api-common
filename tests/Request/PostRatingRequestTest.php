<?php

namespace Flowly\Content\CommonTest\Request;

use Flowly\Content\Request\PostRatingRequest;
use PHPUnit\Framework\TestCase;

/**
 * @covers       \Flowly\Content\Request\PostRatingRequest
 */
class PostRatingRequestTest extends TestCase
{

    public function testGetSetType(): void
    {
        $r = new PostRatingRequest('1', '2','3', 2);
        $r->setType('1');

        self::assertSame('1', $r->getType());
    }

    public function testGetSetUserId(): void
    {
        $r = new PostRatingRequest('1','2','3', 2);
        $r ->setUserId('2');
        self::assertSame('2', $r->getUserId());
    }

    public function testGetSetContentId(): void
    {
        $r = new PostRatingRequest('1', '2', '3', 2);
        $r -> setContentId('3');
        self::assertSame('3', $r->getContentId());
    }

    public function testGetSetRating(): void
    {
        $r = new PostRatingRequest('1', '2', '3', 2);
        $r ->setRating(2);
        self::assertSame(2, $r->getRating());
    }
}
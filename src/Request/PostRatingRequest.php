<?php

namespace Flowly\Content\Request;

use Symfony\Component\Validator\Constraints as Assert;

class PostRatingRequest
{
    /**
     * @var string
     * @Assert\Choice({"scene", "actor"})
     */
    private string $type;

    private string $userId;

    private string $contentId;

    /**
     * @var int
     * @Assert\GreaterThanOrEqual(1)
     * @Assert\LessThanOrEqual(5)
     */
    private int $rating;

    public function __construct(string $type, string $userId, string $contentId, int $rating)
    {
        $this->type = $type;
        $this->userId = $userId;
        $this->contentId = $contentId;
        $this->rating = $rating;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return PostRatingRequest
     */
    public function setType(string $type): PostRatingRequest
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     *
     * @return PostRatingRequest
     */
    public function setUserId(string $userId): PostRatingRequest
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string
     */
    public function getContentId(): string
    {
        return $this->contentId;
    }

    /**
     * @param string $contentId
     *
     * @return PostRatingRequest
     */
    public function setContentId(string $contentId): PostRatingRequest
    {
        $this->contentId = $contentId;

        return $this;
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     *
     * @return PostRatingRequest
     */
    public function setRating(int $rating): PostRatingRequest
    {
        $this->rating = $rating;

        return $this;
    }

}

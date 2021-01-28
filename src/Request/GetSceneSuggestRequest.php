<?php

namespace Flowly\Content\Request;

use Flowly\Content\Request\Part\LinksTrait;
use Flowly\Content\Request\Part\OrderTrait;
use Symfony\Component\Validator\Constraints as Assert;

class GetSceneSuggestRequest
{
    use OrderTrait;
    use LinksTrait;

    /**
     * @var string
     * @Assert\Uuid()
     */
    private string $id;

    /**
     * @var int
     * @Assert\PositiveOrZero()
     */
    private int $minCount = 0;

    /**
     * @var int
     * @Assert\Positive()
     */
    private int $limit;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return GetSceneSuggestRequest
     */
    public function setId(string $id): GetSceneSuggestRequest
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinCount(): int
    {
        return $this->minCount;
    }

    /**
     * @param int $minCount
     *
     * @return GetSceneSuggestRequest
     */
    public function setMinCount(int $minCount): GetSceneSuggestRequest
    {
        $this->minCount = $minCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     *
     * @return GetSceneSuggestRequest
     */
    public function setLimit(int $limit): GetSceneSuggestRequest
    {
        $this->limit = $limit;

        return $this;
    }

    public function toArray(): array
    {
        $keys = array_filter(get_class_vars($this), static fn(string $k) => $k !== 'id');

        return array_combine($keys, array_map(fn(string $k) => $this->$k, $keys));
    }
}

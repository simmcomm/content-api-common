<?php

namespace Flowly\Content\Request;

use Flowly\Content\Request\Part\LinksTrait;
use Flowly\Content\Request\Part\OrderTrait;
use Flowly\Content\Request\Part\ResolutionTrait;
use Symfony\Component\Validator\Constraints as Assert;

class GetSceneSuggestRequest
{
    use OrderTrait;
    use LinksTrait;
    use ResolutionTrait;

    /**
     * @var string
     * @Assert\Uuid(message="Parameter 'id' must be valid uuid.")
     */
    private string $id;

    /**
     * @var int
     * @Assert\PositiveOrZero(message="Query parameter 'minCount' must be positive or 0.")
     */
    private int $minCount = 0;

    /**
     * @var int
     * @Assert\Positive(message="Query parameter 'limit' must be positive.")
     */
    private int $limit = 25;

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
        $keys = array_filter(array_keys(get_class_vars(self::class)), static fn(string $k) => $k !== 'id');

        return array_combine($keys, array_map(fn(string $k) => $this->$k, $keys));
    }
}

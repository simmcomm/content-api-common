<?php

namespace Flowly\Content\Request;

use Flowly\Content\Request\Part\LicensorTrait;
use Flowly\Content\Request\Part\LinksTrait;
use Flowly\Content\Request\Part\OrderTrait;
use Flowly\Content\Request\Part\ResolutionTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Ivan Pepelko <ivan.pepelko@gmail.com>
 */
class GetScenesRequest
{
    use OrderTrait;
    use LinksTrait;
    use ResolutionTrait;
    use LicensorTrait;

    /**
     * @var int[]
     * @Assert\All({
     *     @Assert\Type("int", message="Query parameter 'categories' must contain only integer values.")
     * })
     */
    private array $categories = [];

    /**
     * @var int[]
     * @Assert\All({
     *     @Assert\Type("int", message="Query parameter 'categoriesExclude' must contain only integer values.")
     * })
     */
    private array $categoriesExclude = [];

    /**
     * @var int[]
     * @Assert\All({
     *     @Assert\Type("int", message="Query parameter 'actors' must contain only integer values.")
     * })
     */
    private array $actors = [];

    /**
     * @var int
     * @Assert\PositiveOrZero(message="Query parameter 'offset' must be positive or 0.")
     */
    private int $offset = 0;

    /**
     * @var int
     * @Assert\Positive(message="Query parameter 'limit' must be positive.")
     */
    private int $limit = 25;

    /**
     * @var string
     */
    private string $rating = '>=1.0 <=10.0';

    /**
     * @var string|null
     */
    private ?string $search = null;

	/**
	 * @var string|null
	 */
	private ?string $language = null;

    /**
     * @return int[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param int[] $categories
     *
     * @return GetScenesRequest
     */
    public function setCategories(array $categories): GetScenesRequest
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getCategoriesExclude(): array
    {
        return $this->categoriesExclude;
    }

    /**
     * @param int[] $categoriesExclude
     *
     * @return GetScenesRequest
     */
    public function setCategoriesExclude(array $categoriesExclude): GetScenesRequest
    {
        $this->categoriesExclude = $categoriesExclude;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getActors(): array
    {
        return $this->actors;
    }

    /**
     * @param int[] $actors
     *
     * @return GetScenesRequest
     */
    public function setActors(array $actors): GetScenesRequest
    {
        $this->actors = $actors;

        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     *
     * @return GetScenesRequest
     */
    public function setOffset(int $offset): GetScenesRequest
    {
        $this->offset = $offset;

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
     * @return GetScenesRequest
     */
    public function setLimit(int $limit): GetScenesRequest
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @return string
     */
    public function getRating(): string
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     *
     * @return GetScenesRequest
     */
    public function setRating(string $rating): GetScenesRequest
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSearch(): ?string
    {
        return $this->search;
    }

    /**
     * @param string|null $search
     */
    public function setSearch(?string $search): void
    {
        $this->search = $search;
    }

	/**
	 * @return string|null
	 */
	public function getLanguage(): ?string
	{
		return $this->language;
	}

	/**
	 * @param string|null $language
	 */
	public function setLanguage(?string $language): void
	{
		$this->language = $language;
	}

    public function toArray(): array
    {
        $keys = array_keys(get_class_vars(self::class));

        return array_combine($keys, array_map(fn (string $k) => $this->$k, $keys));
    }
}

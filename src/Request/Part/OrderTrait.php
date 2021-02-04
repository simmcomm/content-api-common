<?php

namespace Flowly\Content\Request\Part;

use Flowly\Content\Request\Constants;
use Symfony\Component\Validator\Constraints as Assert;

trait OrderTrait
{
    /**
     * @var string
     * @Assert\Choice(choices=Constants::ORDER_BY_FIELDS, message="Query parameter 'orderBy' must be one of {{ choices }}, '{{ value }}' given.")
     */
    private string $orderBy = 'added';

    /**
     * @var string
     * @Assert\Choice(choices={"asc", "desc"}, message="Query parameter 'orderDir' must be one of {{ choices }}, '{{ value }}' given.")
     */
    private string $orderDir = 'desc';

    /**
     * @return string
     */
    public function getOrderBy(): string
    {
        return $this->orderBy;
    }

    /**
     * @param string $orderBy
     *
     * @return static
     */
    public function setOrderBy(string $orderBy)
    {
        $this->orderBy = $orderBy;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderDir(): string
    {
        return $this->orderDir;
    }

    /**
     * @param string $orderDir
     *
     * @return static
     */
    public function setOrderDir(string $orderDir)
    {
        $this->orderDir = $orderDir;

        return $this;
    }
}

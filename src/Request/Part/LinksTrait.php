<?php

namespace Flowly\Content\Request\Part;

trait LinksTrait
{

    private bool $links = false;

    /**
     * @return bool
     */
    public function isLinks(): bool
    {
        return $this->links;
    }

    /**
     * @param bool $links
     *
     * @return static
     */
    public function setLinks(bool $links)
    {
        $this->links = $links;

        return $this;
    }
}

<?php

namespace Flowly\Content\Request\Part;

trait LicensorTrait
{
    /**
     * @var string|null
     */
    private ?string $licensor = null;

    /**
     * @return string|null
     */
    public function getLicensor(): ?string
    {
        return $this->licensor;
    }

    /**
     * @param string|null $licensor
     *
     * @return static
     */
    public function setLicensor(?string $licensor)
    {
        $this->licensor = $licensor;

        return $this;
    }
}

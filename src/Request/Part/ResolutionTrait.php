<?php

namespace Flowly\Content\Request\Part;

use Flowly\Content\Request\Constants;
use Symfony\Component\Validator\Constraints as Assert;

trait ResolutionTrait
{
    /**
     * @var int
     * @Assert\Choice(choices=Constants::VIDEO_RESOLUTIONS)
     */
    private int $videoResolution = Constants::VIDEO_RESOLUTIONS[0];

    /**
     * @var int
     * @Assert\Choice(choices=Constants::IMAGE_RESOLUTIONS)
     */
    private int $imageResolution = Constants::IMAGE_RESOLUTIONS[0];

    /**
     * @return int
     */
    public function getVideoResolution(): int
    {
        return $this->videoResolution;
    }

    /**
     * @param int $videoResolution
     *
     * @return static
     */
    public function setVideoResolution(int $videoResolution)
    {
        $this->videoResolution = $videoResolution;

        return $this;
    }

    /**
     * @return int
     */
    public function getImageResolution(): int
    {
        return $this->imageResolution;
    }

    /**
     * @param int $imageResolution
     *
     * @return static
     */
    public function setImageResolution(int $imageResolution)
    {
        $this->imageResolution = $imageResolution;

        return $this;
    }
}

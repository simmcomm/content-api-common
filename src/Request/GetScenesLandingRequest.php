<?php

namespace Flowly\Content\Request;

use Flowly\Content\Request\Part\LicensorTrait;
use Flowly\Content\Request\Part\LinksTrait;
use Flowly\Content\Request\Part\OrderTrait;
use Flowly\Content\Request\Part\ResolutionTrait;
use Symfony\Component\Validator\Constraints as Assert;

class GetScenesLandingRequest
{
    use OrderTrait;
    use LinksTrait;
    use ResolutionTrait;
    use LicensorTrait;

    /**
     * @var int
     * @Assert\Positive()
     */
    private int $blockSize = 25;

    /**
     * @return int
     */
    public function getBlockSize(): int
    {
        return $this->blockSize;
    }

    /**
     * @param int $blockSize
     *
     * @return GetScenesLandingRequest
     */
    public function setBlockSize(int $blockSize): GetScenesLandingRequest
    {
        $this->blockSize = $blockSize;

        return $this;
    }

    public function toArray(): array
    {
        $keys = get_class_vars($this);

        return array_combine($keys, array_map(fn(string $k) => $this->$k, $keys));
    }
}

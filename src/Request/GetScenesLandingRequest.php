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
     * @Assert\Positive(message="Query parameter 'blockSize' must be positive.")
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
        $keys = array_keys(get_class_vars(self::class));

        return array_combine($keys, array_map(fn(string $k) => $this->$k, $keys));
    }
}

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
     * @Assert\Range(
     *     min = 1,
     *     max = 30,
     *     notInRangeMessage = "Query parameter 'blockSize' must be in range from {{ min }} to {{ max }}",
     * )
     */
    private int $blockSize = 25;

    private bool $blacklistedIncluded = false;

    public function getBlockSize(): int
    {
        return $this->blockSize;
    }

    public function setBlockSize(int $blockSize): GetScenesLandingRequest
    {
        $this->blockSize = $blockSize;

        return $this;
    }

    public function isBlacklistedIncluded(): bool
    {
        return $this->blacklistedIncluded;
    }

    public function setBlacklistedIncluded(bool $blacklistedIncluded): void
    {
        $this->blacklistedIncluded = $blacklistedIncluded;
    }

    public function toArray(): array
    {
        $keys = array_keys(get_class_vars(self::class));

        return array_combine($keys, array_map(fn (string $k) => $this->$k, $keys));
    }
}

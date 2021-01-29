<?php

namespace Flowly\Content\Request;

use Flowly\Content\Request\Part\ResolutionTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Ivan Pepelko <ivan.pepelko@gmail.com>
 */
class GetSceneRequest
{
    use ResolutionTrait;

    /**
     * @var string
     * @Assert\Uuid()
     */
    private string $id;

    public function __construct(string $id) { $this->id = $id; }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function toArray(): array
    {
        return [
            'imageResolution' => $this->getImageResolution(),
            'videoResolution' => $this->getVideoResolution(),
        ];
    }
}

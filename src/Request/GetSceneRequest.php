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
     * @Assert\Uuid(message="Parameter 'id' must be valid uuid.")
     */
    private string $id;

	/**
	 * @var string|null
	 */
	private ?string $language = null;

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
        return [
            'imageResolution' => $this->getImageResolution(),
            'videoResolution' => $this->getVideoResolution(),
        ];
    }
}

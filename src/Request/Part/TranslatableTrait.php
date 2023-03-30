<?php

namespace Flowly\Content\Request\Part;

trait TranslatableTrait
{
	/**
	 * @var string|null
	 */
	private ?string $language = null;

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
    public function setLanguage(?string $language)
    {
        $this->language = $language;

        return $this;
    }
}

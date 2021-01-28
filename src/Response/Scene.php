<?php

namespace Flowly\Content\Response;

/**
 * @author Ivan Pepelko <ivan.pepelko@gmail.com>
 */
class Scene
{
    public string $id;

    public int $orientation;

    public string $name;

    public string $description;

    public string $added;

    public int $duration;

    public int $hits;

    public float $rating;

    public string $contentRating;

    public string $cover;

    public array $categories;

    public array $actors;

    public array $thumbnails;

    public Videos $videos;

}
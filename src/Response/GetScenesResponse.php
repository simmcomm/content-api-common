<?php

namespace Flowly\Content\Response;

/**
 * @author Ivan Pepelko <ivan.pepelko@gmail.com>
 */
class GetScenesResponse
{
    public ?string $error = null;

    public int $count = 0;

    /** @var Scene[]|string[] */
    public array $scenes = [];

}
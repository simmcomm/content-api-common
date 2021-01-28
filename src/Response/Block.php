<?php

namespace Flowly\Content\Response;

class Block
{
    public string $description;

    /** @var Scene[]|string[] */
    public array $scenes = [];
}
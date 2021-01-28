<?php

namespace Flowly\Content\Response;

class GetSceneResponse
{
    public ?string $error = null;

    public int $count = 0;

    /** @var Scene */
    public Scene $scene;
}
<?php

namespace Flowly\Content\Response;

class GetSceneResponse
{
    public ?string $error = null;

    /** @var Scene */
    public Scene $scene;
}
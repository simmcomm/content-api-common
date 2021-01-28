<?php

namespace Flowly\Content\Response;

class GetScenesLandingResponse
{
    public ?string $error = null;

    /** @var Block[] */
    public array $blocks = [];
}
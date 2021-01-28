<?php

namespace Flowly\Content\Response;

class GetActorsResponse
{
    public ?string $error = null;

    /** @var Descriptor[] */
    public array $actors = [];
}

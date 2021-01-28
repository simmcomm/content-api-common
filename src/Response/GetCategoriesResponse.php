<?php

namespace Flowly\Content\Response;

class GetCategoriesResponse
{
    public ?string $error = null;

    /** @var Descriptor[] */
    public array $categories = [];
}

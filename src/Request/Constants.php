<?php

namespace Flowly\Content\Request;

final class Constants
{
    public const IMAGE_RESOLUTIONS = [1080, 720, 640, 480, 360];
    public const VIDEO_RESOLUTIONS = [1080, 720, 480, 360];

    public const ORDER_DIR_DEFAULTS = [
        'added'    => 'desc',
        'duration' => 'desc',
        'name'     => 'asc',
        'usage'    => 'usage',
        'rating'   => 'rating',
    ];

    public const ORDER_BY_FIELDS = ['added', 'duration', 'name', 'usage', 'rating'];

    private function __construct() { }
}

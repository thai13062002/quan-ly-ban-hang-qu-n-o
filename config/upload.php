<?php

return [
    'disk' => env('IMAGE_DISK', 'upload'),

    'path_origin_image' => 'originals',

    'maximum_upload' => (int)env('IMAGE_MAXIMUM_UPLOAD', 5120),
];

<?php

namespace App\Helpers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class FileHelper
{
    /**
     * Full Path Not Domain
     *
     * @param $path
     * @return null|string
     */
    public static function fullPathNotDomain($path): ?string
    {
        if (!$path) {
            return '';
        }//end if

        $urlParsed = parse_url($path);
        $urlParsed['path'] = trim($urlParsed['path'] ?? '', '/');

        return str_replace('storage/upload/', '', $urlParsed['path']);
    }

    /**
     * Get Full Url
     *
     * @param $path
     * @return null|string
     */
    public static function getFullUrl($path): ?string
    {
        if (!$path) {
            return null;
        }//end if

        $newPath = strstr($path, config('upload.path_origin_image'));

        return self::storageImages()->url($newPath);
    }

    /**
     * Storage Images
     *
     * @return Filesystem
     */
    public static function storageImages(): Filesystem
    {
        $diskName = config('upload.disk');

        return Storage::disk($diskName);
    }
}

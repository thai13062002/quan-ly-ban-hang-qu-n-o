<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class FileService extends Service
{

    /**
     * uploadImage
     *
     * @param $data
     *
     * @return $path
     */

    public function uploadFile($data)
    {
        $file = $data['image'];
        $filename = time() . '_' . $file->getClientOriginalName();
        Image::make($file)->encode('webp', 90)->resize(270, 250)->save(storage_path('app/public/images/' . $filename . '.webp'));
        $path = 'storage/images/' . $filename . '.webp';
        
        return $path;
    }

    /**
     * deleteImage
     *
     * @param $path
     */

    public function deleteFile($path)
    {
        $path = str_replace('storage', 'public', $path);
        if (Storage::exists($path)) {
            Storage::delete($path);
        } else {
            return abort(404);
        }
    }
}

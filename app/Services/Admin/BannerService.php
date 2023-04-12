<?php

namespace App\Services\Admin;

use App\Models\Banner;
use App\Services\FileService;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;


class BannerService extends Service
{
    /**
     * Get List Banners
     *
     * @return Builder[]|Collection
     */
    public function getListBanners(): Collection|array
    {
        return Banner::query()
            ->select(['id', 'title', 'image', 'link', 'status'])
            ->get();
    }




    /**
     * Create
     *
     * @param $request
     */
    public function create($data)
    {
        $data['image'] = FileService::getInstance()->uploadFile($data);
        Banner::create($data);
    }


    /**
     * Edit
     *
     * @param $id
     * 
     * @return $banner
     */
    public function edit($id)
    {
        $banner = Banner::where('id', $id)->first();
        if (!$banner) {
            abort(404);
        }

        return $banner;
    }
    /**
     * Create
     *
     * @param $request
     */
    public function update($id, $data)
    {
        $banner = Banner::query()->where('id', $id)->first();
        if (!$banner) {
            abort(404);
        }

        if (isset($data['image'])) {
            $data['image'] = FileService::getInstance()->uploadFile($data);
        } 

        $banner->update([
            'image' => isset($data['image']) ? $data['image'] : $banner['image'],
            'title' => $data['title'],
            'link' => $data['link'],
            'status' => isset($data['status']) ? 1 : 0,
        ]);
    }

    /**
     * Delete
     *
     * @param $id
     */
    public function delete($id)
    {
        $banner = Banner::where('id', $id)->first();
        if (!$banner) {
            abort(404);
        }
        DB::beginTransaction();
        try {
            FileService::getInstance()->deleteFile($banner->image);
            $banner->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}

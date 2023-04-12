<?php

namespace App\Services\User;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class HomeService extends Service
{
    /**
     * Get List Banners
     *
     * @return Builder[]|Collection
     */
    public function getListBanners(): Collection|array
    {
        return Banner::query()
            ->where('status','=', 1)
            ->select('id', 'title', 'image', 'link')
            ->get();
    }

    /**
     * Get List Product Newest
     *
     * @return Builder[]|Collection
     */
    public function getListProducts(): Collection|array
    {
        return Product::query()
            ->where('status','=', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
    }

    /**
     * Get List Product Newest
     *
     * @return Builder[]|Collection
     */
    public function getListNewProducts(): Collection|array
    {
        return Product::query()
            ->where('status','=', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
    }

    /**
     * Get List Product Newest
     *
     * @return Builder[]|Collection
     */
    public function getListSizes(): Collection|array
    {
        return DB::table('sizes')->get();
    }

     /**
     * Get List Product Newest
     *
     * @return Builder[]|Collection
     */
    public function getListColors()
    {
        return DB::table('colors')->get();
    }

    /**
     * Get List Product Newest
     *
     * @return Builder[]|Collection
     */
    public function getListCategories()
    {
        return DB::table('categories')->get();
    }
}

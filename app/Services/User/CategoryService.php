<?php

namespace App\Services\User;

use App\Models\Category;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CategoryService extends Service
{
    /**
     * Get List Banners
     *
     * @return Builder[]|Collection
     */
    public function getListCategories(): Collection|array
    {
        return Category::query()
            ->select(['id','name','slug','parent_id'])
            ->get();
    }
}

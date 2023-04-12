<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Size;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SizeService extends Service
{
    /**
     * Get List Category in select option
     *
     * @return Builder[]|Collection
     */
    public function getListSizes(): Collection|array
    {
        return Size::query()
            ->select(['id', 'name'])
            ->get();
    }
}

<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Models\Color;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ColorService extends Service
{
    /**
     * Get List Category in select option
     *
     * @return Builder[]|Collection
     */
    public function getListColors(): Collection|array
    {
        return Color::query()
            ->select(['id', 'name'])
            ->get();
    }
}

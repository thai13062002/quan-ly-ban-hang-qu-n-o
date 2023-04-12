<?php

namespace App\Services\User;

use App\Models\Supplier;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SupplierService extends Service
{
    /**
     * Get List Banners
     *
     * @return Builder[]|Collection
     */
    public function getListSuppliers(): Collection|array
    {
        return Supplier::query()
            ->select(['id','name'])
            ->get();
    }
}

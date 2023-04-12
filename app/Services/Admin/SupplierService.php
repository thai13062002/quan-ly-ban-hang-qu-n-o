<?php

namespace App\Services\Admin;

use App\Models\Supplier;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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
            ->select(['id', 'name', 'phone', 'email', 'address', 'status'])
            ->get();
    }


    /**
     * Create
     *
     * @param $request
     */
    public function create($data)
    {
        Supplier::query()->create($data);
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
        $supplier = Supplier::query()->where('id', $id)->first();
        if (!$supplier) {

            abort(404);
        }

        return $supplier;
    }
    /**
     * Create
     *
     * @param $request
     */
    public function update($id, $data)
    {
        $supplier = Supplier::query()->where('id', $id)->first();
        if (!$supplier) {
            abort(404);
        }

        $supplier->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
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
        $supplier = Supplier::query()->where('id', $id)->first();
        if (!$supplier) {
            abort(404);
        }

        $supplier->delete();
    }
}

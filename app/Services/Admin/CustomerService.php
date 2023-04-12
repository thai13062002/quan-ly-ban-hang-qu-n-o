<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CustomerService extends Service
{
    /**
     * Get List Customers
     *
     * @return Builder[]|Collection
     */
    public function getListCustomers(): Collection|array
    {
        return User::query()
            ->with(['userAddress','userAddress.ward','userAddress.district','userAddress.province'])
            ->select(['id', 'name','email'])
            ->get();
    }

    /**
     * Delete
     *
     * @param $id
     */
    public function delete($id)
    {
        $customer = User::query()->where('id', $id)->first();
        if (!$customer) {
            abort(404);
        }//end if

        $customer->delete();
    }
}

<?php

namespace App\Services\Admin;

use App\Models\Order;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class OrderService extends Service
{
    /**
     * Get List Banners
     *
     * @return Builder[]|Collection
     */
    public function getListOrders(): Collection|array
    {
        return Order::query()
            ->with(['user','user.userAddress.ward','user.userAddress.district','user.userAddress.province'])
            ->select(['id', 'user_id', 'payment', 'total'])
            ->get();
    }

    
    /**
     * Show detail order
     *
     * @param $id
     */
    public function show($id)
    {
        $order = Order::query()
        ->with(['orderDetails','orderDetails.productVariation.product','orderDetails.productVariation.size','orderDetails.productVariation.color'])
        ->where('id', $id)->first();
        if (!$order) {
            abort(404);
        }//end if

        return $order;
    }
}

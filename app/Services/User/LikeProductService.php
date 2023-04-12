<?php

namespace App\Services\User;

use App\Models\LikeProduct;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class LikeProductService extends Service
{
    /**
     * Get List Banners
     *
     * @return Builder[]|Collection
     */
    public function getListLikeProducts($id)
    {
        return LikeProduct::query()
            ->select(['id', 'user_id', 'product_id'])
            ->with(['product'])
            ->where('user_id', $id)
            ->get();
    }

    public function destroy($user_id, $id)
    {
        $cart = LikeProduct::query()->where('user_id', $user_id)->where('id', $id)->first();
        if (!$cart) {
            abort(404);
        } //end if

        $cart->delete();
    }
}

<?php

namespace App\Services\User;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CartService extends Service
{
    /**
     * Get List Banners
     *
     * @return Builder[]|Collection
     */
    public function getListCarts($id)
    {
        return Cart::query()
            ->select(['id', 'user_id', 'product_variation_id', 'quantity'])
            ->with('productVariation', 'productVariation.product', 'productVariation.color', 'productVariation.size')
            ->where('user_id', $id)
            ->get();
    }
    public function store($user_id, $data, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (!$product) {
            abort(404);
        }
        $product_id = $product->id;
        $productVariation = ProductVariation::where('product_id', $product_id)->where('color_id', $data['color'])->where('size_id', $data['size'])->first();
        if (!$productVariation) {
            abort(404);
        }
        Cart::query()->create(['user_id' => $user_id, 'product_variation_id' => $productVariation->id, 'quantity' => $data['quantity']]);
    }

    public function delete($user_id, $id)
    {
        $cart = Cart::query()->where('user_id', $user_id)->where('id', $id)->first();
        if (!$cart) {
            abort(404);
        } //end if

        $cart->delete();
    }
}

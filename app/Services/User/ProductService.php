<?php

namespace App\Services\User;

use App\Models\Product;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ProductService extends Service
{
    /**
     * Get List Banners
     *
     * @return Builder[]|Collection
     */
    public function getListProducts($request):Collection|array
    {

        $products =  Product::query();
        
        if($request->category){
            $category = explode('-',  $request->category);
            $products->whereIn('category_id', $category);
        }
        if($request->supplier){
            $supplier = explode('-',  $request->supplier);
            $products->whereIn('supplier_id', $supplier);
        }
        return $products->with('category', 'supplier')->get();
    }

    public function getNewListProducts(): Collection|array
    {
        return Product::query()
            ->where('status','=', 1)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
    }
}

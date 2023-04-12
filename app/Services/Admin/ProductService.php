<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use App\Helpers\AdminHelper;
use App\Models\ProductVariation;
use App\Services\FileService;
use Illuminate\Database\Eloquent\Collection;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService extends Service
{
    /**
     * Get List proudct
     *
     * @return Builder[]|Collection
     */
    public function getListProducts(): Collection|array
    {
        return Product::query()
            ->select(['id', 'category_id', 'supplier_id',  'image', 'name', 'description', 'content', 'price', 'status'])
            ->with('category', 'supplier')
            ->get();
    }

    /**
     * Store
     *
     * @param $data
     */
    public function store($data)
    {
        $data['image'] = FileService::getInstance()->uploadFile($data);
        Product::query()->create(['category_id' => $data['category_id'], 'supplier_id' => $data['supplier_id'], 'image' => $data['image'], 'name' => $data['name_product'], 'description' => $data['description'], 'content' => $data['content'], 'price' => $data['price']]);
    }

    /**
     * storeDetail
     *
     * @param $data
     */
    public function storeDetail($data, $id)
    {
        $data['image'] = FileService::getInstance()->uploadFile($data);
        ProductVariation::query()->create(['product_id' => $id, 'color_id' => $data['color_id'], 'size_id' => $data['size_id'], 'image' => $data['image'], 'quantity' => $data['quantity']]);
    }
    /**
     * Name Product Parent
     *
     * @param $id
     */
    public function nameCategoryParent($id)
    {
        $product = Product::query()
            ->select(['id', 'name'])
            ->where('id', $id)
            ->first();

        return $product;
    }

    /**
     * Show Product
     *
     * @param $id
     */
    public function show($id)
    {
        $product = Product::query()
        ->with('productVariations', 'productVariations.color', 'productVariations.size')
        ->where('id', $id)
        ->first();

        return $product;
    }

    /**
     * Show form edit
     *
     * @param $id
     */
    public function getProduct($id)
    {
        $product = Product::query()
            ->select(['id', 'category_id', 'supplier_id',  'image', 'name', 'description', 'content', 'price', 'status'])
            ->where('id', $id)
            ->first();
        if (!$product) {
            abort(404);
        } //end if

        return $product;
    }

    /**
     * Show form edit
     *
     * @param $id
     */
    public function getProductDetail($id)
    {
        $product = ProductVariation::query()
            ->select(['id', 'color_id', 'size_id',  'image', 'quantity'])
            ->where('id', $id)
            ->first();
        if (!$product) {
            abort(404);
        } //end if

        return $product;
    }
    /**
     * Update
     *
     * @param $id
     */
    public function update($data, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        } //end if
        if (isset($data['image'])) {
            FileService::getInstance()->deleteFile($product->image);
            $data['image'] = FileService::getInstance()->uploadFile($data);
            $product->update(['category_id' => $data['category_id'], 'supplier_id' => $data['supplier_id'], 'image' => $data['image'], 'name' => $data['name_product'], 'description' => $data['description'], 'content' => $data['content'], 'cotent' => $data['content'], 'status' => isset($data['status']) ? 1 : 0]);
        } else {
            $product->update(['category_id' => $data['category_id'], 'supplier_id' => $data['supplier_id'], 'name' => $data['name_product'], 'description' => $data['description'], 'content' => $data['content'], 'cotent' => $data['content'], 'status' => isset($data['status']) ? 1 : 0]);
        }
    }

    public function updateDetail($data, $id)
    {
        $productvariation = ProductVariation::find($id);
        if (!$productvariation) {
            abort(404);
        } //end if
        if (isset($data['image'])) {
            FileService::getInstance()->deleteFile($productvariation->image);
            $data['image'] = FileService::getInstance()->uploadFile($data);
            $productvariation->update(['color_id' => $data['color_id'], 'size_id' => $data['size_id'], 'image' => $data['image'], 'quantity' => $data['quantity']]);
        } else {
            $productvariation->update(['color_id' => $data['color_id'], 'size_id' => $data['size_id'], 'quantity' => $data['quantity']]);
        }
    }
    /**
     * Delete
     *
     * @param $id
     */
    public function delete($id)
    {
        $banner = Product::where('id', $id)->first();
        if (!$banner) {
            abort(404);
        }
        DB::beginTransaction();
        try {
            FileService::getInstance()->deleteFile($banner->image);
            $banner->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Delete
     *
     * @param $id
     */
    public function deleteDetail($product, $id)
    {
        $productvariation = ProductVariation::where('id', $id)->first();
        if (!$productvariation) {
            abort(404);
        }
        DB::beginTransaction();
        try {
            FileService::getInstance()->deleteFile($productvariation->image);
            $productvariation->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Http\Requests\Admin\Product\ProductDetailRequest;
use App\Models\Product;
use App\Models\Supplier;
use App\Services\Admin\CategoryService;
use App\Services\Admin\ColorService;
use App\Services\Admin\ProductService;
use App\Services\Admin\SizeService;
use App\Services\Admin\SupplierService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.product.title'));
        $data['products'] = ProductService::getInstance()->getListProducts();

        return view('admin.products.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.category.title'));
        $data['categories_option'] = CategoryService::getInstance()->getCategoryOption();
        $data['supplier'] = SupplierService::getInstance()->getListSuppliers();

        return view('admin.products.create')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $data = $request->only(['name_product', 'image', "supplier_id", "category_id", "description", "content", 'price']);
        ProductService::getInstance()->store($data);
        toastr(trans('admin.response.create', ['name' => trans('admin.label.product.name')]));

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.product.title'));
        $data['product'] = ProductService::getInstance()->show($id);
        $data['product_parent'] = $id;

        return view('admin.products.show')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDetail($id)
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.category.title'));
        $data['colors'] = ColorService::getInstance()->getListColors();
        $data['sizes'] = SizeService::getInstance()->getListSizes();
        $data['product_parent'] = $id;

        return view('admin.products.create_product_detail')->with(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeDetail(ProductDetailRequest $request, $id)
    {
        $data = $request->only(['color_id', 'size_id', "image", "quantity"]);
        ProductService::getInstance()->storeDetail($data, $id);
        toastr(trans('admin.response.create', ['name' => trans('admin.label.product.name')]));

        return redirect()->route('admin.products.show', ['product' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.category.title'));
        $data['categories_option'] = CategoryService::getInstance()->getCategoryOption();
        $data['supplier'] = SupplierService::getInstance()->getListSuppliers();
        $data['product'] = ProductService::getInstance()->getProduct($id);

        return view('admin.products.edit')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editDetail($product, $id)
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.category.title'));
        $data['colors'] = ColorService::getInstance()->getListColors();
        $data['sizes'] = SizeService::getInstance()->getListSizes();
        $data['product'] = ProductService::getInstance()->getProductDetail($id);
        $data['product_parent'] = $product;

        return view('admin.products.edit_product_detail')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->only(['name_product', 'image', "supplier_id", "category_id", "description", "content", 'price', 'status']);
        ProductService::getInstance()->update($data, $id);
        toastr(trans('admin.response.update', ['name' => trans('admin.label.product.name')]));

        return redirect()->route('admin.products.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDetail(ProductDetailRequest $request, $product, $id)
    {
        $data = $request->only(['color_id', 'size_id', "image", "quantity"]);
        ProductService::getInstance()->updateDetail($data, $id);
        toastr(trans('admin.response.update', ['name' => trans('admin.label.product.name')]));

        return redirect()->route('admin.products.show', ['product' => $product]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductService::getInstance()->delete($id);
        toastr(trans('admin.response.delete', ['name' => trans('admin.label.product.name')]));

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyDetail($product, $id)
    {
        ProductService::getInstance()->deleteDetail($product, $id);
        toastr(trans('admin.response.delete', ['name' => trans('admin.label.product.name')]));

        return redirect()->route('admin.products.show', ['product' => $product]);
    }
}

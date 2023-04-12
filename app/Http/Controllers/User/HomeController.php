<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\User\Contact\ContactRequest;
use App\Services\Admin\BannerService;
use App\Services\User\CategoryService;
use App\Services\User\ColorService;
use App\Services\User\ContactService;
use App\Services\User\HomeService;
use App\Services\User\ProductService;
use App\Services\User\SupplierService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data['title'] = UserHelper::getPageTitle(trans('user.label.home'));
        $data['banners'] = HomeService::getInstance()->getListBanners();
        $data['products'] = HomeService::getInstance()->getListProducts();

        return view('user.home.index')->with(['data' => $data]);
    }

    public function detail($slug){
        $data['title'] = UserHelper::getPageTitle(trans('user.label.home')); 
        $data['banners'] = HomeService::getInstance()->getListBanners();
        $data['product'] = Product::with('productVariations', 'productVariations.color', 'productVariations.size')->where('slug', $slug)->get()->first();
        // $data['product_variations'] = $data['product']->productVariations;
        // $data['color'] = $data['product_variations']->color;
        // dd($data['color']->name);
        $data['newproducts'] = HomeService::getInstance()->getListNewProducts();
        $data['colors'] = HomeService::getInstance()->getListColors();
        $data['categories'] = HomeService::getInstance()->getListCategories();
        return view('user.home.product-detail')->with(['data' => $data]);
    }
    public function shop(Request $request)
    {
        $data['title'] = UserHelper::getPageTitle(trans('user.label.home'));
        $data['newProducts'] = ProductService::getInstance()->getNewListProducts();
        $data['categories'] = CategoryService::getInstance()->getListCategories();
        $data['colors'] = ColorService::getInstance()->getListColors();
        $data['suppliers'] = SupplierService::getInstance()->getListSuppliers();

        return view('user.home.shop')->with(['data' => $data]);
    }

    public function productList(Request $request)
    {
        return $data['products'] = ProductService::getInstance()->getListProducts($request);
    }

    public function contact()
    {
        $data['title'] = UserHelper::getPageTitle(trans('user.label.home'));

        return view('user.home.feedback')->with(['data' => $data]);
    }

    public function sendContact(ContactRequest $request)
    {
        ContactService::getInstance()->create($request->only(['name', 'phone', 'content']));
        
        return redirect()->back();
    }

    public function about()
    {
        $data['title'] = UserHelper::getPageTitle(trans('user.label.home'));

        return view('user.home.about')->with(['data' => $data]);
    }
}

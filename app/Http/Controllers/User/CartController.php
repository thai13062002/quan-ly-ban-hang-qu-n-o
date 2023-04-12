<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Services\User\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $id = auth()->id();
        $data['title'] = UserHelper::getPageTitle(trans('user.label.home'));
        $data['cart'] = CartService::getInstance()->getListCarts($id);

        return view('user.cart.index')->with(['data' => $data]);
    }

    public function store(Request $request, $slug)
    {
        $user_id = auth()->id();
        $data = $request->all();
        CartService::getInstance()->store($user_id, $data, $slug);
        toastr(trans('user.response.create', ['name' => trans('user.label.product')]));


        return redirect()->back();
    }

    public function destroy($id)
    {
        $user_id = auth()->id();
        CartService::getInstance()->delete($user_id, $id);
        toastr(trans('user.response.delete', ['name' => trans('user.label.product')]));

        return redirect()->back();
    }
}

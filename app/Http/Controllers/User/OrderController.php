<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Services\User\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function detail($id)
    {
        $data['title'] = UserHelper::getPageTitle(trans('user.detail.orderDetail'));
        $data['products'] = OrderService::getInstance()->withUser(auth()->user())->getOrderDetail($id);

        return view('user.order.detail')->with(['data' => $data]);
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Services\User\LikeProductService;
use Illuminate\Http\Request;

class LikeProductController extends Controller
{
    public function index (){
        $id = auth()->id();
        $data['title'] = UserHelper::getPageTitle(trans('user.label.home'));
        $data['likeproduct'] = LikeProductService::getInstance()->getListLikeProducts($id);

        return view('user.like_products.index')->with(['data' => $data]);
    }

    public function store (){
        $id = auth()->id();
        $data['title'] = UserHelper::getPageTitle(trans('user.label.home'));
        $data['likeproduct'] = LikeProductService::getInstance()->getListLikeProducts($id);

        return view('user.like_products.index')->with(['data' => $data]);
    }

    public function destroy($id)
    {
        $user_id = auth()->id();
        LikeProductService::getInstance()->destroy($user_id, $id);
        toastr(trans('user.response.delete', ['name' => trans('user.label.product')]));

        return redirect()->back();
    }
}

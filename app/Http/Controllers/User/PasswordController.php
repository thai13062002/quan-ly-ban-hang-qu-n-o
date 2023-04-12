<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Auth\ChangePasswordRequest;
use App\Services\User\AuthService;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function formChangePassword(){
        if (!auth()->check()){
            toastr(trans('user.action.needlogin'), 'error');
            return redirect('login');
        }

        $data['title'] = UserHelper::getPageTitle(trans('user.action.changepassword'));

        return view('user.auth.changepassword')->with(['data' => $data]);
    }

    public function changePassword(ChangePasswordRequest $request){
        $data = $request->only(['password', 'confirm_password']);
        AuthService::getInstance()->changePassword($data);
        toastr(trans('user.action.updatepasswordsuccessful'), 'success');

        return redirect('login');
    }
}

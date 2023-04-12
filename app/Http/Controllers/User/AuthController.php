<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Requests\User\Auth\RegisterRequest;
use App\Services\User\AuthService;
use App\Http\Requests\User\Info\UpdateUserRequest;
use App\Services\User\InfoUserService;
use App\Services\User\OrderService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show form login
     *
     * @return \View
     */
    public function detail ()
    {
        $data['title'] = UserHelper::getPageTitle(trans('user.detail.account'));
        $data['orders'] = OrderService::getInstance()->withUser(auth()->user())->getListOrders();
        $data['user'] = InfoUserService::getInstance()->withUser(auth()->user())->getInfoUser();

        return view('user.info.index')->with(['data' => $data]);
    }

    public function formLogin()
    {
        if (auth()->check()) {
            return redirect()->to('products');
        }
        $data['title'] = UserHelper::getPageTitle(trans('user.action.login'));

        return view('user.auth.login')->with(['data' => $data]);
    }

    /**
     * Show form register
     *
     * @return \View
     */
    public function formRegister()
    {
        $data['title'] = UserHelper::getPageTitle(trans('user.action.subscribe'));

        return view('user.auth.register')->with(['data' => $data]);
    }
    /**
     * Register
     *
     * @param request
     *
     * @return \Response
     */
    public function register(RegisterRequest $request){
        $data = $request->only(['name', 'email', 'password', 'repassword']);
        AuthService::getInstance()->register($data);
        toastr(trans('user.auth.register.success'), 'success');

        return redirect()->route('user.login');
    }

    /**
     * Login
     *
     * @param request
     *
     * @return \Response
     */
    public function login(LoginRequest $request){
        $data = $request->only(['email', 'password']);
        if (!auth()->guard('web')->attempt(['email' => $data['email'], 'password' => $data['password']])){
            toastr(trans('user.auth.login.failed'), 'error');

            return redirect()->back()->withInput();
        }else{
            toastr(trans('user.auth.login.success'), 'success');

            return redirect()->route('user.home');
        }
    }

    /**
     * Logout
     *
     * @return \Response
     */
    public function logout(){
        auth()->logout();

        return redirect()->route('user.home');
    }

    /**
     * Edit user
     *
     * @return \View
     */
    public function edit ()
    {
        $data['title'] = UserHelper::getPageTitle(trans('user.detail.account'));
        $data['user'] = InfoUserService::getInstance()->withUser(auth()->user())->getInfoUser();

        return view('user.info.update')->with(['data' => $data]);
    }
    /**
     * Update user
     *
     * @param $request
     *
     * @return \Response
     */
    public function update(UpdateUserRequest $request)
    {
        InfoUserService::getInstance()->withUser(auth()->user())->update($request->only(['name', 'phone', 'email', 'districts', 'provinces', 'wards']));

        return redirect()->route('user.detail');
    }

}

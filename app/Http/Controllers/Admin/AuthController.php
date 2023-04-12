<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Show form login
     *
     * @return Application|Factory|View|RedirectResponse
     */
    public function showLogin(): Application|Factory|View|RedirectResponse
    {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }//end if

        $data['title'] = AdminHelper::getPageTitle(trans('admin.button.login'));

        return view('admin.auth.login')->with(['data' => $data]);
    }

    /**
     * Login admin
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);
        if (!auth()->guard('admin')->attempt($credentials)) {
            toastr(trans('auth.failed'), 'error');
            return redirect()->back()->withInput();
        }//end if

        return redirect()->route('admin.dashboard');
    }

    /**
     * Logout admin
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        auth()->guard('admin')->logout();

        return redirect()->route('admin.login');
    }

    /**
     * Get profile
     *
     * @return Application|Factory|View
     */
    public function profile(): Application|Factory|View
    {
        $data['user'] = auth()->guard('admin')->user();
        $data['title'] = AdminHelper::getPageTitle(trans('admin.sidebar.profile'));

        return view('admin.auth.profile')->with(['data' => $data]);
    }
}

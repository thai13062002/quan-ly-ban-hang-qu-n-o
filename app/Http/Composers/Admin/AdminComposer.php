<?php

namespace App\Http\Composers\Admin;

use App\Helpers\FileHelper;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\View\View;

class AdminComposer
{
    /**
     * @var Authenticatable|null
     */
    public $admin;

    /**
     * AdminComposer constructor.
     */
    public function __construct()
    {
        $this->admin = auth()->guard('admin')->user();
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $user = $this->admin;
        // $user['avatar'] = FileHelper::getFullUrl($user['avatar']);

        $view->with('adminLogin', $user);
    }

}

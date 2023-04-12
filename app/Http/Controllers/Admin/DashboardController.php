<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Dashboard admin
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.sidebar.profile'));

        return view('admin.index')->with(['data' => $data]);
    }
}

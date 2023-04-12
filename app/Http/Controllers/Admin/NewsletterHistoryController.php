<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\AdminHelper;
use App\Helpers\DataHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Newsletter\NewsletterRequest;
use App\Services\Admin\NewsletterHistoryService;
use App\Services\Admin\NewsletterService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsletterHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.newsletter'));
        $data['histories'] = NewsletterHistoryService::getInstance()->getListHistories();

        return view('admin.newsletter.history')->with(['data' => $data]);
    }


}

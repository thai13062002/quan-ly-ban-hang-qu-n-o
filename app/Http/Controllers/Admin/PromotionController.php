<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Helpers\AdminHelper;
use App\Http\Requests\Admin\Newsletter\NewsletterRequest;
use App\Models\Promotion;
use App\Services\Admin\NewsletterHistoryService;
use App\Services\Admin\NewsletterService;
use App\Services\Admin\PromotionService;
use Flasher\Laravel\Http\Response;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.newsletter'));
        $data['promotions'] = PromotionService::getInstance()->getListPromotions();

        return view('admin.newsletter.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data['title'] = AdminHelper::getPageTitle(trans('admin.label.newsletter'));

        return view('admin.newsletter.create')->with(['data' => $data]);
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(NewsletterRequest $request)
    {
        $data = $request->only(['title_newsletter', 'image', 'content_newsletter']);
        PromotionService::getInstance()->store($data);
        toastr(trans('admin.response.create', ['name' => trans('admin.label.category.name')]));

        return redirect()->route('admin.newsletter.index');
    }

    public function sent($id)
    {
        $email_newsletter = NewsletterService::getInstance()->getListEmails();
        $email_user = NewsletterService::getInstance()->getListEmailsUser();
        $email = array_merge($email_newsletter, $email_user);
        $newsletter = PromotionService::getInstance()->show($id);
        $sent = PromotionService::getInstance()->sendMail($email, $newsletter);
        NewsletterHistoryService::getInstance()->store($email, $newsletter);
        toastr(trans('admin.response.sent', ['name' => trans('admin.label.email')]));

        return redirect()->route('admin.newsletter.index');
    }
}

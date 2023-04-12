<?php

namespace App\Http\Controllers\User;

use App\Helpers\UserHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Newsletter\NewsletterRequest;
use App\Services\User\NewsletterService;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function registerNewsletter(NewsletterRequest $request){
        $data=$request->only('email');
        NewsletterService::getInstance()->registerNewsletter($data);
        toastr(trans('user.response.register', ['name' => trans('user.label.sentmail')]));

        return redirect()->back();
    }
}

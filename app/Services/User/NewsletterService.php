<?php

namespace App\Services\User;

use App\Models\Newsletter;
use App\Models\Order;
use App\Models\User;
use App\Services\Service;
use Illuminate\Support\Facades\Hash;

class NewsletterService extends Service
{
    public function registerNewsletter($data){
        Newsletter::query()->create(['email' => $data['email']]);
    }
}

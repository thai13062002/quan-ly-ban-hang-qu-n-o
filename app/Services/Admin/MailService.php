<?php

namespace App\Services\Admin;
use App\Jobs\SendEmailJob;
use App\Services\Service;


class MailService extends Service
{
    public function sendMail($details)
    {
        dispatch(new SendEmailJob($details));
    }
}

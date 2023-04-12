<?php

namespace App\Services\Admin;

use App\Jobs\SenMailSale;
use App\Models\Newsletter;
use App\Models\NewsletterHistory;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Services\FileService;
use App\Models\NewsletterUser;
use App\Models\User;

class  NewsletterHistoryService extends Service
{
    public function getListHistories(){
        return NewsletterHistory::query()
        ->select(['id', 'email', 'content', 'status'])
        ->get();
    }

    public function store($email, $newsletter){
        $content=$newsletter['content'];
        foreach ($email as $item) {
            NewsletterHistory::query()->create([
                'email' => $item['email'],
                'content' => $content,
                'status' => 1,
            ]);
        }
    }
}

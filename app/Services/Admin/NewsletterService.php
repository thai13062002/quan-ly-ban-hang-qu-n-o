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

class  NewsletterService extends Service
{

    /**
     * Store
     *
     * @param $data
     */
    public function store($data)
    {
        NewsletterHistory::query()->create(['title' => $data['title_newsletter'], 'image' => $data['image'], 'content' => $data['content_newsletter']]);
    }

    public function getListEmails(): Collection|array
    {
        return Newsletter::query()
            ->select(['email'])
            ->get()->toArray();
    }
    public function getListEmailsUser(): Collection|array
    {
        return User::query()
            ->select(['email'])
            ->get()->toArray();
    }

    public function sendMail($email, $newsletter)
    {
        $job = (new SenMailSale($email, $newsletter))->onQueue('emails');
        dispatch($job);
    }

    public function update($id)
    {
        $newsletterhistory = NewsletterHistory::find($id);
        if (!$newsletterhistory) {
            abort(404);
        } //end if
        $newsletterhistory->update(['status' => 1]);

    }
}

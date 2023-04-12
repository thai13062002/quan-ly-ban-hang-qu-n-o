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
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Redis;

class PromotionService extends Service
{
    /**
     * Get List Newsletters
     *
     * @return Builder[]|Collection
     */
    public function getListPromotions(): Collection|array
    {
        return Promotion::query()
            ->select(['id', 'title', 'content'])
            ->get();
    }

    /**
     * Store
     *
     * @param $data
     */
    public function store($data)
    {
        Promotion::query()->create(['title' => $data['title_newsletter'], 'content' => $data['content_newsletter']]);
    }

    /**
     * Get show
     *
     * @return Builder[]|Collection
     */
    public function show($id): Collection|array
    {
        return Promotion::query()
            ->select(['title', 'content'])
            ->where('id', $id)
            ->get()->first()->toArray();
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
        $job = (new SenMailSale($email, $newsletter))->onQueue('SenMailSale');
        dispatch($job);
    }
}

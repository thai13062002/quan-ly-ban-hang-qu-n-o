<?php

namespace App\Services\User;

use App\Models\Contact;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ContactService extends Service
{
    /**
     * Create
     *
     * @param $request
     */
    public function create($data)
    {
        Contact::query()->create($data);
    }
}

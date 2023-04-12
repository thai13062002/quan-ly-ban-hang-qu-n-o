<?php

namespace App\Services\Admin;

use App\Models\Contact;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ContactService extends Service
{
    /**
     * Get List Contacts
     *
     * @return Builder[]|Collection
     */
    public function getListContacts(): Collection|array
    {
        return Contact::query()
            ->select(['id', 'name','phone','content'])
            ->get();
    }

}

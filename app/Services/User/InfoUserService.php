<?php

namespace App\Services\User;

use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\UserAddresses;
use App\Models\Ward;
use App\Services\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class InfoUserService extends Service
{
    /**
     * Get List Banners
     *
     * @return Builder[]|Collection
     */
    public function getInfoUser()
    {
        return User::with(['userAddress', 'userAddress.ward', 'userAddress.district', 'userAddress.province'])
            ->select(['id', 'name', 'email'])
            ->where('id',$this->getUser()->id)
            ->first();
    }

    public function getProvinces(): Collection|array
    {
        return Province::query()
            ->select(['id', 'name'])
            ->get();
    }

    public function getDistricts($id): Collection|array
    {
        return District::query()
            ->select(['id', 'name'])
            ->where('province_id', $id)
            ->get();
    }

    public function getWards($id): Collection|array
    {
        return Ward::query()
            ->select(['id', 'name'])
            ->where('district_id', $id)
            ->get();
    }

    /**
     * Update info
     *
     * @param $request
     */
    public function update($data)
    {
        $user = User::query()
            ->where('id', $this->getUser()->id)
            ->first();
        if (!$user) {
            abort(404);
        }

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        $userAddress = UserAddresses::query()
        ->where('user_id', $this->getUser()->id)
        ->first();

        if($userAddress){
            $userAddress->update([
                'phone' => $data['phone'],
                'province_id' => $data['provinces'],
                'district_id' => $data['districts'],
                'ward_id' => $data['wards'],
            ]);
        }
        else{
            UserAddresses::create([
                'user_id' => $this->getUser()->id,
                'phone' => $data['phone'],
                'province_id' => $data['provinces'],
                'district_id' => $data['districts'],
                'ward_id' => $data['wards'],
            ]);
        }
    }
}

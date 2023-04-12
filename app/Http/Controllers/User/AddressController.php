<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\InfoUserService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Get user
     *
     */
    public function province()
    {
        $data= InfoUserService::getInstance()->getProvinces();

        return view('user.info.optionAddress')->with(['data' => $data]);
    }

    public function district($id)
    {
        $data= InfoUserService::getInstance()->getDistricts($id);

        return view('user.info.optionAddress')->with(['data' => $data]);
    }

    public function ward($id)
    {
        $data= InfoUserService::getInstance()->getWards($id);

        return view('user.info.optionAddress')->with(['data' => $data]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAddresses extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_addresses';

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'address',
        'province_id',
        'district_id',
        'ward_id',
        'is_default',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, config('vietnam-maps.columns.province_id'), 'id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, config('vietnam-maps.columns.ward'), 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, config('vietnam-maps.columns.district_id'), 'id');
    }
}

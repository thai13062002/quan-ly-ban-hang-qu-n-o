<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    protected $table = 'suppliers';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'status',
    ];
}

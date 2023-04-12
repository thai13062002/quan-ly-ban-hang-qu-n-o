<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory, SoftDeletes;

    public const NOT_SIZE = 0;
    protected $table = 'sizes';

    protected $fillable = [
        'name',
    ];


    public function orderDetails()
    {
        return $this->belongsToMany(OrderDetail::class);
    }

    public function productVariations()
    {
        return $this->hasMany(ProductVariation::class);
    }
}

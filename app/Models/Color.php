<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory, SoftDeletes;

    public const NOT_COLOR = 0;

    protected $table = 'colors';

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

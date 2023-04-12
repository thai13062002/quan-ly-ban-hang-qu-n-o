<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'product_variation_id',
        'quantity',
        'amount',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function productVariation()
    {
        return $this->belongsTo(ProductVariation::class);
    }

    public function colors()
    {
        return $this->belongsTo(Color::class);
    }

    public function sizes()
    {
        return $this->belongsTo(Size::class);
    }
}

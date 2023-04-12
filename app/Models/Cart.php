<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'carts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_variation_id',
        'quantity',
    ];

    /**
     * Get the product_variation associated with the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongTo
     */
    public function productVariation()
    {
        return $this->belongsTo(ProductVariation::class);
    }

    /**
     * Get the product_variation associated with the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the product_variation associated with the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongTo
     */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

       /**
     * Get the product_variation associated with the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongTo
     */
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'product_id', 'variant_id', 'quantity'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }

    public function getUnitPriceAttribute()
    {
        $base = $this->product->base_price;
        $additional = $this->variant ? $this->variant->additional_price : 0;
        return $base + $additional;
    }

    public function getSubtotalAttribute()
    {
        return $this->unit_price * $this->quantity;
    }
}

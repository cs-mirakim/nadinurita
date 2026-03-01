<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'promo_code_id',
        'status',
        'delivery_zone',
        'delivery_charge',
        'subtotal',
        'discount_amount',
        'total',
        'recipient_name',
        'recipient_phone',
        'address_line_1',
        'address_line_2',
        'city',
        'postcode',
        'state',
        'notes',
        'toyyibpay_bill_code',
        'auto_complete_at'
    ];

    protected $casts = [
        'auto_complete_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function statusHistories()
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    public function promoCode()
    {
        return $this->belongsTo(PromoCode::class);
    }

    public function airwaybill()
    {
        return $this->hasOne(Airwaybill::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airwaybill extends Model
{
    protected $fillable = ['order_id', 'courier_name', 'tracking_number', 'receipt_image_url', 'shipped_at'];

    protected $casts = [
        'shipped_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getTrackingUrlAttribute()
    {
        $urls = [
            'poslaju'  => 'https://www.poslaju.com.my/track-trace/?trackingNo=',
            'jnt'      => 'https://www.jtexpress.my/trajectoryQuery?billCode=',
            'ninjavan' => 'https://www.ninjavan.co/my-en/tracking?id=',
            'dhl'      => 'https://www.dhl.com/my-en/home/tracking.html?tracking-id=',
        ];

        $key = strtolower(str_replace(' ', '', $this->courier_name));
        return isset($urls[$key]) ? $urls[$key] . $this->tracking_number : null;
    }
}

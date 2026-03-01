<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliverySetting extends Model
{
    protected $fillable = [
        'semenanjung_rate',
        'east_malaysia_rate',
        'free_shipping_minimum',
        'free_shipping_enabled'
    ];

    public static function current()
    {
        return static::first() ?? static::create([
            'semenanjung_rate' => 8.00,
            'east_malaysia_rate' => 15.00,
            'free_shipping_minimum' => 150.00,
            'free_shipping_enabled' => true,
        ]);
    }
}

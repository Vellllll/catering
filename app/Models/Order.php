<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'menu_category_id',
        'menu_id',
        'outlet_id',
        'user_latitude',
        'user_longitude',
        'menu_choice_ids',
        'menu_price',
        'delivery_price',
        'total_price'
    ];

    protected $casts = [
        'menu_choice_ids' => 'array'
    ];
}

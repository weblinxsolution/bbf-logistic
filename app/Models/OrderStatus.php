<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    function shipping_types()
    {
        return $this->hasMany(ShippingType::class, 'id', 'main_type_id');
    }
}
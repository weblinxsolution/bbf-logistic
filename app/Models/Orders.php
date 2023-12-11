<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    function users()
    {
        return $this->hasMany(User::class, 'id', 'user_email_id');
    }
    function ordersType()
    {
        return $this->hasMany(ShippingType::class, 'id', 'order_type_id');
    }

    function orderStatus()
    {
        return $this->hasMany(OrderStatus::class, 'id', 'status_type_id');
    }

    function containers()
    {
        return $this->hasMany(Containers::class, 'order_id', 'id');
    }

    public function checks()
    {
        return $this->hasMany(Check::class, "order_id", "id");
    }


}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    public function sizeInfo()
    {
        return $this->belongsTo(BookingSize::class, "booking_size", "id");
    }
}
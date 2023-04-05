<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    // mao ni ang function sa costumers
    public function bookings()
{
    return $this->hasMany(Booking::class);
}
}

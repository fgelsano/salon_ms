<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";
    protected $fillable = [
        'name',
        'image',
        'category',
        'price'

    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'service_id');
    }
}

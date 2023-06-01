<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table= "customers";
    protected $fillable =[
        'id',
        'firstname',
        'lastname',
        'address',
        'contact'
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'customer_id');
    }
}

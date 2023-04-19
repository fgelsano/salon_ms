<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table= "bookings";
    protected $fillable =[
        'customer_id',
        'reservation_date',
        'reservation_time',
        'status'

    ];

    
    // models ni sa bookings na nga ma belong ang customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

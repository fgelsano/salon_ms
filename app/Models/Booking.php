<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = "bookings";
    protected $fillable = [
        'user_id',
        'customer_id',
        'employee_id',
        'service_id',
        'category_id',
        'reservation_date',
        'reservation_time',
        'status'

    ];


    // models ni sa bookings na nga ma belong ang customer
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }

}

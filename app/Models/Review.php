<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table= "reviews";
    protected $fillable =[
        
        'booking_id',
        'content',
        'rating',
        'title'

    ];
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }


}

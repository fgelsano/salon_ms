<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewResponses extends Model
{
    use HasFactory;
    protected $table= "review_responses";
    protected $fillable =[
        'id',
        'review_id',
        'response'
        
    ];
    public function review()
    {
        return $this->belongsTo(Review::class);
    }

}

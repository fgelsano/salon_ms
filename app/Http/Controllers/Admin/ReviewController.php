<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Booking;
class ReviewController extends Controller
{
    //
    public function index() {
        
        $reviews = Review::all();
        

        return view('admin.reviews.index', compact('reviews'));
    } 
}

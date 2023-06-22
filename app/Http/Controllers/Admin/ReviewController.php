<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    //
    public function index()
    {

        $reviews = Review::orderBy('created_at', 'desc')->paginate(10); // Sort reviews by ID in ascending order
        return view('admin.reviews.index', compact('reviews'));
    }

    public function addreviews(Request $request)
    {
        $reviews = Review::find($request->id);

        return view('frontend.partials.reviews', compact(['reviews']));
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'rating' => 'required|integer',
            'comment' => 'required|string',
        ]);
        $review = new Review;
        $review->name = $request->name;
        $review->star_rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        return redirect()->route('frontend.home')->with('success', 'Review submitted successfully!');

    }
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Service deleted successfully.');

    }
}

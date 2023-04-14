@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">
        <table class="table">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Reviews</h3>
                
            </div>
                <tr>
                    <th>Booking id</th>
                    <th>Content</th>
                    <th>Rating</th>
                    <th>Action</th>
                    
                </tr>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->booking_id }}</td>
                        <td>{{ $review->content}}</td>
                        <td>{{ $review->rating}}</td>
                        <td>{{ $review->title}}</td>
                        <td>
                            <a href='#'>View</a> |
                            <a href='#'>Edit</a> |
                            <a href='#'>Delete</a>
                        </td>
                    </tr>
                 @endforeach
                </table>
                <!-- button ni sa review responses -->
                <button class="btn btn-primary">Reviews Responses</button>
        </div>
    </div>
</div>

@endsection
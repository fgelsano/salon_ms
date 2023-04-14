@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">
        <table class="table">
        <!-- <th colspan="3">Bookings</th> -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Bookings</h3>
            
        </div>
                <tr>
                    <th>Booking id</th>
                    <th>Reservation Date</th>
                    <th>Reservation time</th>
                    <th>Status</th>
                    <th>Customer</th>
                    <th>Action</th>
                </tr>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_id }}</td>
                        <td>{{ $booking->customer_id }}</td>
                        <td>{{ $booking->reservation_date}}</td>
                        <td>{{ $booking->reservation_time }}</td>
                        <td>{{ $booking->status}}</td>
                      
                        <td>
                            <a href='#'>View</a> |
                            <a href='#'>Edit</a> |
                            <a href='#'>Delete</a>
                        </td>
                    </tr>
                 @endforeach
                </table>
                <!-- button ni sa booking details -->
                    <button class="btn btn-primary">Booking Details</button>
        </div>
    </div>
</div>

@endsection
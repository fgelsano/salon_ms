@extends('layouts.admin.app')

@section('content')
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Bookings</h5>
                    <div class="float-right">
                        <a href="{{ route('bookings.create') }}" type="button" class="btn btn-primary">New Booking</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Employee Name</th>
                                    <th>Customer Name</th>
                                    <th>Service Name</th>
                                    <th>Reservation Date</th>
                                    <th>Reservation Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->employee_name }}</td>
                                    <td>{{ $booking->firstname }}</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->reservation_date }}</td>
                                    <td>{{ $booking->reservation_time }}</td>
                                    <td>{{ $booking->status }}</td>

                                    <td>

                                        <div class="btn-group" role="group">
                                            <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-primary">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>

                                            <a href="{{ route('bookings.booking_details', $booking) }}" class="btn btn-secondary">
                                                <i class="fas fa-eye"></i> View
                                            </a>

                                        </div>


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
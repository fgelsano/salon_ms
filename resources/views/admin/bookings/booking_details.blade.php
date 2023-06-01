@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">{{ __('Booking Details') }} #{{ $bookings->id }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="booking_id">Booking ID:</label>
                                    <p class="form-control-static">{{ $bookings->id }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="customer_name">Customer Name:</label>
                                    <p class="form-control-static">{{ $bookings->firstname }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="employee_name">Employee Name:</label>
                                    <p class="form-control-static">{{ $bookings->employee_name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="service_name">Service Name:</label>
                                    <p class="form-control-static">{{ $bookings->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reservation_date">Reservation Date:</label>
                                    <p class="form-control-static">{{ $bookings->reservation_date }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="reservation_time">Reservation Time:</label>
                                    <p class="form-control-static">{{ $bookings->reservation_time }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status:</label>
                                    <p class="form-control-static">{{ $bookings->status }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="created_at">Created At:</label>
                                    <p class="form-control-static">{{ $bookings->created_at }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="updated_at">Updated At:</label>
                                    <p class="form-control-static">{{ $bookings->updated_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

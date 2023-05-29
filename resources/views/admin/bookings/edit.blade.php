@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">

            <div class="col-md-14">

                <div class="card">
                    <h5 class="card-header">Edit Booking </h5>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST" action="{{ route('bookings.update', $booking->id) }}">
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label for="customer_id">Customer Name</label>
                                <select name="customer_id" id="customer_id" class="form-control">
                                    @foreach ($customer as $majane)
                                        <option value="{{ $majane->id }}">{{ $majane->firstname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="employee_id">Employees Name</label>
                                <select name="employee_id" id="employee_id" class="form-control">
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="service_id">Services Name</label>
                                <select name="service_id" id="service_id" class="form-control">
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="reservationdate" class="form-label">Reservation Date</label>
                                <input type="date" class="form-control" id="reservation_date" name="reservation_date"
                                    value="{{ $booking->reservation_date }}">
                                @error('reservation_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="reservationtime" class="form-label">Reservation Time</label>
                                <input type="time" class="form-control" id="reservation_time" name="reservation_time"
                                    value="{{ $booking->reservation_time }}">
                                @error('reservation_time')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="bookingstatus" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control" value="{{ $booking->status }}">
                                    <option value="Pending">Pending</option>
                                    <option value="Confirmed">Confirmed</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="status" name="status" value="{{ $booking->status }}"> -->
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('user/js/jquery-3.5.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Get today's date
            var today = new Date().toISOString().split('T')[0];

            // Set the min attribute of the input element
            $('#reservation_date').attr('min', today);
        });
        var timeInput = document.getElementById('reservation_time');

        // Function to validate the time input
        function validateTimeInput() {
            var currentTime = new Date();
            var selectedTime = new Date(currentTime.toDateString() + ' ' + timeInput.value);

            // Set the minimum time to 5 PM of the current day
            var minTime = new Date(currentTime.toDateString() + ' 17:00');

            // Set the maximum time to 7 AM of the next day
            var maxTime = new Date(currentTime.setDate(currentTime.getDate() + 1));
            maxTime.setHours(7, 0, 0, 0);

            if (selectedTime < minTime || selectedTime >= maxTime) {
                timeInput.setCustomValidity('Please select a time between 5 PM and 7 AM');
            } else {
                timeInput.setCustomValidity('');
            }
            timeInput.addEventListener('input', validateTimeInput);
        }
    </script>
@endsection

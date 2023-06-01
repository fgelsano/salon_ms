@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">

            <div class="col-md-14">

                <div class="card ">
                    <h5 class="card-header bg-primary text-white">Edit Booking </h5>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST" action="{{ route('bookings.update', $booking->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="customer_id">Customer Name</label>
                                <select name="customer_id" id="customer_id" class="form-control">
                                    @foreach ($customer as $customers)
                                        <option value="{{ $customers->id }}" @if ($customers->id == $booking->customer_id) selected @endif>{{ $customers->firstname }}</option>
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
            var selectedTime = timeInput.value;

            // Get the hours and minutes from the selected time
            var [selectedHours, selectedMinutes] = selectedTime.split(':');

            // Convert hours to a 24-hour format
            var selectedHours24 = parseInt(selectedHours);
            if (selectedHours.toLowerCase().indexOf('pm') > -1 && selectedHours24 < 12) {
                selectedHours24 += 12;
            }

            // Check if the selected time is within the allowed range (8 AM to 5 PM)
            if (selectedHours24 < 8 || selectedHours24 >= 17 || (selectedHours24 === 17 && parseInt(selectedMinutes) > 0)) {
                timeInput.setCustomValidity('Booking is only available between 8 AM and 5 PM');
            } else {
                timeInput.setCustomValidity('');
            }
        }

        // Add the validateTimeInput function as an event listener for the input event
        timeInput.addEventListener('input', validateTimeInput);
    </script>
@endsection

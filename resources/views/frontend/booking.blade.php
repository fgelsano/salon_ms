@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="m-0">New Booking</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('bookings.storebooking') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="firstname">Customer First Name</label>
                                <input type="text" class="form-control" name="firstname">
                                @error('firstname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lastname">Customer Last Name</label>
                                <input type="text" class="form-control" name="lastname">
                                @error('lastname')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Customer Address</label>
                                <input type="text" class="form-control" name="address">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contact">Customer Contact Number</label>
                                <input type="text" class="form-control" name="contact">
                                @error('contact')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="employee_id">Employee Name</label>
                                <select name="employee_id" id="employee_id" class="form-control">
                                    <option value="">--Select an Employee--</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            data-picture="{{ asset('uploads/' . $employee->picture) }}"
                                            data-availability="{{ $employee->availability }}"
                                            data-service="{{ $employee->service }}">{{ $employee->employee_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <br><br>
                                <img id="employee_picture" src="" alt="" class="img-fluid"
                                    style="max-height: 200px;"><br>
                                <h6 id="employee_availability"></h6>

                            </div>
                            <div class="form-group">
                                <label for="category_id">Services Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">--Select a Services Category--</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="service_id">Services Name</label>
                                <select name="service_id" id="service_id" class="form-control">
                                    <option value="">--Select a Service--</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="reservation_date">Reservation Date</label>
                                <input type="date" class="form-control" id="reservation_date" name="reservation_date"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="reservation_time">Reservation Time</label>
                                <input type="time" class="form-control" id="reservation_time" name="reservation_time"
                                    required>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Create Booking</button>
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
        }

        // Add the validateTimeInput function as an event listener for the input event
        timeInput.addEventListener('input', validateTimeInput);
        $(document).ready(function() {
            $('#employee_id').change(function() {
                var selectedOption = $(this).find(':selected');
                var selectedPicture = selectedOption.data('picture');
                var selectedAvailability = selectedOption.data('availability');
                $('#employee_picture').attr('src', selectedPicture);
                $('#employee_availability').text('Availability: ' + selectedAvailability);
                $('#employee_availability').text(availabilityText);
            });
        });

    </script>
@endsection

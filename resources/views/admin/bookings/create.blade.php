@extends('layouts.admin.app')

@section('content')
    <br><br>
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-14">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="m-0">New Booking</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('bookings.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="customer_id">Customer Name</label>
                                <select name="customer_id" id="customer_id" class="form-control">
                                    <option value="">--Select a Customer--</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->firstname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="employee_id">Employee Name</label>
                                <select name="employee_id" id="employee_id" class="form-control">
                                    <option value="">--Select an Employee--</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            data-picture="{{ asset('uploads/' . $employee->picture) }}"
                                            data-availability="{{ $employee->availability }}"
                                            @if ($employee->services) data-category="{{ $employee->category }}"
                                            data-service="{{ $employee->name }}" @endif>
                                            {{ $employee->employee_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <br><br>
                                <img id="employee_picture" src="" alt=""
                                    class="img-fluid d-flex justify-content-center" style="max-height: 200px;"><br>
                                <h6 id="employee_availability"></h6>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Services Category</label>
                                <select name="category_id" id="category_id" class="form-control" disabled>
                                    <option value="">--Select a Services Category--</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="service_id">Services Name</label>
                                <select name="service_id" id="service_id" class="form-control" disabled>
                                    <option value="">--Select a Services--</option>
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

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="Pending">Pending</option>
                                    <option value="Confirmed">Confirmed</option>
                                </select>
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
        // const employeeDropdown = document.getElementById('employee_id');
        // const categoryDropdown = document.getElementById('category_id');
        // const serviceDropdown = document.getElementById('service_id');

        // employeeDropdown.addEventListener('change', function() {
        //     const selectedEmployee = employeeDropdown.options[employeeDropdown.selectedIndex];

        //     categoryDropdown.value = selectedEmployee.dataset.category;
        //     categoryDropdown.disabled = false;

        //     serviceDropdown.value = selectedEmployee.dataset.service;
        //     serviceDropdown.disabled = false;
        // });
        $(document).ready(function() {
            $("#employee_id").change(function() {
                var selectedEmployee = $(this).find(":selected");
                var pictureUrl = selectedEmployee.data("picture");
                var availability = selectedEmployee.data("availability");
                var category = selectedEmployee.data("category");
                var service = selectedEmployee.data("service");

                $("#employee_picture").attr("src", pictureUrl);
                $("#employee_availability").text("Availability: " + availability);

                if (category && service) {
                    // Enable the category and service selects
                    $("#category_id").prop("disabled", false);
                    $("#service_id").prop("disabled", false);

                    // Filter the category options based on the selected employee's category
                    $("#category_id option").hide();
                    $("#category_id option[value='" + category + "']").show();

                    // Show all services initially
                    $("#service_id option").show();

                    // Filter the service options based on the selected employee's service
                    $("#service_id option[data-category!='" + category + "']").hide();
                } else {
                    // If no category and service data available, disable the category and service selects
                    $("#category_id").prop("disabled", true);
                    $("#service_id").prop("disabled", true);
                }
            });
        });
        $(document).ready(function() {
            // Calculate today's date in the format 'yyyy-mm-dd'
            var today = new Date().toISOString().split('T')[0];

            // Add the 'min' attribute to the date input with today's date
            $('#reservation_date').attr('min', today);

            // Handle change event of the date input
            $('#reservation_date').on('change', function() {
                var selectedDate = $(this).val();
                var currentDate = new Date().toISOString().split('T')[0];
                if (selectedDate < currentDate) {
                    $(this).val('');
                }
            });

            // Disable past dates in the date picker
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
                startDate: today,
            });



        });
        // $(document).ready(function() {
        //     $('#employee_id').change(function() {
        //         var selectedOption = $(this).find(':selected');
        //         var selectedPicture = selectedOption.data('picture');
        //         var selectedAvailability = selectedOption.data('availability');
        //         $('#employee_picture').attr('src', selectedPicture);
        //         $('#employee_availability').text('Availability: ' + selectedAvailability);
        //         $('#employee_availability').text(availabilityText);
        //     });
        // });
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

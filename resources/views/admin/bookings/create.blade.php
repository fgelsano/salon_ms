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
                                    <option value="">--Select a Employee--</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                                    @endforeach
                                </select>
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
                                    <option value="">--Select a Services--</option>
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

                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status"
                                    placeholder="Pending" required>
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

            // Add validation logic for time
            var now = new Date().toISOString().split('T')[1].substring(0, 5);
            $('#reservation_time').attr('min', now);
        });
    </script>
@endsection

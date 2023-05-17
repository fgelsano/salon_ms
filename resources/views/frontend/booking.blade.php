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
                                <label for="user_name">Customer Name</label>
                                <input type="text" class="form-control" name="user_id"
                                    value="{{ old('user_id', auth()->user()->name) }}">
                                @if ($errors->has('user_id'))
                                    <div class="alert alert-danger">{{ $errors->first('user_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="employee_id">Employee Name</label>
                                <select name="employee_id" id="employee_id" class="form-control">
                                    <option value="">--Select an Employee--</option>
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
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option>Pending</option>
                                    <option>Confirmed</option>
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

    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
@endsection

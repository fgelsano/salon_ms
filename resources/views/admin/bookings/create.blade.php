@extends('layouts.admin.app')

@section('content')

          <br><br>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->firstname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="employee_id">Employee Name</label>
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

                        

                        <div class="form-group">
                            <label for="reservation_date">Reservation Date</label>
                            <input type="date" class="form-control" id="reservation_date" name="reservation_date">
                        </div>

                        <div class="form-group">
                            <label for="reservation_time">Reservation Time</label>
                            <input type="time" class="form-control" id="reservation_time" name="reservation_time">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status" placeholder="Pending">
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


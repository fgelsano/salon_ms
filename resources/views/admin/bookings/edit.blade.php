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
            <!-- 
               <div class="mb-3">
                  <label for="customer_id" class="form-label">Select Customer:</label>
                    <select name="customer_id"id="customer_id">
                      
                      @foreach ($customers as $customer)
                        <option value="{{$customer->id}}" {{ ($booking->customer_id == $customer->id) ? 'selected' : ''}}>
                          {{ $customer->firstname.' '.$customer->lastname }}
                        </option>
                      @endforeach
                    </select>
                </div> -->

            <div class="form-group">
              <label for="customer_id">Customer Name</label>
              <select name="customer_id" id="customer_id" class="form-control">
                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->firstname }}</option>
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
              <label for="exampleFormControlInput1" class="form-label">Reservation Date</label>
              <input type="date" class="form-control" id="reservation_date" name="reservation_date" value="{{ $booking->reservation_date }}">
              @error('reservation_date')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Reservation Time</label>
              <input type="time" class="form-control" id="reservation_time" name="reservation_time" value="{{ $booking->reservation_time }}">
              @error('reservation_time')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Status</label>
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
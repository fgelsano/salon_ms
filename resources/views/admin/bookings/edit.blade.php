@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
     
        <div class="col-md-8">

        <div class="card">
          <h5 class="card-header">Edit Booking </h5>
          <div class="card-body">
       
            <form class="form-horizontal" method="POST" action="{{ route('bookings.update', $booking->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Reservation Date</label>
                <input type="date" class="form-control" id="exampleFormControlInput1" value="{{ $booking->reservation_date }}" >
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Reservation Time</label>
                <input type="time" class="form-control" id="exampleFormControlInput1" value="{{ $booking->reservation_time }}" >
              </div>
                

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Status</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $booking->status }}" >
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Customer</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $booking->customer->firstname }}" >
              </div>

              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            
            <p>---- Display Booking Details here --- for this booking record </p>
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
 


  
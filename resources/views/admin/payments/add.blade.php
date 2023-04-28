
@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <!-- Navigation menu ni -->
         <div class="col-md-8">
          

        <div class="card">
          <h5 class="card-header">Add Payments</h5>
          <div class="card-body">
            <form action="{{ route('payments.store') }}" method="POST">
              @csrf

              <div class="form-group">
                            <label for="booking_id">Booking ID</label>
                            <select name="booking_id" id="booking_id" class="form-control">
                                @foreach ($bookings as $booking)
                                    <option value="{{ $booking->id }}">{{ $booking->id }}</option>
                                @endforeach
                            </select>
                        </div>
              

              <div class="mb-3">
                  <label for="amount" class="form-label">Amount</label>
                  <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter payment amount">
              </div>



              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" placeholder="Enter  status">
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
@endsection



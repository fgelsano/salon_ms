@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">

        <div class="card">
          <h5 class="card-header">Edit Customers</h5>
          <div class="card-body">
            <form action="{{ route('customers.update', $customer) }}" method="POST">
              @csrf
              
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Firstname</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $customer->firstname }}" >
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Lastname</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $customer->lastname }}" >
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $customer->address }}" >
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">contact</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $customer->contact }}" >
              </div>

              
              <div class="mb-3">
                <button type="button" class="btn btn-primary">Submit</button>
              </div>
            </form>
            
            <p>---- Display Customerss Details here --- for this customers record </p>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection


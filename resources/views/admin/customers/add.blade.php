@extends('layouts.admin.app')

@section('content')
<div class="container-fluid pt-3">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h5 class="m-0">New customers</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="firstname" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter customer first name">
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Lastname</label>
              <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter  lastname">
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
            </div>
            <div class="mb-3">
              <label for="contact" class="form-label">Contact</label>
              <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter contact">
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
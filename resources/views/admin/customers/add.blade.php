@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">

        <div class="card">
          <h5 class="card-header">New Costumers</h5>
          <div class="card-body">
            <form action="{{ route('customers.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Contact</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
              </div>

              

              <div class="mb-3">
                <button type="button" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection


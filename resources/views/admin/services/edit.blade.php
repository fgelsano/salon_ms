@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">

        <div class="card">
          <h5 class="card-header">Edit Booking</h5>
          <div class="card-body">
            <form action="{{ route('services.update', $service) }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $service->name }}" >
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $service->description }}" >
              </div>

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Category</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $service->category }}" >
              </div>

              
              <div class="mb-3">
                <button type="button" class="btn btn-primary">Submit</button>
              </div>
            </form>
            
            <p>---- Display Services Details here --- for this services record </p>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection


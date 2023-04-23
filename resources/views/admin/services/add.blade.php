@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <!-- Navigation menu ni -->
         <div class="col-md-8">
          

        <div class="card">
          <h5 class="card-header">New Service</h5>
          <div class="card-body">
            <form action="{{ route('services.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter service name">
              </div>

              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Enter service description">
              </div>

              <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Enter service category">
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

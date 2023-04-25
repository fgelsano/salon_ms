@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">

        <div class="card">
          <h5 class="card-header">Edit Services</h5>
          <div class="card-body">
            <!-- <form action="{{ route('services.update', $service) }}" method="POST"> -->
            <form class="form-horizontal" method="POST" action="{{ route('services.update', $service->id) }}">
                            
              @csrf
              @method('PUT')

              
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}">
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div> 

                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Description</label>
                  <input type="text" class="form-control" id="description" name="description" value="{{ $service->description }}">
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Category</label>
                  <input type="text" class="form-control" id="category" name="category" value="{{ $service->category }}">
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Service</button>
                    </div>

            </form>
            
            <p>---- Display Services Details here --- for this services record </p>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection




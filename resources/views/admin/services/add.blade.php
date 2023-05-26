@extends('layouts.admin.app')

@section('content')
<div class="container-fluid pt-3">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h5 class="m-0">New Services</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Services Name') }}</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
              <div class="col-md-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image"  required onchange="updateFileNameLabel(this)">
                  <label class="custom-file-label" for="image" id="image-label">Choose file</label>
                  @error('image')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
              <div class="col-md-6">
                <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" required autocomplete="category" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

            </div>
            <div class="form-group row">
              <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>
              <div class="col-md-6">
                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                @error('price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Add Services') }}
                </button>
              </div>
            </div>
            <!-- <div class="mb-3">
              <label for="name" class="form-label">Service Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter service name">
            </div> -->
            <!-- <div class="mb-3">
              <label for="image" class="form-label">Image</label>
              <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <input type="text" class="form-control" id="category" name="category" placeholder="Enter service category">
            </div> -->
            <!-- <div class="mb-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div> -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    function updateFileNameLabel(input) {
        var fileName = input.files[0].name;
        document.getElementById("image-label").innerHTML = fileName;
    }
</script>
@endsection

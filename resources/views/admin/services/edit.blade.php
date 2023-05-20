@extends('layouts.admin.app')

@section('content')
<div class="container-fluid pt-3">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h5 class="m-0">Update Services</h5>
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ route('services.update', $service->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Service Name') }}</label>
              <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $service->name) }}" required autocomplete="name" autofocus>
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
                  <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $service->image) }}" onchange="updateFileNameLabel(this)">
                  <label class="custom-file-label" for="image" id="image-label">Choose file</label>
                  @error('image')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <br><br>
                <div id="filename" style="margin-top: 5px;"></div>
                @if ($service->image)
                <img src="{{ asset('uploads/' . $service->image) }}" alt="{{ $service->name }}" class="img-fluid" style="max-height: 600px;">
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
              <div class="col-md-6">
                <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category', $service->category) }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Update Services') }}
                </button>
              </div>
            </div>
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

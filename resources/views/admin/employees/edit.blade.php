@extends('layouts.admin.app')

@section('content')
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0">Update Employee</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="employee_name" class="col-md-4 col-form-label text-md-right">{{ __('Employee Name') }}</label>

                            <div class="col-md-6">
                                <input id="employee_name" type="text" class="form-control @error('employee_name') is-invalid @enderror" name="employee_name" value="{{ old('employee_name', $employee->employee_name) }}" required autocomplete="employee_name" autofocus>

                                @error('employee_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $employee->address) }}" required autocomplete="address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>
                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact', $employee->contact) }}" required autocomplete="contact">
                                @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="availability" class="col-md-4 col-form-label text-md-right">{{ __('Availability') }}</label>
                            <div class="col-md-6">
                                <input id="availability" type="text" class="form-control @error('availability') is-invalid @enderror" name="availability" value="{{ old('availability', $employee->available) }}" required autocomplete="availability">
                                @error('availability')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('picture') is-invalid @enderror" id="picture" name="picture">
                                    <label class="custom-file-label" for="picture" id="picture-label">Choose file</label>
                                    @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <br><br>
                                <div id="filename" style="margin-top: 5px;"></div>
                                @if ($employee->picture)
                                <img src="{{ asset('uploads/' . $employee->picture) }}" alt="{{ $employee->employee_name }}" class="img-fluid" style="max-height: 600px;">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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
        document.getElementById("picture-label").innerHTML = fileName;
    }
</script>

@endsection

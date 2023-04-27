

 @extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">

        <div class="card">
          <h5 class="card-header">Edit Customers</h5>
          <div class="card-body">
            
            <form class="form-horizontal" method="POST" action="{{ route('customers.update', $customer->id) }}">
                            
              @csrf
              @method('POST')

              
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $customer->firstname }}">
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div> 

                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Lastname</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $customer->lastname }}">
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}">
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Contact</label>
                  <input type="number" class="form-control" id="contact" name="contact" value="{{ $customer->contact }}">
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Customer</button>
                    </div>

            </form>
            
            <p>---- Display Customers Details here --- for this customers record </p>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection




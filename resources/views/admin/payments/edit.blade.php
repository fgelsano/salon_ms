

@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">

        <div class="card">
          <h5 class="card-header">Edit Payments</h5>
          <div class="card-body">
            
            <form class="form-horizontal" method="POST" action="{{ route('payments.update', $payment->id) }}">
                            
              @csrf
              @method('POST')

              
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Amount</label>
                  <input type="number" class="form-control" id="amount" name="amount" value="{{ $payment->amount }}">
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div> 

                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Status</label>
                  <input type="text" class="form-control" id="status" name="status" value="{{ $payment->status }}">
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




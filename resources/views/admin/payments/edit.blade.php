@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <!-- Navigation menu -->
            <div class="col-md-12">

                <div class="card">
                    <h5 class="card-header">Edit Payments</h5>
                    <div class="card-body">

                        {{-- <form class="form-horizontal" method="POST" action="{{ route('payments.update', $payment->id) }}"> --}}
                        <form class="form-horizontal" method="POST" action="{{ route('payments.update', $payment->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="paymentstatus" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="unpaid" {{ $payment->status == 'unpaid' ? 'selected' : '' }}>Unpaid
                                    </option>
                                    <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                </select>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Payments</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

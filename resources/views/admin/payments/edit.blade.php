@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <!-- Navigation menu -->
            <div class="col-md-12">

                <div class="card">
                    <h5 class="card-header">Edit Payments</h5>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST" action="{{ route('payments.update', $payment->id) }}">

                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="booking_id">Select Booking</label>
                                <select name="booking_id" id="booking_id" class="form-control">
                                    @foreach ($bookings as $booking)
                                        <option value="{{ $booking->id }}">{{ $booking->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount"
                                    value="{{ $payment->amount }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="paymentstatus" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control" value="{{ $payment->status }}">
                                    <option value="upaid">Unpaid</option>
                                    <option value="paid">Paid</option>
                                </select>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Customer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

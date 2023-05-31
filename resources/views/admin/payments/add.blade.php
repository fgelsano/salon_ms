@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <!-- Navigation menu ni -->
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Add Payments</h5>
                    <div class="card-body">
                        <form action="{{ route('payments.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="booking_id">Booking ID</label>
                                <select name="booking_id" id="booking_id" class="form-control">
                                    <option value="">--Select a Booking ID--</option>
                                    @foreach ($bookings as $booking)
                                        <option value="{{ $booking->id }}"
                                            data-customer-firstname="{{ $booking->customer_id }}"
                                            data-service-price="{{ $booking->service_id }}">
                                            {{ $booking->id }}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                                <div class="mb-3">
                                    <label for="customer_firstname" class="form-label">Customer Name</label>
                                    <input type="text" class="form-control" id="customer_firstname"
                                        name="customer_firstname">
                                </div>
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Service Price</label>
                                    <input type="number" class="form-control" id="amount" name="amount">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="paymentstatus" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="upaid">Unpaid</option>
                                    <option value="paid">Paid</option>
                                </select>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#booking_id').change(function() {
                var selectedOption = $(this).find(':selected');
                var customerFirstname = selectedOption.data('customer-firstname');
                var servicePrice = selectedOption.data('service-price');
                $('#customer_firstname').val(customerFirstname);
                $('#amount').val(servicePrice);
            });
        });
    </script>
@endsection

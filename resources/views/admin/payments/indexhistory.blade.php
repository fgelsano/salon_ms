@extends('layouts.admin.app')

@section('content')
    <div class="card-body">
        <div class="row">
            <div class="container-fluid pt-3">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"><b>Payments History</b></h5>
                                    <br>
                                    <div class="input-group" style="max-width: 250px;">
                                        <input type="text" id="searchInput" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div style="overflow-x: auto;">
                                        <table class="table table-hover table-head-fixed text-nowrap"
                                            style="text-align: center;">
                                            <thead>
                                                <tr
                                                    style="position: sticky; top: 0; background-color: #f8f9fa; z-index: 1;">
                                                    <th>Booking id</th>
                                                    <th>Customer's Name</th>
                                                    <th>Service</th>
                                                    <th>Amount</th>
                                                    <th>Payment Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $totalPrice = $completedBookings->sum('price');
                                                @endphp
                                                @forelse ($completedBookings as $payment)
                                                    <tr>
                                                        <td>{{ $payment->booking_id }}</td>
                                                        <td>{{ $payment->firstname }}</td>
                                                        <td>{{ $payment->name }}</td>
                                                        <td>{{ $payment->price }}</td>
                                                        <td>{{ $payment->updated_at }}</td>
                                                        <td
                                                            class="{{ $payment->status === 'unpaid' ? 'text-warning' : 'text-success' }}">
                                                            {{ $payment->status }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" style="text-align: center;">No records found.
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {!! $completedBookings->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#searchInput').keyup(function() {
                        var searchText = $(this).val().toLowerCase();
                        $('table tbody tr').each(function() {
                            var bookingId = $(this).find('td:first').text().toLowerCase();
                            if (bookingId.indexOf(searchText) === -1) {
                                $(this).hide();
                            } else {
                                $(this).show();
                            }
                        });
                    });
                });
            </script>
        @endsection

@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- <h5 class="mb-0"><b>Payments</b></h5> --}}
                            {{-- <div class="float-left">
                                <a href="{{ route('payments.create') }}" type="button" class="btn btn-primary">New  payments</a>
                            </div> --}}
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
                                <table class="table table-hover" style="text-align:center">
                                    <thead>
                                        <tr
                                            style="position: sticky;
                                            top: 0;
                                            background-color: #F8F9FA;
                                            z-index: 1;">
                                            <th>Booking id</th>
                                            <th>Customer's Name</th>
                                            <th>Amount</th>
                                            <th>Reservation Date</th>
                                            <th>Reservation Time</th>
                                            <th>Payment Time</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bookings as $booking)
                                            <tr>
                                                <td>{{ $booking->id }}</td>
                                                <td>{{ $booking->firstname . ' ' . $booking->lastname }}</td>
                                                <td>{{ $booking->price }}</td>
                                                <td>{{ $booking->reservation_date }}</td>
                                                <td>{{ $booking->reservation_time }}</td>
                                                <td>{{ $booking->updated_at }}</td>

                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('payments.edit', $booking->id) }}" class="btn btn-primary">
                                                            <i class="fas fa-money"></i> Pay
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" style="text-align: center;">No records found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        {!! $bookings->links() !!}
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

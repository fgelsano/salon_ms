@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 80px;">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="m-0">Queuing Status</h5>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <div class="form-group" style="width:fit-content;">
                                <input type="text" id="searchInput" class="form-control"
                                    placeholder="Search Booking Reference" />
                            </div>
                            <table class="table table-hover" style="text-align:center">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        {{-- <th>Employee Name</th> --}}
                                        <th>Service Name</th>
                                        {{-- <th>Service Category </th> --}}
                                        <th>Reservation Date</th>
                                        <th>Reservation Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                            {{-- <td>{{ $booking->employee_name }}</td> --}}
                                            <td>{{ $booking->name }}</td>
                                            {{-- <td>{{ $booking->category }}</td> --}}
                                            <td>{{ $booking->reservation_date }}</td>
                                            <td>{{ $booking->reservation_time }}</td>
                                            <td>
                                                <span
                                                class="{{ $booking->status === 'Pending' ? 'text-black' : ($booking->status === 'Completed' ? 'text-secondary' : ($booking->status === 'Confirmed' ? 'text-success' : 'text-danger')) }}">
                                                    {{ $booking->status }}
                                                </span>
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

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
                        {{-- <form action="{{ route('bookings.getBookingData') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="booking_id">Booking ID</label>
                                <input type="text" class="form-control" placeholder="Enter your Booking reference"
                                    name="booking_id" id="booking_id">
                                @error('booking_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
                        {{-- <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Search Booking</button>
                            </div> --}}
                        {{-- <br><br> --}}

                        <div class="table-responsive">
                            <div class="form-group" style="width:fit-content;">
                                <input type="text" id="searchInput" class="form-control"
                                    placeholder="Search Booking Reference" />
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        {{-- <th>Booking ID</th>
                                            <th>Service </th>
                                            <th>Status </th> --}}
                                        <th>Booking ID</th>
                                        <th>Employee Name</th>
                                        <th>Service Name</th>
                                        <th>Service Category </th>
                                        <th>Reservation Date</th>
                                        <th>Reservation Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                            <td>{{ $booking->employee_name }}</td>
                                            <td>{{ $booking->name }}</td>
                                            <td>{{ $booking->category }}</td>
                                            <td>{{ $booking->reservation_date }}</td>
                                            <td>{{ $booking->reservation_time }}</td>
                                            <td
                                                class="{{ $booking->status === 'Pending' ? 'text-warning' : 'text-success' }}">
                                                {{ $booking->status }}
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
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#searchInput').keyup(function() {
                    var searchText = $(this).val().toLowerCase();
                    $('table tr').each(function() {
                        var rowText = $(this).text().toLowerCase();
                        if (rowText.indexOf(searchText) === -1) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        }
                    });
                });
            });
        </script>
    @endsection

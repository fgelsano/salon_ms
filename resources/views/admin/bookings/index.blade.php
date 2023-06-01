@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card" style="width: 1230px;">
                    <div class="card-header">
                        <h5 class="mb-0"><b>Bookings</b></h5>
                        <div class="float-right">
                            <a href="{{ route('bookings.create') }}" type="button" class="btn btn-primary"> Booking</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <div class="form-group" style="width:fit-content;">
                                <input type="text" id="searchInput" class="form-control" placeholder="Search" />
                            </div>

                            <table class="table table-hover" style="text-align:center">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Employee Name</th>
                                        <th>Customer Name</th>
                                        <th>Service Name</th>
                                        <th>Service Category </th>
                                        <th>Reservation Date</th>
                                        <th>Reservation Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($bookings as $booking)
                                        <tr>
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                            <td>{{ $booking->employee_name }}</td>
                                            <td>{{ $booking->firstname }}</td>
                                            <td>{{ $booking->name }}</td>
                                            <td>{{ $booking->category }}</td>
                                            <td>{{ $booking->reservation_date }}</td>
                                            <td>{{ $booking->reservation_time }}</td>
                                            <td
                                                class="{{ $booking->status === 'Pending' ? 'text-warning' : 'text-success' }}">
                                                {{ $booking->status }}</td>
                                            <td>

                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('bookings.edit', $booking) }}"
                                                        class="btn btn-primary">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    <a href="{{ route('bookings.booking_details', $booking) }}"
                                                        class="btn btn-success">
                                                        <i class="fas fa-eye"></i> View
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

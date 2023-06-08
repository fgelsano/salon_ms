@extends('layouts.admin.app')

@section('content')
    @include('sweetalert::alert')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- <h5 class="mb-0"> <b>Customers</b></h5> --}}

                            <a href="{{ route('customers.create') }}" type="button" class="btn btn-primary float-right">New
                                Customers</a>
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
                                            background-color: #f8f9fa;
                                            z-index: 1;">
                                            <th>First Name</th>
                                            <th>Lastname</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Send APi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($customers as $customer)
                                            <tr>
                                                <td>{{ $customer->firstname }}</td>
                                                <td>{{ $customer->lastname }}</td>
                                                <td>{{ $customer->address }}</td>
                                                <td>{{ $customer->contact }}</td>
                                                <td>

                                                    <a href="{{ route('send-sms.index', ['contact' => $customer->contact]) }}"
                                                        class="btn btn-success">
                                                        <i class="fas fa"></i> Send SMS
                                                    </a>
                                                </td>

                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('customers.edit', $customer) }}"
                                                            class="btn btn-primary">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('customers.destroy', $customer) }}"
                                                            method="POST" id="delete-form-{{ $customer->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="confirmDelete(event, 'delete-form-{{ $customer->id }}')"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this Employee?')">
                                                                <i class="fas fa-trash-alt"></i> Delete
                                                            </button>
                                                        </form>
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
                        {!! $customers->links() !!}
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

        function confirmDelete(event, formId, confirmMessage) {
            event.preventDefault(); // Prevents the form from submitting immediately

            Swal.fire({
                title: 'Are you sure?',
                text: confirmMessage || "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-secondary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endsection

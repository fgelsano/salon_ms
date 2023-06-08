@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- <h5 class="mb-0"><b>Employees</b></h5> --}}
                            <div class="float-left">
                                <a href="{{ route('employees.create') }}" type="button" class="btn btn-primary">New
                                    Employees</a>
                            </div>
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
                                <table class="table table-hover table-fixed" style="text-align: center;">
                                    <thead>
                                        <tr style="background-color: #f8f9fa;">
                                            <th>Employees Name</th>
                                            <th>Employees Services</th>
                                            <th>Rule</th>
                                            <th>Availability</th>
                                            <th>Profile Picture</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->employee_name }}</td>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->rule }}</td>
                                                <td
                                                    style="color: {{ $employee->availability === 'Not Available' ? 'red' : 'green' }}">
                                                    {{ $employee->availability }}
                                                </td>
                                                <td><img src="{{ asset('uploads/' . $employee->picture) }}" width="100">
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('employees.edit', $employee) }}"
                                                            class="btn btn-primary">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('employees.destroy', $employee) }}"
                                                            method="POST" id="delete-form-{{ $employee->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="confirmDelete(event, 'delete-form-{{ $employee->id }}')"
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
                        {!! $employees->links() !!}
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

        function confirmDelete(event, formId) {
            event.preventDefault(); // Prevents the form from submitting immediately

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
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

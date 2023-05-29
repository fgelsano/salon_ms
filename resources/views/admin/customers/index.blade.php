@extends('layouts.admin.app')

@section('content')
    @include('sweetalert::alert')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card" style="width: 1230px;">
                    <div class="card-header">
                        <h5 class="mb-0">Customers</h5>
                        <div class="float-right">
                            <a href="{{ route('customers.create') }}" type="button" class="btn btn-primary">New
                                Customers</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="form-group" style="width:fit-content;">
                                <input type="text" id="searchInput" class="form-control" placeholder="Search" />
                            </div>
                            <table class="table table-hover">
                                <tr>
                                    <th>First Name</th>
                                    <th>Lastname</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Send APi</th>
                                    <th>Action</th>
                                </tr>
                                @forelse ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->firstname }}</td>
                                        <td>{{ $customer->lastname }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->contact }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="https://m.me/ryan.sereno.16" class="btn btn-primary">
                                                    <i class="fas fa"></i> Send Messenger
                                                </a>
                                            </div>
                                            <a href="{{ route('send-sms.index') }}" class="btn btn-secondary">
                                                <i class="fas fa"></i> Send SMS
                                            </a>
                                        </td>

                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary">
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

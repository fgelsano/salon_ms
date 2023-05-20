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
                                    <th>Action</th>
                                </tr>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->firstname }}</td>
                                        <td>{{ $customer->lastname }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->contact }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form id="delete-form" action="{{ route('customers.destroy', $customer) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this Customers?')"><i
                                                            class="fas fa-trash-alt"></i> Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function deleteCustomer(id) {
            axios.get(`/customers/${id}/delete`)
                .then((response) => {
                    Swal.fire({
                        title: response.data.message,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            axios.delete(`/customers/${id}`)
                                .then((response) => {
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: 'Customer has been deleted successfully.',
                                        icon: 'success'
                                    }).then(() => {
                                        // Reload the page to see the updated list of customers
                                        location.reload();
                                    });
                                })
                                .catch((error) => {
                                    console.log(error);
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'Failed to delete customer.',
                                        icon: 'error'
                                    });
                                });
                        }
                    });
                })
                .catch((error) => {
                    console.log(error);
                    Swal.fire({
                        title: 'Error',
                        text: 'Failed to get customer data.',
                        icon: 'error'
                    });
                });
        }
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

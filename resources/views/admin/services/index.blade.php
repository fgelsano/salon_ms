@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- <h5 class="mb-0"><b>Services</b></h5> --}}
                            <div class="float-right">
                                <a href="{{ route('services.create') }}" type="button" class="btn btn-primary"> New Services</a>
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
                                <table class="table table-hover table-fixed" style="text-align:center">
                                    <thead>
                                        <tr
                                            style=" background-color: #f8f9fa;">
                                            <th>Service Name</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($services as $service)
                                            <tr>
                                                <td>{{ $service->name ?? 'Default Name' }}</td>
                                                <td><img src="{{ asset('uploads/' . $service->image) }}" width="100">
                                                </td>
                                                <td>{{ $service->category ?? 'Default Category' }}</td>
                                                <td>{{ $service->price ?? 'Default Category' }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('services.edit', $service) }}"
                                                            class="btn btn-primary">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('services.destroy', $service) }}"
                                                            method="POST" id="delete-form-{{ $service->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="confirmDelete(event, 'delete-form-{{ $service->id }}')"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this Services?')">
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
                        {!! $services->links() !!}
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

@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card" style="width: 1230px;">
                    <div class="card-header">
                        <h5 class="mb-0"><b>Customer's Review</b></h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="form-group" style="width:fit-content;">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search" />
                                </div>
                                <table class="table table-hover" style="text-align:center">
                                    <thead>
                                        <tr
                                            style="position: sticky;
                                                top: 0;
                                                background-color: #f8f9fa;
                                                z-index: 1;">
                                            <th>Name</th>
                                            <th>Comment</th>
                                            <th>Star Rating</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($reviews as $review)
                                            <tr>
                                                <td>{{ $review->name }}</td>
                                                <td>{{ $review->comment }}</td>
                                                <td>{{ $review->star_rating }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <form action="{{ route('reviews.destroy', $review) }}"
                                                            method="POST" id="delete-form">
                                                            {!! csrf_field() !!}
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="confirmDelete(event)"><i
                                                                    class="fas fa-trash-alt"></i>
                                                                Delete</button>
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

                        <!-- button ni sa review responses -->

                    </div>
                </div>
            </div>
        </div>
    </div>
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

        function confirmDelete(event) {
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
                    document.getElementById('delete-form').submit();
                }
            });
        }
    </script>
@endsection

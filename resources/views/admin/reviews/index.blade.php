@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Customer's Review</h5>
                        <div class="float-right">
                            <button class="btn btn-primary">Reviews Responses</button>
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Booking id</th>
                                    <th>Content</th>
                                    <th>Rating</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->booking_id }}</td>
                                        <td>{{ $review->content }}</td>
                                        <td>{{ $review->rating }}</td>
                                        <td>
                                            <a href="#">View</a> |
                                            <a href="{{ route('reviews.edit', $review) }}">Edit</a> |
                                            <div class="btn-group" role="group">
                                                <form action="{{ route('reviews.destroy', $review) }}" method="POST">
                                                    {!! csrf_field() !!}
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                            class="fas fa-trash-alt"></i>
                                                        Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- button ni sa review responses -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

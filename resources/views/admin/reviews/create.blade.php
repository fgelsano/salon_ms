@extends('layouts.admin.app')

@section('content')

          <br><br>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0">New Reviews</h5>
                </div>
                <div class="card-body">
                                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="customer_id">Customer Name</label>
                            <select name="customer_id" id="customer_id" class="form-control">
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->firstname }}</option>
                                @endforeach
                            </select>
                        </div>

                        

                        <div class="form-group">
                            <label for="content">content</label>
                            <input type="text" class="form-control" id="content" name="content">
                        </div>

                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" class="form-control" id="rating" name="rating">
                        </div>

                        

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Create Reviews</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


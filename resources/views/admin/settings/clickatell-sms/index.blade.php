@extends('layouts.admin.app')

@section('content')
<div class="container-fluid pt-3">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <div class="card" style="width: 1230px;">
                <div class="card-header">
                    <h5 class="mb-0"> Send SMS</h5>

                </div>

                <div class="card-body">

                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="phone">Phone Number:</label>
                            <input type="text" class="form-control" placeholder="Phone Number" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea name="message" class="form-control" id="message" placeholder="Enter Your Message" name="message" rows="10" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

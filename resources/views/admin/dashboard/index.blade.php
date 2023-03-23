@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Navigation menu -->
        <div class="col-md-8">
            <a href="{{ url('/bookings') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Bookings</a>
        </div>
        <!-- End of Navigation menu -->

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} Testing</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

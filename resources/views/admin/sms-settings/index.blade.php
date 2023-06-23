@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card" style="width: 1230px;">
                    <div class="card-header">
                        <h5 class="mb-0"><b>SMS Settings</b></h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('sms-settings.index') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <form action="{{ route('sms-settings.index') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="sendSwitch" name="sendSwitch">
                                            <label class="custom-control-label" for="sendSwitch">On</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h5">{{ __('Register User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class='text-center'>
                    <a href="#" class='btn btn-primary'>Register Admin</a>
                    <a href="#" class='btn btn-primary mx-5'>Register Sales Rep</a>
                    <a href="#" class='btn btn-primary'>Register Warehouse Rep</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

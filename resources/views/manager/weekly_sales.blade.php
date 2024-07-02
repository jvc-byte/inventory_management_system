@extends('layouts.app')

@section('content')
    <!-- Floating Labels Form -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ _('Weekly Sales') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tbody>
                                   <p>Your weekly sales will appear here</p>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
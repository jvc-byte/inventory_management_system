@extends('layouts.app')

@section('content')
    <!-- Floating Labels Form -->
    <div class="container">
        <div class="row justify-content-center">
            <form method="POST" action="{{ url('/register_customer')}}" class="row g-3 col-md-6">
                @csrf
                
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name"
                            @error('name') is-invalid @enderror placeholder="Full Name">
                        <label for="name">Full Name</label>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email"
                            @error('email') is-invalid @enderror placeholder="Email">
                        <label for="email">Email</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="address" name="address"
                            @error('address') is-invalid @enderror placeholder="Address">
                        <label for="name">Address</label>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="phone_number" class="form-control" id="phone_number" name="phone_number"
                            @error('phone_number') is-invalid @enderror placeholder="Number">
                        <label for="phone_number">Number</label>

                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <input type="submit" value="Submit" name="submit" class="btn btn-outline-primary">
            </form>
        </div>
    </div>
@endsection

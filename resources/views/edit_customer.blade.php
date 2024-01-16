@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form method="POST" action='{{ url("/edit_customer/$customer->id") }}' class="row g-3 col-md-6">
                @csrf

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Full Name" value="{{ old('name', $customer->name) }}">
                        <label for="name"><strong>Full Name:</strong></label>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Email" value="{{ old('email', $customer->email) }}">
                        <label for="email"><strong>Email:</strong></label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                            name="address" placeholder="Address" value="{{ old('address', $customer->address) }}">
                        <label for="address"><strong>Address:</strong></label>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="tel" class="form-control @error('phone_number') is-invalid @enderror"
                            id="phone_number" name="phone_number" placeholder="Number"
                            value="{{ old('phone_number', $customer->phone_number) }}">
                        <label for="phone_number"><strong>Phone Number:</strong></label>

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

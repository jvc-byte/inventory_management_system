@extends('layouts.app')

@section('content')
    <!-- Floating Labels Form -->
    <div class="container">
        <div class="row justify-content-center">
            <form method="GET" action="{{ url("/warehouse/insert_in_warehouse/$product->id") }}" class="row g-3 col-md-6">
                @csrf

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Product Name" value="{{ $product->name }}" @readonly(true)>
                        <label for="name"><strong>Product Name:</strong></label>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                            name="code" placeholder="Product Code" value="{{ $product->code }}" @readonly(true)>
                        <label for="code"><strong>Product Code:</strong></label>

                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                            name="quantity" placeholder="Quantity" value="{{ old('quantity') }}">
                        <label for="quantity"><strong>Quantity:</strong></label>

                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <select name="unit" type="unit" class="form-control @error('unit') is-invalid @enderror"
                            value="{{ old('unit') }}" @required(true) autocomplete="unit">
                            <option value="">Select the unit</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                            @endforeach
                            @error('unit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </select>
                        <label for="unit"><strong>Unit:</strong></label>

                        @error('unit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" step="0.00" placeholder="Price" value="{{ old('price') }}">
                        <label for="price"><strong>Price:</strong></label>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="date" class="form-control @error('expiry_date') is-invalid @enderror"
                            id="expiry_date" name="expiry_date" placeholder="Expiring Date"
                            value="{{ old('expiry_date') }}">
                        <label for="expiry_date"><strong>Expiring Date:</strong></label>

                        @error('expiry_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <input type="submit" value="Add Product to Warehouse" name="submit" class="btn btn-outline-primary">
            </form>
        </div>
    </div>
@endsection

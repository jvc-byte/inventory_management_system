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
                    <div class="card-header">{{ _('View Products') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Expiring Date</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($warehouse_products as $warehouse_product)
                                        <tr>
                                            <th><em class="text-muted">{{ $loop->iteration }}</em></th>
                                            <td><em class="text-muted">{{ $warehouse_product->code }}</em></td>
                                            <td><em class="text-muted">{{ $warehouse_product->quantity }}</em></td>
                                            <td><em class="text-muted">{{ $warehouse_product->unit }}</em></td>
                                            <td><em class="text-muted">{{ $warehouse_product->price }}</em></td>
                                            <td><em class="text-muted">{{ $warehouse_product->expiry_date }}</em></td>
                                            <td><a class="btn btn-outline-primary"
                                                    href='{{ url("/warehouse/edit_product/$warehouse_product->id") }}'>Edit</a>
                                            </td>

                                            <td>
                                                <form action="{{ route('delete_product', $warehouse_product->id) }}"
                                                    method="GET">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm('are you sure you want to delete this product {{ $warehouse_product->name }}')">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @empty
                                        <p>No Product Found.</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

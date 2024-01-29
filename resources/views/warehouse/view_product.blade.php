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
                                        <th scope="col">Name</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($product) && count($product) > 0)
                                        @foreach ($product as $products)
                                            <tr>
                                                <th><em class="text-muted">{{ $loop->iteration }}</em></th>
                                                <td><em class="text-muted">{{ $products->code }}</em></td>
                                                <td><em class="text-muted">{{ $products->name }}</em></td>
                                                <td><a class="btn btn-outline-primary"
                                                        href='{{ url("/warehouse/edit_product/$products->id") }}'>Edit</a></td>

                                                <td>
                                                    <form action="{{ route('delete_product', $products->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            onclick="return confirm('are you sure you want to delete this product {{ $products->name }}')">Delete</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <p>No Product Found.</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

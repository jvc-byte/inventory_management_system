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
                    <div class="card-header">{{ _('View Suppliers') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Supplier Name</th>
                                        <th scope="col">Supplier Email</th>
                                        <th scope="col">Supplier Address</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($supplier) && count($supplier) > 0)
                                        @foreach ($supplier as $suppliers)
                                            <tr>
                                                <th><em class="text-muted">{{ $loop->iteration }}</em></th>
                                                <td><em class="text-muted">{{ $suppliers->name }}</em></td>
                                                <td><em class="text-muted">{{ $suppliers->email }}</em></td>
                                                <td><em class="text-muted">{{ $suppliers->address }}</em></td>
                                                <td><em class="text-muted">{{ $suppliers->phone_number }}</em></td>
                                                <td><a class="btn btn-outline-primary"
                                                        href='{{ url("/warehouse/edit_supplier/$suppliers->id") }}'>Edit</a></td>

                                                <td>
                                                    <form action="{{ route('delete_supplier', $suppliers->id) }}"
                                                        method="GET">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger"
                                                            onclick="return confirm('are you sure you want to delete this supplier {{ $suppliers->name }}')">Delete</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <p>No supplier found.</p>
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

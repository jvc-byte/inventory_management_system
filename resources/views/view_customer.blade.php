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
                    <div class="card-header">{{ _('View Customer') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customers as $customer)
                                        <tr>
                                            <th><em class="text-muted">{{ $loop->iteration }}</em></th>
                                            <td><em class="text-muted">{{ $customer->name }}</em></td>
                                            <td><em class="text-muted">{{ $customer->email }}</em></td>
                                            <td><em class="text-muted">{{ $customer->address }}</em></td>
                                            <td><em class="text-muted">{{ $customer->phone_number }}</em></td>
                                            <td><a class="btn btn-outline-primary"
                                                    href='{{ url("/edit_customer/$customer->id") }}'>Edit</a></td>

                                            <td>
                                                <form action="{{ route('delete_customer', $customer->id) }}" method="GET">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm('are you sure you want to delete this customer {{ $customer->name }}')">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @empty
                                        <p>No customers found.</p>
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

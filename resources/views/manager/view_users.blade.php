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
                    <div class="card-header">{{ _('View Users') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User Type</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <th><em class="text-muted">{{ $loop->iteration }}</em></th>
                                            <td><em class="text-muted">{{ $user->user_type }}</em></td>
                                            <td><em class="text-muted">{{ $user->name }}</em></td>
                                            <td><em class="text-muted">{{ $user->email }}</em></td>
                                            <td><a class="btn btn-outline-primary"
                                                    href='{{ url("/edit_user/$user->id") }}'>Edit</a></td>

                                            <td>
                                                <form action="{{ route('delete_user', $user->id) }}" method="GET">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger"
                                                        onclick="return confirm('are you sure you want to delete this user {{ $user->name }}')">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @empty
                                        <p>No user found.</p>
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

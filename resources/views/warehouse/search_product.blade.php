@extends('layouts.app')

@section('content')
    <!-- Floating Labels Form -->
    <div class="container">
        <div class="row justify-content-center">
            <form method="POST" action="{{ url('/warehouse/search_product') }}" class="row g-3 col-md-6">
                @csrf

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Product Name">
                        <label for="name">Enter Product Name or Code</label>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <input type="submit" value="search" name="submit" class="btn btn-outline-primary">
            </form>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Next</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($searchs as $search)
                    <tr>
                        <th><em class="text-muted">{{ $loop->iteration }}</em></th>
                        <td><em class="text-muted">{{ $search->code }}</em></td>
                        <td><em class="text-muted">{{ $search->name }}</em></td>
                        <td><a class="btn btn-outline-primary"
                                href='{{ url("/warehouse/receive_product/$search->id") }}'>Recieve</a></td>
                    </tr>
                @empty
                    <p class="fs-5 text-center">No Product Found.</p>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

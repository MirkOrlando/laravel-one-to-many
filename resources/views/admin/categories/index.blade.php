@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>All Categories</h1>
        <div class="row">
            <div class="col">
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="nameHelper" placeholder="New Category Name"
                            value="{{ old('name') }}">
                        <small id="nameHelper" class="form-text text-muted">Add a New Category</small>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="col">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Posts Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td scope="row">{{ $category->id }}</td>
                                <td>
                                    <form id="category-{{ $category->id }}"
                                        action="{{ route('admin.categories.update', $category->slug) }}" method="post">
                                        @csrf
                                        <input class="border-0 bg-transparent" type="text" name="name" id="name"
                                            value="{{ $category->name }}">
                                    </form>
                                </td>
                                <td>{{ count($category->posts) }}</td>
                                <td>
                                    Update - Delete
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td scope="row">
                                    <p>No Categories found! Add your first Category</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

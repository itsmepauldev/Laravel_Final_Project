@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
    <div class="container">
        <h3>Edit User</h3>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>

            <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
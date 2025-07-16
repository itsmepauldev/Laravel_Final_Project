@extends('layouts.app')
@section('title', 'Add Job Opening')

@section('content')
    <div class="container">
        <h2>Add Job Opening</h2>

        <form method="POST" action="{{ route('job.store') }}">
            @csrf
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-select" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Date Needed</label>
                <input type="date" name="date_needed" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Date Expiry</label>
                <input type="date" name="date_expiry" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>

            <button class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
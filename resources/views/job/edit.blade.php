@extends('layouts.app')
@section('title', 'Edit Job Opening')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Job Opening</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Please fix the following:</strong>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('job.update', $job->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Job Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $job->title) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="active" {{ $job->status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="unactive" {{ $job->status === 'unactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Date Needed</label>
                <input type="date" name="date_needed" class="form-control"
                    value="{{ old('date_needed', $job->date_needed) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Date Expiry</label>
                <input type="date" name="date_expiry" class="form-control"
                    value="{{ old('date_expiry', $job->date_expiry) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" value="{{ old('location', $job->location) }}"
                    required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Save</button>
                <a href="{{ route('job.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
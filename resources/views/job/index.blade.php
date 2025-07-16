@extends('layouts.app')
@section('title', 'Job Opening Management')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h2>Job Opening Management</h2>
            <a href="{{ route('job.create') }}" class="btn btn-primary">Add Job Opening</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date Needed</th>
                    <th>Date Expiry</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $index => $job)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $job->title }}</td>
                        <td>{{ ucfirst($job->status) }}</td>
                        <td>{{ $job->date_needed }}</td>
                        <td>{{ $job->date_expiry }}</td>
                        <td>{{ $job->location }}</td>
                        <td>
                            <a href="{{ route('job.edit', $job->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('job.destroy', $job->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Delete this job opening?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Edit Education')

@section('content')
    <div class="container">
        <h3 class="mb-4">Edit Education</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('education.update', $education->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Applicant</label>
                <select name="applicant_id" class="form-select" required>
                    @foreach($applicants as $app)
                        <option value="{{ $app->id }}" {{ $education->applicant_id == $app->id ? 'selected' : '' }}>
                            {{ $app->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>School Name</label>
                <input type="text" name="school_name" class="form-control" value="{{ $education->school_name }}" required>
            </div>

            <div class="mb-3">
                <label>Level</label>
                <select name="level" class="form-select" required>
                    <option {{ $education->level == 'Elementary' ? 'selected' : '' }}>Elementary</option>
                    <option {{ $education->level == 'High School' ? 'selected' : '' }}>High School</option>
                    <option {{ $education->level == 'SHS' ? 'selected' : '' }}>SHS</option>
                    <option {{ $education->level == 'College' ? 'selected' : '' }}>College</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Year From</label>
                <input type="number" name="year_from" class="form-control" value="{{ $education->year_from }}" required>
            </div>

            <div class="mb-3">
                <label>Year To</label>
                <input type="number" name="year_to" class="form-control" value="{{ $education->year_to }}" required>
            </div>

            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
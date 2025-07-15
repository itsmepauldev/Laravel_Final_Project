@extends('layouts.app')

@section('title', 'Add Education')

@section('content')
    <div class="container">
        <h3 class="mb-4">Add Education</h3>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('education.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Applicant</label>
                <select name="applicant_id" class="form-select" required>
                    <option disabled selected>Select Applicant</option>
                    @foreach(\App\Models\Applicant::all() as $applicant)
                        <option value="{{ $applicant->id }}">{{ $applicant->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>School Name</label>
                <input type="text" name="school_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Level</label>
                <select name="level" class="form-select" required>
                    <option>Elementary</option>
                    <option>High School</option>
                    <option>SHS</option>
                    <option>College</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Year From</label>
                <input type="number" name="year_from" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Year To</label>
                <input type="number" name="year_to" class="form-control" required>
            </div>

            <a href="{{ url('/applicant-management') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-success">Save Education</button>
        </form>
    </div>
@endsection
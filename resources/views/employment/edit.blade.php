@extends('layouts.app')
@section('title', 'Edit Employment')
@section('content')
    <div class="container">
        <h3>Edit Employment</h3>
        <form method="POST" action="{{ route('employment.update', $employment->id) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Applicant</label>
                <select name="applicant_id" class="form-select" required>
                    @foreach($applicants as $applicant)
                        <option value="{{ $applicant->id }}" {{ $employment->applicant_id == $applicant->id ? 'selected' : '' }}>
                            {{ $applicant->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Company</label>
                <input type="text" name="company" class="form-control" value="{{ $employment->company }}" required>
            </div>
            <div class="mb-3">
                <label>Position</label>
                <input type="text" name="position" class="form-control" value="{{ $employment->position }}" required>
            </div>
            <div class="row">
                <div class="col">
                    <label>Year From</label>
                    <input type="number" name="year_from" class="form-control" value="{{ $employment->year_from }}"
                        required>
                </div>
                <div class="col">
                    <label>Year To</label>
                    <input type="number" name="year_to" class="form-control" value="{{ $employment->year_to }}" required>
                </div>
            </div>
            <br>
            <a href="/applicant-management" class="btn btn-secondary">Cancel</a>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
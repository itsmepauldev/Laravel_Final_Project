@extends('layouts.app')
@section('title', 'Add Employment')
@section('content')
    <div class="container">
        <h3>Add Employment</h3>
        <form method="POST" action="{{ route('employment.store') }}">
            @csrf
            <div class="mb-3">
                <label>Applicant</label>
                <select name="applicant_id" class="form-select" required>
                    <option selected disabled>Select</option>
                    @foreach($applicants as $applicant)
                        <option value="{{ $applicant->id }}">{{ $applicant->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Company</label>
                <input type="text" name="company" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Position</label>
                <input type="text" name="position" class="form-control" required>
            </div>
            <div class="row">
                <div class="col">
                    <label>Year From</label>
                    <input type="number" name="year_from" class="form-control" required>
                </div>
                <div class="col">
                    <label>Year To</label>
                    <input type="number" name="year_to" class="form-control" required>
                </div>
            </div>
            <br>
            <a href="/applicant-management" class="btn btn-secondary">Cancel</a>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
@extends('layouts.app')
@section('title', 'Add Reference')

@section('content')
    <div class="container">
        <h3>Add Reference</h3>

        <form action="{{ route('reference.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Applicant</label>
                <select name="applicant_id" class="form-select" required>
                    <option disabled selected>Select Applicant</option>
                    @foreach($applicants as $applicant)
                        <option value="{{ $applicant->id }}">{{ $applicant->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Referral Name</label>
                <input type="text" name="referral_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Referral Email</label>
                <input type="email" name="referral_email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Referral Contact</label>
                <input type="text" name="referral_contact" class="form-control" required>
            </div>

            <a href="/applicant-management" class="btn btn-secondary">Cancel</a>
            <button class="btn btn-success">Save Reference</button>
        </form>
    </div>
@endsection
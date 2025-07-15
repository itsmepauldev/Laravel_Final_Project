@extends('layouts.app')
@section('title', 'Edit Reference')

@section('content')
    <div class="container">
        <h3>Edit Reference</h3>

        <form action="{{ route('reference.update', $reference->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Applicant</label>
                <select name="applicant_id" class="form-select" required>
                    @foreach($applicants as $applicant)
                        <option value="{{ $applicant->id }}" {{ $reference->applicant_id == $applicant->id ? 'selected' : '' }}>
                            {{ $applicant->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Referral Name</label>
                <input type="text" name="referral_name" class="form-control" value="{{ $reference->referral_name }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Referral Email</label>
                <input type="email" name="referral_email" class="form-control" value="{{ $reference->referral_email }}"
                    required>
            </div>

            <div class="mb-3">
                <label>Referral Contact</label>
                <input type="text" name="referral_contact" class="form-control" value="{{ $reference->referral_contact }}"
                    required>
            </div>

            <a href="/applicant-management" class="btn btn-secondary">Cancel</a>
            <button class="btn btn-primary">Update Reference</button>
        </form>
    </div>
@endsection
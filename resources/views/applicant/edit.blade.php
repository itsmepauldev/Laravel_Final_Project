@extends('layouts.app')

@section('title', 'Edit Applicant')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Applicant</h2>

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

        <form action="{{ url('/applicant-management/' . $applicant->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name', $applicant->name) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required
                    value="{{ old('email', $applicant->email) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Birthdate</label>
                <input type="date" name="birthdate" class="form-control"
                    value="{{ old('birthdate', $applicant->birthdate) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone_number" class="form-control"
                    value="{{ old('phone_number', $applicant->phone_number) }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    <option disabled>Choose gender...</option>
                    <option {{ old('gender', $applicant->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option {{ old('gender', $applicant->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                    <option {{ old('gender', $applicant->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $applicant->address) }}">
            </div>

            <div class="d-flex gap-2 mt-4">
                <a href="{{ url('/applicant-management') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
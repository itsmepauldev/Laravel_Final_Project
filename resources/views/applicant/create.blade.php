@extends('layouts.app')

@section('title', 'Add Applicant')

@section('content')
    <div class="container">
        <h2 class="mb-4">Add New Applicant</h2>

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

        <form action="{{ url('/applicant-management') }}" method="POST">
            @csrf
            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
            </div>

            <!-- Birthdate -->
            <div class="mb-3">
                <label class="form-label">Birthdate</label>
                <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate') }}">
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}">
            </div>

            <!-- Gender -->
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    <option disabled selected>Choose gender...</option>
                    <option {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
            </div>

            <a href="{{ url('/applicant-management') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Save Applicant</button>
        </form>
    </div>
@endsection
@extends('layouts.app')
@section('title', 'Add Payment')

@section('content')
    <div class="container">
        <h3>Add Payment</h3>

        <form action="{{ route('payment.store') }}" method="POST">
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
                <label>Payment Type</label>
                <input type="text" name="payment_type" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Amount</label>
                <input type="number" name="amount" step="0.01" class="form-control" required>
            </div>

            <a href="/applicant-management" class="btn btn-secondary">Cancel</a>
            <button class="btn btn-success">Save Payment</button>
        </form>
    </div>
@endsection
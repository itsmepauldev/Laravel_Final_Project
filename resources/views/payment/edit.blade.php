@extends('layouts.app')
@section('title', 'Edit Payment')

@section('content')
    <div class="container">
        <h3>Edit Payment</h3>

        <form action="{{ route('payment.update', $payment->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Applicant</label>
                <select name="applicant_id" class="form-select" required>
                    @foreach($applicants as $applicant)
                        <option value="{{ $applicant->id }}" {{ $payment->applicant_id == $applicant->id ? 'selected' : '' }}>
                            {{ $applicant->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Payment Type</label>
                <input type="text" name="payment_type" class="form-control" value="{{ $payment->payment_type }}" required>
            </div>

            <div class="mb-3">
                <label>Amount</label>
                <input type="number" name="amount" step="0.01" class="form-control" value="{{ $payment->amount }}" required>
            </div>

            <a href="/applicant-management" class="btn btn-secondary">Cancel</a>
            <button class="btn btn-primary">Update Payment</button>
        </form>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h4>Active Job Openings</h4>
        <div class="row">
            @forelse($activeJobs as $job)
                <div class="col-md-4">
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $job->title }}</h5>
                            <p class="card-text">
                                Date Needed: {{ \Carbon\Carbon::parse($job->date_needed)->format('M d, Y') }}<br>
                                Expiry: {{ \Carbon\Carbon::parse($job->date_expiry)->format('M d, Y') }}<br>
                                Location: {{ $job->location }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">No active job openings.</p>
            @endforelse
        </div>

    </div>
@endsection
@extends('layouts.app')

@section('title', 'Applicant Management')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Applicant Management</h2>
            <a href="{{ url('/applicant-management/create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Add Applicant
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Birthdate</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Created</th>
                        <th>Actions</th> {{-- Add this --}}
                    </tr>
                </thead>
                <tbody>
                    @forelse($applicants as $index => $applicant)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $applicant->name }}</td>
                            <td>{{ $applicant->email }}</td>
                            <td>{{ $applicant->birthdate }}</td>
                            <td>{{ $applicant->phone_number }}</td>
                            <td>{{ $applicant->gender }}</td>
                            <td>{{ $applicant->address }}</td>
                            <td>{{ $applicant->created_at->format('M d, Y') }}</td>
                            <td>
                                <a href="{{ url('/applicant-management/' . $applicant->id . '/edit') }}"
                                    class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ url('/applicant-management/' . $applicant->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No applicants found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <hr>

            <div class="d-flex justify-content-between align-items-center my-3">
                <h4>Education History</h4>
                <a href="{{ route('education.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Add Education
                </a>
            </div>




            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Applicant</th>
                            <th>School</th>
                            <th>Level</th>
                            <th>Year From</th>
                            <th>Year To</th>
                            <th>Actions</th>
                        </tr>

                    </thead>
                    <tbody>
                        @php $count = 1; @endphp
                        @foreach(\App\Models\Education::with('applicant')->get() as $edu)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $edu->applicant->name }}</td>
                                <td>{{ $edu->school_name }}</td>
                                <td>{{ $edu->level }}</td>
                                <td>{{ $edu->year_from }}</td>
                                <td>{{ $edu->year_to }}</td>
                                <td>
                                    <a href="{{ route('education.edit', $edu->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('education.destroy', $edu->id) }}" method="POST"
                                        class="d-inline delete-edu-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete-edu-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Employment History</h4>
                    <a href="{{ route('employment.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Add Employment
                    </a>
                </div>

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Applicant</th>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Year From</th>
                            <th>Year To</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach(\App\Models\Employment::with('applicant')->get() as $emp)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $emp->applicant->name }}</td>
                                <td>{{ $emp->company }}</td>
                                <td>{{ $emp->position }}</td>
                                <td>{{ $emp->year_from }}</td>
                                <td>{{ $emp->year_to }}</td>
                                <td>
                                    <a href="{{ route('employment.edit', $emp->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('employment.destroy', $emp->id) }}" method="POST"
                                        class="d-inline delete-form">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Payments</h4>
                    <a href="{{ route('payment.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Add Payment
                    </a>
                </div>

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Applicant</th>
                            <th>Payment Type</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach(\App\Models\Payment::with('applicant')->get() as $payment)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $payment->applicant->name }}</td>
                                <td>{{ $payment->payment_type }}</td>
                                <td>₱{{ number_format($payment->amount, 2) }}</td>
                                <td>{{ $payment->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('payment.edit', $payment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('payment.destroy', $payment->id) }}" method="POST"
                                        class="d-inline delete-form">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>References</h4>
                    <a href="{{ route('reference.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Add Reference
                    </a>
                </div>

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Applicant</th>
                            <th>Referral Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach(\App\Models\Reference::with('applicant')->get() as $ref)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $ref->applicant->name }}</td>
                                <td>{{ $ref->referral_name }}</td>
                                <td>{{ $ref->referral_email }}</td>
                                <td>{{ $ref->referral_contact }}</td>
                                <td>
                                    <a href="{{ route('reference.edit', $ref->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('reference.destroy', $ref->id) }}" method="POST"
                                        class="d-inline delete-form">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // SweetAlert2 confirmation for delete
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Delete this applicant?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@endpush
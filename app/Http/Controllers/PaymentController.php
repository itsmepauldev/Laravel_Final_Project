<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Applicant;

class PaymentController extends Controller
{
    public function create()
    {
        $applicants = Applicant::all();
        return view('payment.create', compact('applicants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'payment_type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        Payment::create($request->all());

        return redirect('/applicant-management')->with('success', 'Payment added successfully.');
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $applicants = Applicant::all();
        return view('payment.edit', compact('payment', 'applicants'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'payment_type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($request->all());

        return redirect('/applicant-management')->with('success', 'Payment updated successfully.');
    }

    public function destroy($id)
    {
        Payment::destroy($id);
        return back()->with('success', 'Payment deleted successfully.');
    }
}

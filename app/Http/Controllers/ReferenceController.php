<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reference;
use App\Models\Applicant;

class ReferenceController extends Controller
{
    public function create()
    {
        $applicants = Applicant::all();
        return view('reference.create', compact('applicants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'referral_name' => 'required|string|max:255',
            'referral_email' => 'required|email',
            'referral_contact' => 'required|string|max:20',
        ]);

        Reference::create($request->all());
        return redirect('/applicant-management')->with('success', 'Reference added successfully.');
    }

    public function edit($id)
    {
        $reference = Reference::findOrFail($id);
        $applicants = Applicant::all();
        return view('reference.edit', compact('reference', 'applicants'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'referral_name' => 'required|string|max:255',
            'referral_email' => 'required|email',
            'referral_contact' => 'required|string|max:20',
        ]);

        $reference = Reference::findOrFail($id);
        $reference->update($request->all());

        return redirect('/applicant-management')->with('success', 'Reference updated successfully.');
    }

    public function destroy($id)
    {
        Reference::destroy($id);
        return back()->with('success', 'Reference deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    public function index()
    {
        $applicants = Applicant::all();
        return view('applicant.index', compact('applicants'));
    }

    public function create()
    {
        return view('applicant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:applicants,email',
            'birthdate' => 'nullable|date',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:Male,Female,Other',
        ]);

        Applicant::create($request->all());

        return redirect('/applicant-management')->with('success', 'Applicant added successfully!');
    }

    public function edit($id)
    {
        $applicant = Applicant::findOrFail($id);
        return view('applicant.edit', compact('applicant'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:applicants,email,' . $id,
            'birthdate' => 'nullable|date',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:Male,Female,Other',
        ]);

        $applicant = Applicant::findOrFail($id);
        $applicant->update($request->all());

        return redirect('/applicant-management')->with('success', 'Applicant updated successfully!');
    }

    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();

        return response()->json(['success' => true]);
    }

}

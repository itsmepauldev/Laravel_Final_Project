<?php

namespace App\Http\Controllers;
use App\Models\ActivityLog;
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
        $applicant = Applicant::create([
            'name' => $request->name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'address' => $request->address,
        ]);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'create',
            'description' => 'Created applicant: ' . $request->name
        ]);


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
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'update',
            'description' => 'Updated applicant: ' . $applicant->name . ' (ID: ' . $applicant->id . ')'
        ]);

        return redirect('/applicant-management')->with('success', 'Applicant updated successfully!');
    }

    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'delete',
            'description' => 'Deleted applicant: ' . $applicant->name . ' (ID: ' . $applicant->id . ')'
        ]);

        return redirect()->back()->with('success', 'Applicant added Successfully!');

    }

}

<?php

// app/Http/Controllers/EmploymentController.php
namespace App\Http\Controllers;

use App\Models\Employment;
use App\Models\Applicant;
use Illuminate\Http\Request;

class EmploymentController extends Controller
{
    public function create()
    {
        $applicants = Applicant::all();
        return view('employment.create', compact('applicants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'company' => 'required|string',
            'position' => 'required|string',
            'year_from' => 'required|digits:4',
            'year_to' => 'required|digits:4|gte:year_from',
        ]);

        Employment::create($request->all());
        return redirect('/applicant-management')->with('success', 'Employment added!');
    }

    public function edit($id)
    {
        $employment = Employment::findOrFail($id);
        $applicants = Applicant::all();
        return view('employment.edit', compact('employment', 'applicants'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'company' => 'required|string',
            'position' => 'required|string',
            'year_from' => 'required|digits:4',
            'year_to' => 'required|digits:4|gte:year_from',
        ]);

        $employment = Employment::findOrFail($id);
        $employment->update($request->all());

        return redirect('/applicant-management')->with('success', 'Employment updated!');
    }

    public function destroy($id)
    {
        Employment::destroy($id);
        return redirect()->back()->with('success', 'Employment deleted!');
    }
}

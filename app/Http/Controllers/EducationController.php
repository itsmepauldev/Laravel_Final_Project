<?php

namespace App\Http\Controllers;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\Applicant;

class EducationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'school_name' => 'required|string|max:255',
            'level' => 'required|in:Elementary,High School,SHS,College',
            'year_from' => 'required|digits:4|integer',
            'year_to' => 'required|digits:4|integer|gte:year_from',
        ]);

        Education::create($request->all());
        $applicant = Applicant::find($request->applicant_id);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'create',
            'description' => 'Added education for: ' . $applicant->name . ' (ID: ' . $applicant->id . ')'
        ]);

        return redirect('/applicant-management')->with('success', 'Education added successfully!');

    }
    public function edit($id)
    {
        $education = Education::with('applicant')->findOrFail($id);
        $applicants = \App\Models\Applicant::all();
        return view('education.edit', compact('education', 'applicants'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'school_name' => 'required|string|max:255',
            'level' => 'required|in:Elementary,High School,SHS,College',
            'year_from' => 'required|digits:4|integer',
            'year_to' => 'required|digits:4|integer|gte:year_from',
        ]);

        $education = Education::findOrFail($id);
        $education->update($request->all());
        $applicant = Applicant::find($education->applicant_id);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'update',
            'description' => 'Updated education for: ' . $applicant->name . ' (ID: ' . $applicant->id . ')'
        ]);

        return redirect('/applicant-management')->with('success', 'Education updated successfully!');

    }

    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $applicant = $education->applicant;
        $education->delete();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'delete',
            'description' => 'Deleted education for: ' . $applicant->name . ' (ID: ' . $applicant->id . ')'
        ]);

        return redirect()->back()->with('success', 'Education record deleted!');
    }
    public function create()
    {
        $applicants = \App\Models\Applicant::all();
        return view('education.create', compact('applicants'));
    }

}

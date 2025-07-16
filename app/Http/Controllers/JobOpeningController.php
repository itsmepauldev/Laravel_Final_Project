<?php

namespace App\Http\Controllers;

use App\Models\JobOpening;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

class JobOpeningController extends Controller
{
    public function index()
    {
        $jobs = JobOpening::all();
        return view('job.index', compact('jobs'));
    }

    public function create()
    {
        return view('job.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'date_needed' => 'required|date',
            'date_expiry' => 'required|date',
            'location' => 'required'
        ]);

        $job = JobOpening::create($request->all());
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'create',
            'description' => 'Created Job Opening: ' . $job->title
        ]);

        return redirect()->route('job.index')->with('success', 'Job Opening Created!');
    }

    public function edit($id)
    {
        $job = JobOpening::findOrFail($id);
        return view('job.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'date_needed' => 'required|date',
            'date_expiry' => 'required|date|after_or_equal:date_needed',
            'location' => 'required'
        ]);

        $job = JobOpening::findOrFail($id);
        $job->update($request->all());
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'update',
            'description' => 'Updated Job Opening: ' . $job->title
        ]);
        return redirect()->route('job.index')->with('success', 'Job Opening updated successfully!');
    }

    public function destroy($id)
    {
        $job = JobOpening::findOrFail($id);
        $title = $job->title;
        $job->delete();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'delete',
            'description' => 'Deleted Job Opening: ' . $title
        ]);

        return redirect()->route('job.index')->with('success', 'Job deleted successfully.');
    }

}


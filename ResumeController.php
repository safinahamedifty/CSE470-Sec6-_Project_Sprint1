<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $resumeFile = $user->resume_file ?? null;

        return view('resume.dashboard', [
            'resumeFile' => $resumeFile,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'resume_file' => 'required|file|mimes:pdf|max:2048',
        ]);

        $user = $request->user();
        if ($request->hasFile('resume_file')) {
            if ($user->resume_file) {
                Storage::disk('resumes')->delete($user->resume_file);
            }
            $path = $request->file('resume_file')->store('resumes', 'public');
            $user->update(['resume_file' => $path]);
        }

        return redirect()->route('resume.index')->with('status', 'Resume uploaded successfully!');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'resume_file' => 'required|exists:users,resume_file',
        ]);

        $user = $request->user();
        if ($user->resume_file) {
            Storage::disk('resumes')->delete($user->resume_file);
            $user->update(['resume_file' => null]);
        }

        return redirect()->route('resume.index')->with('status', 'Resume deleted successfully!');
    }

    public function saveDetails(Request $request)
    {
        $request->validate([
            'summary' => 'nullable|string|max:1000',
            'skills' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:1000',
        ]);

        $user = $request->user();
        $user->update([
            'bio' => $request->summary,
            'skills' => $request->skills,
            'experience' => $request->experience,
        ]);

        return response()->json(['success' => true]);
    }
}
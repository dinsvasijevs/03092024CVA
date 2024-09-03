<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CVController extends Controller
{
    use AuthorizesRequests;

    public function index(): View|Factory|Application
    {
        $cvs = Auth::user()->cvs()->latest()->paginate(10);
        return view('cvs.index', compact('cvs'));
    }

    public function create(): View|Factory|Application
    {
        return view('cvs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'summary' => 'required|string',
            'education' => 'required|string',
            'work_experience' => 'required|string',
            'skills' => 'required|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('resume')) {
            $validatedData['resume'] = $request->file('resume')->store('resumes', 'public');
        }

        Auth::user()->cvs()->create($validatedData);

        return redirect()->route('cvs.index')->with('success', 'CV created successfully.');
    }

    public function show(CV $cv): View|Factory|Application
    {
        $this->authorize('view', $cv);
        return view('cvs.show', compact('cv'));
    }

    public function edit(CV $cv): View|Factory|Application
    {
        $this->authorize('update', $cv);
        return view('cvs.edit', compact('cv'));
    }

    public function update(Request $request, CV $cv): RedirectResponse
    {
        $this->authorize('update', $cv);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'summary' => 'required|string',
            'education' => 'required|string',
            'work_experience' => 'required|string',
            'skills' => 'required|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('resume')) {
            $validatedData['resume'] = $request->file('resume')->store('resumes', 'public');
        }

        $cv->update($validatedData);

        return redirect()->route('cvs.show', $cv)->with('success', 'CV updated successfully.');
    }

    public function destroy(CV $cv): RedirectResponse
    {
        $this->authorize('delete', $cv);
        $cv->delete();
        return redirect()->route('cvs.index')->with('success', 'CV deleted successfully.');
    }
}

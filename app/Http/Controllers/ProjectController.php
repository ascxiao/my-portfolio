<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::orderBy('created_at', 'desc')->paginate(9);

        return view('pages.projects', ['projects'=>$projects]);
    }

    public function admin_index() {
        $projects = Project::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.admin-projects', ['projects'=>$projects]);
    }

   public function create()
    {
        return view('create.create-projects');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'image' => 'required|image|max:2048',
            'duration' => 'required|string|max:64',
            'link' => 'required|url'
        ]);

        if ($request->tags) {
            $validated['tags'] = array_map('trim', explode(',', $request->tags));
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 's3');
        }

        Project::create($validated);

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully!');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('create.edit-project', compact('project'));
    }
    
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'image' => 'required|image|max:2048',
            'duration' => 'required|string|max:64',
            'link' => 'required|url'
        ]);
    
        if ($request->tags) {
            $validated['tags'] = array_map('trim', explode(',', $request->tags));
        }

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('s3')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('images', 's3');
        }

        $project->update($validated);

        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully!');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully!');
    }
}

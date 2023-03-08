<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'DESC')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:projects|max:60',
            'description' => 'required|string|min:30',
            'image' => 'nullable|url',
            'link' => 'required|url|unique:projects'
        ], [
            'name.required' => 'Project name is required',
            'name.unique' => "$request->name name is already taken",
            'name.max' => 'The project name max length is 60 characters',
            'image.url' => 'The image must be an URL',
            'description.required' => 'Project description is required',
            'description.min' => 'The project description min length is 30 characters',
            'link.required' => 'Project link is required',
            'link.url' => 'The link must be an URL',
            'link.unique' => "The project Link exist already",

        ]);


        $data = $request->all();
        $project = new Project();
        $project->fill($data);
        $project->save();
        return to_route('admin.projects.show', $project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => ['required', 'string', Rule::unique('projects')->ignore($project->id), 'max:60'],
            'description' => 'required|string|min:30',
            'image' => 'nullable|url',
            'link' => 'required|url|unique:projects'
        ], [
            'name.required' => 'Project name is required',
            'name.unique' => "$request->name name is already taken",
            'name.max' => 'The project name max length is 60 characters',
            'image.url' => 'The image must be an URL',
            'description.required' => 'Project description is required',
            'description.min' => 'The project description min length is 30 characters',
            'link.required' => 'Project link is required',
            'link.url' => 'The link must be an URL',
            'link.unique' => "The project Link exist already",

        ]);


        $data = $request->all();

        $project->fill($data);
        $project->save();

        return redirect()->route('admin.projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}

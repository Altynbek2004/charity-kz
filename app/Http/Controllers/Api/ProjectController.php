<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::active()
            ->with('donations')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $projects
        ]);
    }

    public function show(Project $project)
    {
        $project->load(['donations' => function($query) {
            $query->completed()->latest()->take(10);
        }]);

        return response()->json([
            'success' => true,
            'data' => $project
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'full_description' => 'nullable|string',
            'target_amount' => 'required|numeric|min:1',
            'image' => 'nullable|image|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project = Project::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Жоба сәтті құрылды',
            'data' => $project
        ], 201);
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'full_description' => 'nullable|string',
            'target_amount' => 'required|numeric|min:1',
            'image' => 'nullable|image|max:2048',
            'status' => 'in:active,completed,paused,cancelled',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Жоба сәтті жаңартылды',
            'data' => $project
        ]);
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'Жоба сәтті жойылды'
        ]);
    }
}

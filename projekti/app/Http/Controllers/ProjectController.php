<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\User; 
use App\Models\Project; 
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('projects.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'project_price' => 'nullable|numeric',
            'completed_tasks' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'users' => 'required|array|min:1',
            'users.*' => 'exists:users,id'
        ]);

        $user = Auth::user();
        $users = Arr::wrap($request->users);
        $projectData = [
            'project_name' => $request->name,
            'project_description' => $request->description,
            'project_price' => $request->project_price,
            'completed_tasks' => $request->completed_tasks,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];

        $project = Project::create($projectData);

        // Attach the logged-in user as admin
        $project->users()->attach($user->id, ['role' => 'admin']);
        var_dump($users);
        // Attach the rest of the users as members
        foreach ($users as $userId) {
            if ($userId !== $user->id) {
                var_dump($userId);
                $project->users()->attach($userId, ['role' => 'member']);
            }
        }

        return redirect()->route('home')->with('success', 'Project created successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Project;

class ProfileController extends Controller
{
    public function index()
    {
        $projectsAsLeader = $this->getProjectsByRole('admin');
        $projectsAsMember = $this->getProjectsByRole('member');
        
        return view('profiles.index', compact('projectsAsLeader', 'projectsAsMember'));
    }

    private function getProjectsByRole($role)
    {
        return auth()->user()->projects()->wherePivot('role', $role)->get();
    }

    public function viewProject($projectId)
    {
        $project = Project::findOrFail($projectId);

        $user = auth()->user();
        $userRole = $project->users()->where('user_id', $user->id)->first()->pivot->role;

        if ($userRole === 'admin') {
            return view('profiles.view', compact('project'));
            
            }

        return view('profiles.view', compact('project'));
    }
}

?>

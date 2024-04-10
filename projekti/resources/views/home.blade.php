@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="{{ route('projects.create') }}" class="btn btn-primary">Add New Project</a>
                    <a href="{{ route('profile.index') }}">My Profile</a>
                    @if($userProjects->isNotEmpty())
    <h2>My Projects</h2>
    <ul>
        @foreach($userProjects as $project)
            <li>{{ $project->project_name }}</li>
        @endforeach
    </ul>
@else
    <p>You have no projects yet.</p>
@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

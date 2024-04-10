<!-- profiles.index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Projects</div>

                    <div class="card-body">
                        <h2>Projects you lead:</h2>
                        <ul>
                            @foreach ($projectsAsLeader as $project)
                                <li><a href="{{ route('profile.viewProject', $project->id) }}">{{ $project->project_name }}</a></li>
                            @endforeach
                        </ul>

                        <h2>Projects you are a member of:</h2>
                        <ul>
                            @foreach ($projectsAsMember as $project)
                                <li><a href="{{ route('profile.viewProject', $project->id) }}">{{ $project->project_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

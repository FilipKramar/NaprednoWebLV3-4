@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $project->name }}</div>

                    <div class="card-body">
                    <div class="mb-3">
                            <strong>Project Name:</strong>
                            <p class="">{{ $project->project_name }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Description:</strong>
                            <p class="">{{ $project->project_description }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Price:</strong>
                            <p class="">{{ $project->project_price }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Completed Tasks:</strong>
                            <p class="">{{ $project->completed_tasks }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Start Date:</strong>
                            <p class="">{{ $project->start_date }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>End Date:</strong>
                            <p class="">{{ $project->end_date }}</p>
                        </div>
                        <div class="mb-3">
    <strong>Users:</strong>
    <ul>
        @foreach ($project->users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

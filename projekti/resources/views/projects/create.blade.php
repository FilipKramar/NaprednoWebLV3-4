@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Project</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Project Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Project Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="project_price">Project Price</label>
                                <input type="number" name="project_price" id="project_price" class="form-control" step="0.01">
                            </div>

                            <div class="form-group">
                                <label for="completed_tasks">Completed Tasks</label>
                                <textarea name="completed_tasks" id="completed_tasks" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="users">Users</label>
                                <select name="users[]" id="users" class="form-control" multiple required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

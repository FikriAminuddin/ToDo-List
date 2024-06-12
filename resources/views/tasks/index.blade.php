@extends('layouts.app')

@section('styles')
 <style>
    #outer
    {
        width: auto;
        text-align: center;
    }
    .inner
    {
        display: inline-block;
    }
 </style>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                @if (Session::has('alert-success')) <!-- Checking if there is a success alert in the session -->
                    <div class="alert alert-success" role="alert"> <!-- Displaying success alert -->
                        {{ Session::get('alert-success') }} <!-- Displaying the success message -->
                    </div>
                @endif

                @if (Session::has('alert-info'))
                    <div class="alert alert-info" role="alert">
                        {{ Session::get('alert-info') }}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif

                

                


                <a class="btn btn-info" href="{{ route('tasks.create') }}">Create Task</a> <!-- Link to create a new task -->

    @if (count($tasks) > 0) <!-- Checking if there are tasks to display -->
        <table class="table mt-3"> <!-- Creating a table to display tasks -->
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Completed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task) <!-- Looping through tasks -->
                    <tr>
                        <td>{{ $task->title }}</td> <!-- Displaying task title -->
                        <td>{{ $task->description }}</td> <!-- Displaying task description -->
                        <td>
                            @if ($task->is_completed == 1) <!-- Checking if task is completed -->
                                <span class="badge bg-success">Completed</span> <!-- Displaying completed badge -->
                            @else
                                <span class="badge bg-danger">Not Completed</span> <!-- Displaying not completed badge -->
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-success btn-sm">View</a> <!-- Link to view task details -->
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info btn-sm">Edit</a> <!-- Link to edit task -->
                            <form method="POST" action="{{ route('tasks.destroy') }}" class="inner" style="display:inline-block;"> <!-- Form to delete task -->
                                @csrf <!-- CSRF token for security -->
                                @method('DELETE') <!-- Method override for DELETE -->
                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tasks are created yet.</p> <!-- Displaying message when no tasks are found -->
    @endif
</div>
@endsection <!-- Ending the content section -->

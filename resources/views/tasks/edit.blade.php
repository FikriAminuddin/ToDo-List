@extends('layouts.app') <!-- Extends the main app layout -->

@section('content') <!-- Starts a content section -->
<div class="container"> <!-- Main container for the content -->
    <div class="row justify-content-center"> <!-- Centers the content -->
        <div class="col-md-8"> <!-- Creates a column for medium-sized screens -->
            <div class="card"> <!-- Creates a Bootstrap card -->
                <div class="card-header">ToDo List</div> <!-- Card header -->

                <div class="card-body"> 
                    <h4>Edit Form</h4> 

                    <form method="post" action="{{ route('tasks.update') }}"> <!-- Form for updating tasks -->
                        @csrf <!-- CSRF token for security -->
                        @method('PUT') <!-- HTTP method override for PUT -->

                        <input type="hidden" name="task_id" value="{{ $task->id }}"> <!-- Hidden input for task ID -->

                        <div class="mb-3">
                            <label class="form-label">Title</label> <!-- Label for the title input -->
                            <input type="text" name="title" class="form-control" value="{{ $task->title }}"> <!-- Text input for title -->
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label> <!-- Label for description input -->
                            <textarea name="description" class="form-control" cols="5" rows="5">{{ $task->description }}</textarea> <!-- Textarea for description -->
                        </div>  

                        <div class="mb-3">
                            <label for="">Status</label> <!-- Label for status dropdown -->
                            <select name="is_completed" class="form-control"> <!-- Dropdown for task status -->
                                <option disabled selected>Select Option</option> <!-- Default option -->
                                <option value="1">Completed</option> <!-- Option for completed status -->
                                <option value="0">Incompleted</option> <!-- Option for incomplete status -->
                            </select>
                        </div>
  
                        <button type="submit" class="btn btn-primary">Update</button> <!-- Submit button -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection <!-- Ends the content section -->

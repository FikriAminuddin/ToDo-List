@extends('layouts.app') <!-- Extending the main app layout -->

@section('content') <!-- Starting a content section -->
<div class="container"> <!-- Main container for the content -->
    <div class="row justify-content-center"> <!-- Centering the content -->
        <div class="col-md-8"> <!-- Creating a column for medium-sized screens -->
            <div class="card"> <!-- Creating a Bootstrap card -->
                <div class="card-header">{{ __('Dashboard') }}</div> <!-- Card header with localized text -->

                <div class="card-body"> <!-- Card body -->
                    @if (session('status')) <!-- Checking if there's a status message in the session -->
                        <div class="alert alert-success" role="alert"> <!-- Displaying success alert -->
                            {{ session('status') }} <!-- Displaying the status message -->
                        </div>
                    @endif

                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-info">Go Back</a> <br> <!-- Link to go back to the previous page -->
                    <b>Your Task Title is: </b> {{ $task->title }} <br> <!-- Displaying the task title -->
                    <b>Your Task Description is: </b> {{ $task->description }} <!-- Displaying the task description -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection <!-- Ending the content section -->

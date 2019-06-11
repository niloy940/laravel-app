@extends('layouts.master')

@section('title', "$project->title")

@section('content')
    <div class="section">
        <div class="box">
            <h1 class="title">Project Details</h1>
            <br>

            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <tr>
                    <th>Project ID</th>
                    <th>Project Title</th>
                    <th>Project Description</th>
                </tr>
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description}}</td>
                </tr>
            </table>

            <form method="post" action="/projects/{{ $project->id }}">
                @csrf
                @method('delete')

                <div class="field">
                    <div class="control">
                        <a href="/projects/{{ $project->id }}/edit" class="button is-primary is-rounded">Edit</a>

                        <button type="submit" class="button is-danger is-rounded">Delete</button>
                    </div>
                </div>
            </form>
        </div>

        <br>

        <!-- View All Tasks -->
        @if($project->tasks->count())
            <div class="box has-background-warning">
                <h3 class="subtitle">All Tasks</h3>

                @foreach($project->tasks as $task)
                    <div>
                        <form method="post" action="/completed-tasks/{{ $task->id }}">
                            @csrf

                            @if($task->completed)
                                @method('delete')
                            @endif

                            <label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">
                                <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
                                {{ $task->body }}
                            </label>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Create New Tasks -->
        <div class="box">
            <div class="field">
                <form method="post" action="/projects/{{ $project->id }}/tasks">
                    @csrf

                    <label class="label" for="body">Add Tasks</label>
                    <div class="control">
                        <input class="input is-primary" type="text" name="body" placeholder="add new task">
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-success is-rounded">Add</button>
                    </div>
                </div>

                @include('layouts.errors')
            </form>
        </div>
    </div>
@endsection

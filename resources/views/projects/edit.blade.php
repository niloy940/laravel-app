@extends('layouts.master')

@section('title', 'Edit Project')

@section('content')
    <div class="section">
        <div class="box">
            <h1 class="title">Edit Project</h1>

            <form method="post" action="/projects/{{ $project->id }}">
                @csrf
                @method('patch')

                <div class="field">
                    <label class="label" for="title">Title</label>
                    <div class="control">
                        <input class="input is-primary {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" value="{{$project->title}}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="description">Description</label>
                    <div class="control">
                        <textarea class="textarea is-primary {{ $errors->has('description') ? 'is-danger' : '' }}" name="description">{{ $project->description }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-success">Update Project</button>
                    </div>
                </div>

                @include('layouts.errors')

            </form>
        </div>
    </div>
@endsection

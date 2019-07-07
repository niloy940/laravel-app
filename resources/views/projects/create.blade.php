@extends('layouts.master')

@section('title', 'Create A Project')

@section('content')
    <div class="section">
        <div class="box">
            <h1 class="title">Create A Project</h1>

            <form method="post" action="/projects">
                @csrf

                <div class="field">
                    <label class="label" for="title">Title</label>
                    <div class="control">
                        <input class="input is-primary {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" placeholder="project title here" value="{{ old('title') }}">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="description">Description</label>
                    <div class="control">
                        <textarea class="textarea is-primary {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" placeholder="enter description here">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-success">Create Project</button>
                    </div>
                </div>

                @include('layouts.errors')

            </form>
        </div>
    </div>
@endsection

@extends('layouts.master')

@section('title', 'All Projects')

@section('content')
    <div class="section">
        <h1 class="title">All Projects</h1>

        <ul>
            @foreach($projects as $project)
                <li><a href="/projects/{{ $project->id }}">{{ $project->title }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection

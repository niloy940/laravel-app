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

    <div class="box">
        <h1 class="subtitle">Service Container & Auto-Resolution through Service Provider :</h1>
        <p class="subtitle">Twitter API key: {{ $twitter->getKey() }}</p>
    </div>
@endsection

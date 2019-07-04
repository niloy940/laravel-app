@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div class="section">
        <h1 class="subtitle">binding interface with implementation using service provider</h1>
        <p>{{ $users->create('Niloy') }}</p>
    </div>
@endsection

@extends('layouts.app')
@section('title', 'Settings / Logs ·')

@section('content')
    @include("$view.sidebar")
    <div class="main_content">
        <livewire:member.settings.logs />
    </div>
@endsection
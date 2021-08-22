@extends('layouts.app')
@section('title', 'Settings / API ·')

@section('content')
    @include("$view.sidebar")
    <div class="main_content">
        <livewire:member.settings.api />
    </div>
@endsection
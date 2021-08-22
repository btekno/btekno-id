@extends('layouts.app')
@section('title', 'Settings / Notifications ·')

@section('content')
    @include("$view.sidebar")
    <div class="main_content">
        <livewire:member.settings.notification />
    </div>
@endsection
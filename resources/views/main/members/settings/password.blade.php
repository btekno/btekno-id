@extends('layouts.app')
@section('title', 'Settings / Password ·')

@section('content')
    @include("$view.sidebar")
    <div class="main_content">
        <livewire:member.settings.password />
    </div>
@endsection
@extends('layouts.app')
@section('title', 'Settings / Appearance ·')

@section('content')
    @include("$view.sidebar")
    <div class="main_content">
        <livewire:member.settings.appearance />
    </div>
@endsection
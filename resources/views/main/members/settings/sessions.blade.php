@extends('layouts.app')
@section('title', 'Settings / Sessions ·')

@section('content')
    @include("$view.sidebar")
    <div class="main_content">
        <livewire:member.settings.session />
    </div>
@endsection
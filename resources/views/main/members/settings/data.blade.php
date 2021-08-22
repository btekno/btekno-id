@extends('layouts.app')
@section('title', 'Settings / Data ·')

@section('content')
    @include("$view.sidebar")
    <div class="main_content">
        <livewire:member.settings.data />
    </div>
@endsection
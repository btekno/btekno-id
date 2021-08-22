@extends('layouts.app')
@section('title', 'Settings / Delete ·')

@section('content')
    @include("$view.sidebar")
    <div class="main_content">
        <livewire:member.settings.delete />
    </div>
@endsection
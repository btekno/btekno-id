@extends('layouts.app')
@section('title', 'Settings / Account ·')

@section('content')
    @include("$view.sidebar")
    <div class="main_content">
        <livewire:member.settings.account />
    </div>
@endsection
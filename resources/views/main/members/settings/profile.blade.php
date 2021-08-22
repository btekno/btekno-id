@extends('layouts.app')
@section('title', 'Settings / Profile ·')

@section('content')
	@include("$view.sidebar")
	<div class="main_content">
        <livewire:member.settings.profile />
    </div>
@endsection
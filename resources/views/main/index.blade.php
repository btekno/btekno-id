@extends('layouts.app')

{{-- Meta --}}
@section('title', 'Welcome to ')
@section('description', 'Discussion and hangout while doing a lot of things')
@section('url', url()->current())

{{-- Content --}}
@section('content')

	<div class="ps-3 pt-1 pb-1" style="background: #92c83b;margin-top:65px">
		<h3 class="font-bold text-white mt-3 mb-0">
			Welcome to Btekno 👋
		</h3>
		<p class="lead text-white mb-3">
			{{-- Let's discussion and hangout while doing a lot of stuff. --}}
			Let's Gabut together.
		</p>
	</div>

    <div class="row py-3 px-5">
    	<div class="col-md-8">

    		<h5 class="font-bold ml-2 mb-3">Integrated Services</h5>
    		<div class="row no-gutters">
				{{-- @foreach(launcher() as $temp)
					<div class="col-md-2 mb-3">
						<div class="">
							<div class="card-media mb-1">
								<a href="{{ $temp['route'] }}">
									<div class="card-media-overly"></div>
									<img src="{{ $temp['image'] }}" alt="{{ $temp['label'] }}" class="">
								</a>
							</div>
							<div class="card-body p-0 text-center">
								<a href="{{ $temp['route'] }}" class="text-lg font-bold">
									{{ $temp['label'] }}
								</a>
								<p class="text-xs text-gray-400">
									{{ $temp['desc'] }}
								</p>
							</div>
						</div>
					</div>
				@endforeach --}}
    		</div>

    		<h5 class="font-bold ml-2 mb-3">Recent Contributions</h5>

    	</div>
    	<div class="col-md-4">

    		<h5 class="font-bold ml-2 mb-3">Recently Joined</h5>
    		<div class="contact-list mt-0 ml-1">
    			@foreach(App\Models\User::latest()->paginate(5) as $temp)
	                <a href="">
	                    <div class="contact-avatar">
	                        <img src="{{ Helper::getCDNImage($temp->image, 80) }}" alt="">
	                    </div>
	                    <div class="contact-username">
	                    	{{ $temp->name }}
	                    	<small class="d-block text-muted">{{ $temp->created_at->diffForHumans() }}</small>
	                    </div>
	                </a>
                @endforeach
            </div>

    		<h5 class="font-bold ml-2 mb-3">Top Members</h5>


    		<p class="small line-height-sm mt-3">
    			<b>{{ date('Y') }} © Btekno</b><br/>
				<a href="https://status.btekno.id" class="mr-1" target="_blank">Status</a> &nbsp; 
				<a href="{{ route('about') }}">About</a> &nbsp; 
				<a href="{{ route('terms') }}">Terms</a> &nbsp; 
				<a href="{{ route('privacy') }}">Privacy</a> &nbsp; 
				<a href="{{ route('sponsors') }}">Sponsors</a> &nbsp; 
				<a href="{{ route('api') }}">API</a>
    		</p>
    	</div>
    </div>

@endsection
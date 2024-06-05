<style>
	.nav-item:hover .nav-link {
	text-decoration: underline;
	}
	.profile-info {
	display: none;
	position: absolute;
	top: 40px;
	right: 0;
	background-color: #fff;
	border: 1px solid #ccc;
	padding: 10px;
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	z-index: 1;
	}
	.nav-item .profile:hover .profile-info {
	display: block;
	}
	.profile-info a {
	text-decoration: none;
	color: #333;
	display: block;
	}
	.profile-info a:hover {
	text-decoration: underline;
	}
	.profile-info p {
	margin: 5px 0;
	color: #333;
	}
	.icon.user.outline {
	color: black;
	}
	.hidden {
	display: none;
	}
	.navbar-bawah .nav-item .nav-link.active {
	text-decoration: underline; 
	color: #13005A !important; 
	}
	.col-md-9 {
	background-color: #F4F4F4;
	}
	.community-background {
	background-image: url('/assets/img/comunity.jpg'); /* Replace with the path to your image */
	background-size: cover; /* Ensure the image covers the entire div */
	background-position: center; /* Center the image */
	background-repeat: no-repeat; /* Prevent the image from repeating */
	background-color: #B4E8CE; /* Fallback color in case the image doesn't load */
	padding: 2%;
	margin-top: 2%;
	margin-bottom: 2%;
	}
	.card-custom {
	position: relative;
	overflow: hidden;
	background-size: cover;
	background-position: center;
	height: 95%;
	}
	.card-custom .card-body {
	position: relative;
	z-index: 2;
	}
	.card-custom .card-img-top {
	border-radius: 50%;
	width: 90px;
	height: 90px;
	object-fit: cover;
	position: absolute;
	top: 15px;
	left: 50%;
	transform: translateX(-50%);
	z-index: 3;
	border: 1px solid white;
	}
	.card-bg {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 27%;
	background-size: cover;
	background-position: center;
	z-index: 1;
	}
</style>
@extends('layouts.template_main')
@section('title', 'Community')
@section('content')
<main class="container-fluid border" style="margin-top: 69px;">
	<div class="container">
		<div class="row">
			<div class="col-md-9" style="overflow-y: auto;">
				<div class="community-container">
					<div class="community-background text-center">
						<h2>Welcome to Community Page</h2>
						<p>Temukan dan ikuti Komunitas yang kamu inginkan</p>
						<div>
							<a href="{{ route('viewcommunity') }}" class="btn btn-light w-40 mt-2 me-2" style="border-radius: 10px; border-color: #13005A; color: #13005A;">
								<i class="fas fa-plus-circle" style="font-size: 15px; color: #13005A;"></i>
								Create New Community
							</a>
							<button type="button" class="btn btn-light w-45 mt-2 ms-2" style="border-radius: 10px; border-color: #13005A; color: #13005A;">
								<i class="fas fa-search" style="font-size: 15px; color: #13005A;"></i>
								Find Your Community
							</button>
						</div>
					</div>

					@if ($commBusiness->count() > 0)
					<div class="d-flex justify-content-between align-items-center">
						<h3>Business</h3>
					</div>
					<div class="row">
						@foreach ($commBusiness as $cb)
						<div class="col-md-4 col-sm-6 mb-4">
							<div class="card card-custom">
								<div class="card-bg" style="background-image: url('{{ $cb->thumbnail }}')"></div>
								<img src="{{ $cb->user->avatar }}" class="card-img-top border-dark" alt="Card image">
								<div class="card-body text-center mt-5 pt-5">
									<h5 class="card-title mt-5">{{ $cb->name }}</h5>
									<p class="card-text">{{ Str::limit($cb->description, 75) }}</p>
									<div class="d-flex justify-content-center mt-5">
									<a href="{{ route('community.detail', ['slug' => $cb->slug]) }}" class="btn btn-light border-dark me-2 btn-sm" style="border-radius: 10px;">About</a>
										@php
											$isJoined = $cb->members->contains(Auth::id());
										@endphp
										@if($isJoined)
										<button type="button" class="btn btn-dark me-2 btn-sm" style="border-radius: 10px;" disabled>Joined</button>
										@else
										<a href="{{ route('community.detail', ['slug' => $cb->slug]) }}" class="btn btn-light border-dark me-2 btn-sm" style="border-radius: 10px;">Join Community</a>
										@endif
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					@endif

					@if ($commFinances->count() > 0)
					<div class="d-flex justify-content-between align-items-center">
						<h3>Finance</h3>
					</div>
					<div class="row">
						@foreach ($commFinances as $cb)
						<div class="col-md-4 col-sm-6 mb-4">
							<div class="card card-custom">
								<div class="card-bg" style="background-image: url('{{ $cb->thumbnail }}')"></div>
								<img src="{{ $cb->user->avatar }}" class="card-img-top border-dark" alt="Card image">
								<div class="card-body text-center mt-5 pt-5">
									<h5 class="card-title mt-5">{{ $cb->name }}</h5>
									<p class="card-text">{{ $cb->description }}</p>
									<div class="d-flex justify-content-center mt-5">
										<a href="{{ route('community.detail', ['slug' => $cb->slug]) }}" class="btn btn-light border-dark me-2 btn-sm" style="border-radius: 10px;">About</a>
										@php
											$isJoined = $cb->members->contains(Auth::id());
										@endphp
										@if($isJoined)
										<button type="button" class="btn btn-dark me-2 btn-sm" style="border-radius: 10px;" disabled>Joined</button>
										@else
										<a href="{{ route('community.detail', ['slug' => $cb->slug]) }}" class="btn btn-light border-dark me-2 btn-sm" style="border-radius: 10px;">Join Community</a>
										@endif
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					@endif

					@if ($commPersonals->count() > 0)
					<div class="d-flex justify-content-between align-items-center">
						<h3>Personal Development</h3>
					</div>
					<div class="row">
					@foreach ($commPersonals as $cb)
						<div class="col-md-4 col-sm-6 mb-4">
							<div class="card card-custom">
								<div class="card-bg" style="background-image: url('{{ $cb->thumbnail }}')"></div>
								<img src="{{ $cb->user->avatar }}" class="card-img-top border-dark" alt="Card image">
								<div class="card-body text-center mt-5 pt-5">
									<h5 class="card-title mt-5">{{ $cb->name }}</h5>
									<p class="card-text">{{ $cb->description }}</p>
									<div class="d-flex justify-content-center mt-5">
										<a href="{{ route('community.detail', ['slug' => $cb->slug]) }}" class="btn btn-light border-dark me-2 btn-sm" style="border-radius: 10px;">About</a>
										@php
											$isJoined = $cb->members->contains(Auth::id());
										@endphp
										@if($isJoined)
										<button type="button" class="btn btn-dark me-2 btn-sm" style="border-radius: 10px;" disabled>Joined</button>
										@else
										<a href="{{ route('community.detail', ['slug' => $cb->slug]) }}" class="btn btn-light border-dark me-2 btn-sm" style="border-radius: 10px;">Join Community</a>
										@endif
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</main>
@endsection
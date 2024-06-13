@extends('layouts.template_main')
@section('title', 'Community')
@section('content')
<style>
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
	.hero-section {
	background-image: url('/assets/img/hero\ banner\ community.png');
	height: 40vh;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	color: white;
	text-align: center;
	margin-top: 60px; /* Tambahkan margin atas */
	}
	.search-bar {
	width: 50%;
	max-width: 600px;
	border-radius: 25px;
	overflow: hidden;
	margin-top: 20px;
	}
	.search-bar input {
	border: none;
	border-radius: 25px 0 0 25px;
	}
	.search-bar button {
	border: none;
	border-radius: 0 25px 25px 0;
	}
	.card-custom {
	position: relative;
	overflow: hidden;
	background-size: cover;
	background-position: center;
	height: 100%;
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
	height: 40%;
	background-size: cover;
	background-position: center;
	z-index: 1;
	}
	.notification-modal {
	background: transparent;
	display: flex;
	align-items: flex-start; /* Align to the top */
	justify-content: flex-end; /* Align to the right */
	position: absolute;
	top: 50px; /* Adjust this value based on your navbar height */
	right: 10px; /* Adjust this value for horizontal alignment */
	width: auto;
	}
	.notification-card {
	background-color: #f0f0f0;
	padding: 10px;
	border-radius: 15px;
	border-bottom-right-radius: 90px; /* Bottom-right corner */
	border-top-right-radius: 0;
	display: flex;
	align-items: center;
	width: 300px;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	margin: 10px;
	}
	.notification-card img {
	width: 50px;
	height: 50px;
	border-radius: 50%;
	margin-right: 15px;
	}
	.notification-content {
	flex-grow: 1;
	}
	.notification-title {
	font-weight: bold;
	font-size: 16px;
	}
	.notification-message {
	color: #555;
	margin: 5px 0;
	}
	.notification-time {
	font-size: 12px;
	color: #aaa;
	}
	.modal-content {
	background: transparent;
	border: none;
	box-shadow: none;
	}
	.modal-body {
	padding: 0;
	}
	.notification-card .notification-content {
	display: flex;
	flex-direction: column;
	}
	.notification-icon {
	position: relative;
	}
	.notification-icon .red-dot {
	position: absolute;
	top: -5px;
	right: -5px;
	width: 20px;
	height: 20px;
	background-color: red;
	color: white;
	border-radius: 50%;
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 12px;
	font-weight: bold;
	border: 1px solid white;
	}
	.modal-header {
	border-bottom: none;
	}
	.modal-body {
	padding: 2rem;
	}
	.modal-footer {
	border-top: none;
	justify-content: flex-end;
	padding: 1rem 2rem;
	}
	.modal-content {
	border-radius: 10px;
	}
	.form-group {
	margin-bottom: 1.5rem;
	}
	.form-text {
	margin-top: 0.5rem;
	}
	.sidebar-right {
	left: 20px;
	width: 200px;
	height: 400px;
	border-radius: 9px;
	}
	.border-custom {
	border: 1px solid #ddd;
	border-radius: 10px;
	overflow: hidden;
	}
	.no-padding {
	padding: 5%;
	border: none;
	border-radius: 0;
	}
	.content {
	padding: 16px; /* Add padding for the content inside the sidebar */
	}
	.text-muted {
	color: #adb5bd;
	}
	.text-center {
	text-align: center;
	}
	.mb-2 {
	margin-bottom: .5rem;
	}
	@media (max-width: 991px) {
	.bottom-nav .notification-icon {
	position: relative;
	}
	.bottom-nav .notification-icon .red-dot {
	top: -8%; 
	right: 35%; 
	transform: none; 
	}
	}
</style>
<section class="hero-section">
	<h1>Welcome to Community page!</h1>
	<p>Temukan dan ikuti Komunitas yang kamu inginkan</p>
	<div class="search-bar d-flex">
		<input type="text" class="form-control py-3" placeholder="Search for communities...">
		<button class="btn btn-light"><i class="fas fa-search"></i></button>
	</div>
</section>
<main class="container-fluid" style="padding-inline: 12%;">
	<div class="row">
		<!-- Main Content Section -->
		<div class="col-md-8 col-lg-9 mt-3">

			@if ($commFinances->count() > 0)
			<div class="d-flex justify-content-between align-items-center mb-3">
				<h3>Finance</h3>
			</div>
			<div class="row">
				@foreach ($commFinances as $cb)
				<div class="col-md-4 col-sm-6 mb-4">
					<div class="card card-custom">
						<div class="card-bg" style="background-image: url('{{ $cb->thumbnail }}');"></div>
						<img src="{{ $cb->advert_thumbnail }}" class="card-img-top border-dark" alt="Card image">
						<div class="card-body text-center mt-5 pt-5">
							<h5 class="card-title mt-5">{{ $cb->name }}</h5>
							<p class="card-text">{{ $cb->description }}</p>
							<div class="d-flex justify-content-center mt-3">
								<a href="{{ route('community.detail', ['slug' => $cb->slug]) }}" type="button" class="btn btn-light border-dark px-5" style="border-radius: 10px;">About Community</a>
							</div>
						</div>
					</div>
				</div>				
				@endforeach
			</div>
			@endif
			
			@if ($commBusiness->count() > 0)
			<div class="d-flex justify-content-between align-items-center mb-3">
				<h3>Business</h3>
			</div>
			<div class="row">
				@foreach ($commBusiness as $cb)
				<div class="col-md-4 col-sm-6 mb-4">
					<div class="card card-custom">
						<div class="card-bg" style="background-image: url('{{ $cb->thumbnail }}');"></div>
						<img src="{{ $cb->advert_thumbnail }}" class="card-img-top border-dark" alt="Card image">
						<div class="card-body text-center mt-5 pt-5">
							<h5 class="card-title mt-5">{{ $cb->name }}</h5>
							<p class="card-text">{{ $cb->description }}</p>
							<div class="d-flex justify-content-center mt-3">
								<a href="{{ route('community.detail', ['slug' => $cb->slug]) }}" type="button" class="btn btn-light border-dark px-5" style="border-radius: 10px;">About Community</a>
							</div>
						</div>
					</div>
				</div>				
				@endforeach
			</div>
			@endif
			
			@if ($commPersonals->count() > 0)
			<div class="d-flex justify-content-between align-items-center mb-3">
				<h3>Personals</h3>
			</div>
			<div class="row">
				@foreach ($commPersonals as $cb)
				<div class="col-md-4 col-sm-6 mb-4">
					<div class="card card-custom">
						<div class="card-bg" style="background-image: url('{{ $cb->thumbnail }}');"></div>
						<img src="{{ $cb->advert_thumbnail }}" class="card-img-top border-dark" alt="Card image">
						<div class="card-body text-center mt-5 pt-5">
							<h5 class="card-title mt-5">{{ $cb->name }}</h5>
							<p class="card-text">{{ $cb->description }}</p>
							<div class="d-flex justify-content-center mt-3">
								<a href="{{ route('community.detail', ['slug' => $cb->slug]) }}" type="button" class="btn btn-light border-dark px-5" style="border-radius: 10px;">About Community</a>
							</div>
						</div>
					</div>
				</div>				
				@endforeach
			</div>
			@endif
		</div>
		<!-- Sidebar Section -->
		<div class="col-md-4 col-lg-3 pt-3">
			<div class="sidebar bg-white border-custom">
				<a href="{{ route('viewcommunity') }}" class="btn btn-primary w-100 no-padding" style="background-color: #13005A;">+ Create New Community</a>
				<div class="content p-3">
					<h5>My Communities</h5>
					<div class="my-communities mb-3">
						@if ($allMyCommunities->isNotEmpty())
							@foreach ($allMyCommunities as $myCommunity)
							<div class="community-item d-flex align-items-center mb-2">
								<img src="{{ $myCommunity->thumbnail }}" alt="{{ $myCommunity->name }}" class="me-2" style="width: 30px;">
								<span><a href="{{ route('community.detail', ['slug' => $myCommunity->slug]) }}" class="ms-2 text-decoration-none" style="color: black;">{{ $myCommunity->name }}</a></span>
							</div>
							<hr>
							@endforeach
						@else
							<div class="alert alert-warning d-flex align-items-center mt-2" role="alert" style="width: 100%;">
								<div style="flex: 1;">
									<span>You're not yet joined any community.</span>
								</div>
								<!-- <a href="{{ route('community') }}" class="btn btn-outline-light" style="border-color: #13005A; color: #13005A; margin-left: 10px;">Go find some Community</a> -->
							</div>
							<hr>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</main>
@endsection
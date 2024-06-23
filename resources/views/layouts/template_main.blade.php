<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Thrivian | {{ $title }}</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.min.css">
		<link rel="icon" type="image/png" href="{{asset('/assets/img/logo1.png')}}">
		@yield('advanced_css')
		<link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
		<script src="{{asset('/assets/js/index.js')}}"></script>
	</head>

	<div id="splash-screen" class="splash-screen">
    	<img src="{{asset('/assets/img/Thrivian Logo_OK.png')}}" alt="Thrivian-logo" class="logo">
	</div>

	<body>
		@if ($errors->any())
		<script>
			window.onload = function() {
				Swal.fire({
					icon: 'error',
					title: 'Error',
					html: `
						<ul style="text-align: left;">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
						</ul>
					`,
					confirmButtonText: 'OK'
				});
			};
		</script>
		@endif
		@if (session('success'))
			<script>
				window.onload = function() {
					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: '{{ session('success') }}',
						confirmButtonText: 'OK'
					});
				};
			</script>
		@endif

		<!-- Navbar untuk Desktop -->
		<nav class="navbar navbar-light bg-light fixed-top d-none d-lg-block">
			<div class="container">
				<a class="navbar-brand" href="{{ route('home') }}">
                	<img src="{{asset('/assets/img/Thrivian Logo_OK.png')}}" alt="Thrivian.org" width="60" height="45" />
            	</a>
				<ul class="nav me-auto">
					<li class="nav-item">
						<a class="nav-link text-secondary  {{ $title == 'Home' ? 'active text-decoration-underline' : '' }}" style="color: {{ $title == 'Home' ? "#015AAA !important;" : ""}}" href="{{ route('home') }}">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-secondary {{ $title == 'Community' ? 'active text-decoration-underline' : '' }}" style="color: {{ $title == 'Community' ? "#015AAA !important;" : ""}}" href="{{ route('community') }}">Community</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-secondary {{ $title == 'Event' ? 'active text-decoration-underline' : '' }}" style="color: {{ $title == 'Event' ? "#015AAA !important;" : ""}}" href="{{ route('homeEvent') }}">Event</a>
					</li>
					@if ($role == 1)
						<li class="nav-item">
							<a class="nav-link text-secondary {{ $title == 'Admin' ? 'active text-decoration-underline' : '' }}" style="color: {{ $title == 'Admin' ? "#015AAA !important;" : ""}}" href="{{ route('tableCommunity') }}">Admin</a>
						</li>
					@endif
				</ul>
				<div class="navbar-text ms-auto">
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link" href="#">
							<i class="fas fa-search"></i> 
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
							<i class="fas fa-users"></i> 
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
							<i class="far fa-envelope"></i> 
							</a>
						</li>
						<li class="nav-item">
							<div id="profileLink" class="nav-link profile">
								<div class="rounded-circle overflow-hidden me-2" style="width: 25px; height: 25px; background-color: #f0f0f0;">
									<img id="userImage" src="{{ $avatar }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
								</div>
								<div id="profileInfo" class="profile-info">
									<p class="username">{{ $name }}</p>
									<p class="account">{{ '@' . $username }}</p>
									<a href="{{ route('profile') }}" class="view-profile">View my profile</a>
									<a href="my-events.html" class="my-events">My Events</a>
									<a href="manage-communities.html" class="manage-communities">Manage your communities</a>
									<hr class="my-2" style="border-top: 3px solid #E5E5E5;">
									<a href="{{ route('settings') }}" class="settings">Settings</a>
									<a href="{{ route('logout') }}" class="log-out">Log Out</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- Navbar untuk Mobile -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top d-lg-none">
			<div class="container-fluid">
				<a class="navbar-brand" href="#" style="flex-grow: 1;">
				<img src="{{asset('/assets/img/thrivan-logo.png')}}" alt="Thrivian.org" width="150">
				</a>
				<a href="#" class="search-icon ms-auto me-4">
				<i class="fas fa-search"></i> 
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobileContent" aria-controls="navbarMobileContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarMobileContent">
					<ul class="navbar-nav me-auto mb-lg-0 mt-3">
						<button class="close-button ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobileContent">✖</button>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('community') }}">Community</a>
							<hr class="my-2 custom-hr-mobile">
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('event') }}">Events</a>
							<hr class="my-2 custom-hr-mobile">
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('settings') }}">Settings</a>
							<hr class="my-2 custom-hr-mobile">
						</li>
					</ul>
					<div class="navbar-footer">
						<div class="d-flex justify-content-center text-align-center mt-4">
							<span class="text-muted small fs-9" style="text-align: center; text-decoration: none;">
							<a href="{{route('privacy')}}" class="text-black">Privacy & Policy</a>
							<p class="text-muted fs-9">Thrivian.org © 2024</p>
							</span>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<!-- Sticky Bottom Navbar for Mobile -->
		<nav class="navbar fixed-bottom navbar-expand d-lg-none bottom-nav border border-dark" style="background-color: #fcfafa;">
			<ul class="navbar-nav nav-justified w-100">
				<li class="nav-item">
					<a class="nav-link text-dark" href="{{ route('home') }}"><i class="fa fa-home"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="#"><i class="far fa-envelope"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="#"><i class="bell outline icon"></i></a>
				</li>
				<li class="nav-item">
					<a href="{{ route('profile') }}">
						<div class="rounded-circle overflow-hidden ms-3 mt-1" style="width: 25px; height: 25px; background-color: #f0f0f0;">
							<img id="userImage" src="{{$avatar}}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
						</div>
					</a>
				</li>
			</ul>
		</nav>
		@yield('content')
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.all.min.js"></script>
	</body>
</html>
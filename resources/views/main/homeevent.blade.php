<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Thrivian | {{$title}}</title>
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="/assets/css/events.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
		<style>
			.banner {
			position: relative;
			width: 100%;
			height: 200px;
			overflow: hidden;
			}
			.image-container img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			filter: blur(0);
			transition: filter 0.3s;
			}
			.image-container::after {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: linear-gradient(to right, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%);
			}
			.text {
			position: absolute;
			right: 0;
			top: 50%;
			transform: translateY(-50%);
			color: #fff;
			padding-right: 20px;
			width: 40%;
			text-align: right;
			}
			.event-card {
			border: 1px solid #ddd;
			border-radius: 15px;
			overflow: hidden;
			margin-bottom: 15px;
			padding: 15px;
			}
			.event-card img {
			width: 100%;
			height: auto;
			border-top-left-radius: 15px;
			border-top-right-radius: 15px;
			}
			.event-date {
			position: absolute;
			top: 10px;
			right: 10px;
			background-color: rgba(0, 0, 0, 0.7);
			color: white;
			padding: 5px 10px;
			border-radius: 5px;
			font-size: 0.9rem;
			}
			.event-banner {
			position: relative;
			width: 100%;
			height: 400px;
			background: url('/assets/img/banner.jpg') no-repeat center center;
			background-size: cover;
			}
			.event-overlay {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 139, 0.8));
			display: flex;
			align-items: center;
			justify-content: flex-end;
			padding: 20px;
			}
			.event-content {
			padding-right: 14%;
			color: white;
			}
			#footer {
			background-color: #13005A;
			padding: 2rem 0;
			color: #fff;
			}
			#footer .footer-col {
			margin-bottom: 1rem;
			}
			#footer .footer-col h6 {
			font-weight: bold;
			}
			#footer .footer-col ul {
			list-style: none;
			padding: 0;
			}
			#footer .footer-col ul li {
			margin-bottom: 0.5rem;
			}
			#footer .social-icons i {
			font-size: 1.5rem;
			margin-right: 0.5rem;
			color: #fff;
			}
			#footer .app-buttons img {
			height: 40px;
			margin-right: 0.5rem;
			}
			#footer .footer-bottom {
			border-top: 1px solid #dee2e6;
			padding-top: 1rem;
			margin-top: 1rem;
			text-align: center;
			}
			#footer .footer-logo {
			max-width: 200px;
			height: auto;
			}
		</style>
	</head>
	<body>
		<!-- Navbar untuk Desktop -->
		<nav class="navbar navbar-light bg-light fixed-top d-none d-lg-block">
			<div class="container">
				<a class="navbar-brand" href="#">
				<img src="/assets/img/thrivan-logo.png" alt="Thrivian.org" width="180" height="35" />
				</a>
				<ul class="nav me-auto">
					<li class="nav-item">
						<a class="nav-link text-secondary  {{ $title == 'Home' ? 'active text-decoration-underline' : '' }}" style="color: {{ $title == 'Home' ? "#13005A !important;" : ""}}" href="{{ route('home') }}">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-secondary {{ $title == 'Community' ? 'active text-decoration-underline' : '' }}" style="color: {{ $title == 'Community' ? "#13005A !important;" : ""}}" href="{{ route('community') }}">Community</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-secondary {{ $title == 'Event' || 'Home Event' ? 'active text-decoration-underline' : '' }}" style="color: {{ $title == 'Event' || 'Home Event' ? "#13005A !important;" : ""}}" href="{{ route('homeEvent') }}">Event</a>
					</li>
					@if ($role == 1)
					<li class="nav-item">
						<a class="nav-link text-secondary {{ $title == 'Admin' ? 'active text-decoration-underline' : '' }}" style="color: {{ $title == 'Admin' ? "#13005A !important;" : ""}}" href="{{ route('tableCommunity') }}">Admin</a>
					</li>
					@endif
				</ul>
				<div class="navbar-text ms-auto">
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link" href="search.html">
							<i class="fas fa-search"></i> 
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
							<i class="bi bi-envelope"></i> 
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
							<i class="bi bi-bell"></i> 
							</a>
						</li>
						<li class="nav-item">
							<div id="profileLink" class="nav-link profile">
								<div class="rounded-circle overflow-hidden me-2" style="width: 25px; height: 25px; background-color: #f0f0f0">
									<img id="userImage" src="{{$avatar}}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover" />
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
				<a class="navbar-brand" href="#" style="flex-grow: 1">
				<img src="/assets/img/thrivan-logo.png" alt="Thrivian.org" width="150" />
				</a>
				<a href="search.html" class="search-icon ms-auto me-4">
				<i class="fas fa-search"></i>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobileContent" aria-controls="navbarMobileContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarMobileContent">
					<ul class="navbar-nav me-auto mb-lg-0 mt-3">
						<button class="close-button ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMobileContent">✖</button>
						<li class="nav-item">
							<a class="nav-link" href="./community.html">Community</a>
							<hr class="my-2 custom-hr-mobile" />
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./events.html">Events</a>
							<hr class="my-2 custom-hr-mobile" />
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./settings_profiles.html">Settings</a>
							<hr class="my-2 custom-hr-mobile" />
						</li>
					</ul>
					<div class="navbar-footer">
						<div class="d-flex justify-content-center text-align-center mt-4">
							<span class="text-muted small fs-9" style="text-align: center; text-decoration: none">
								<a href="about_us.html" class="text-muted">About Us</a> •
								<a href="privacy_terms.html" class="text-muted">Privacy & Terms</a> •
								<a href="more.html" class="text-muted">More</a>
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
					<a class="nav-link text-dark" href="../index.html"><i class="fa fa-home"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="#"><i class="far fa-envelope"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" href="#"><i class="bi bi-bell"></i></a>
				</li>
				<li class="nav-item">
					<a href="./pages/profile.html">
						<div class="rounded-circle overflow-hidden ms-5 mt-1" style="width: 25px; height: 25px; background-color: #f0f0f0;">
							<img id="userImage" src="/assets/img/3582.jpg" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
						</div>
					</a>
				</li>
			</ul>
		</nav>
		<section class="hero d-flex align-items-center" style="background-image: url('/assets/img/bg-event.jpg'); background-size: cover; background-position: center;">
			<div class="container">
				<div class="row justify-content-end align-items-center mt-5">
					<div class="col-lg-6">
						<div class="text-start bg-overlay p-4">
							@php
							function formatEventName($name) {
							return strtoupper(str_replace(' ', '<br>', $name));
							}
							@endphp
							<h1>{!! formatEventName($mainEvent->name) !!}</h1>
							<p>{{ $mainEvent->description }}</p>
							<a href="{{ route('event.detail', ['slug' => $mainEvent->slug]) }}" class="btn btn-primary me-md-4">Get Ticket</a>
							<a href="{{ route('event.detail', ['slug' => $mainEvent->slug]) }}" class="btn btn-secondary" style="margin-left: 9px;">More Info</a>
							<div id="countdown"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="event-section">
			<div class="container my-4 event-section">
			<h4 class="mb-4">Upcoming Events</h4>
			<div class="row d-flex justify-content-between">
				@foreach($threeEvent as $event)
				<div class="col-md-3">
                    <div class="event-card">
                        <img src="{{$event->thumbnail}}" alt="Event Image">
                        <div class="event-date">{{ \Carbon\Carbon::parse($event->start_date)->format('F jS') }}</div>
                        <h5 class="mt-3"><a href="{{ route('event.detail', ['slug' => $event->slug]) }}">{{ $event->name }}</a> </h5>
                        <p>{{ Str::limit($event->description, 75) }}</p>
                        <p> <span><i class="bi bi-geo-alt"></i></span> {{ $event->location }}
                        </p>
                    </div>
				</div>
				@endforeach
			</div>
		</section>
		<div class="event-banner">
			<div class="event-overlay">
				<div class="event-content" >
					<h1 class="mb-4">Find Your Event Event</h1>
					<p>Lorem ipsum dolor sit amet, consectetur <br>adipiscing elit, sed do eiusmod tempor <br>incididunt ut labore et dolore magna aliqua.</p>
					<a href="{{ route('event') }}" class="btn btn-primary px-5 mt-3" style="background-color: #5458E5; border: none;">Find More Event</a>
				</div>
			</div>
		</div>
		<div class="container mx-auto mt-5 text-center">
			<h2 class="text-2xl font-semibold mb-4" style="color: #13005A;">Our Sponsorship</h2>
			<p style="color: #13005A; margin-bottom: 45px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <br>eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<div class="row justify-content-center align-items-start">
				<!-- Gambar-gambar partner -->
				<div class="col-6 col-md-4 col-lg-2 partner-col">
					<img src="/assets/img/spotify.png" alt="Partner 1" class="partner-img">
				</div>
				<div class="col-6 col-md-4 col-lg-2 partner-col">
					<img src="/assets/img/google.png" alt="Partner 2" class="partner-img">
				</div>
				<div class="col-6 col-md-4 col-lg-2 partner-col">
					<img src="/assets/img/yt.png" alt="Partner 3" class="partner-img">
				</div>
				<div class="col-6 col-md-4 col-lg-2 partner-col">
					<img src="/assets/img/microsoft.png" alt="Partner 4" class="partner-img">
				</div>
				<div class="col-6 col-md-4 col-lg-2 partner-col">
					<img src="/assets/img/gojek.png" alt="Partner 5" class="partner-img">
				</div>
				<div class="col-6 col-md-4 col-lg-2 partner-col">
					<img src="/assets/img/zoom.png" alt="Partner 6" class="partner-img">
				</div>
				<div class="col-6 col-md-4 col-lg-2 partner-col">
					<img src="/assets/img/grab.png" alt="Partner 7" class="partner-img">
				</div>
				<div class="col-6 col-md-4 col-lg-2 partner-col">
					<img src="/assets/img/linkedin.png" alt="Partner 8" class="partner-img">
				</div>
				<div class="col-6 col-md-4 col-lg-2 partner-col">
					<img src="/assets/img/indihome.png" alt="Partner 9" class="partner-img">
				</div>
			</div>
		</div>
		<footer id="footer">
			<div class="container">
				<div class="row text-center text-md-start">
					<div class="col-md-12 d-flex justify-content-center justify-content-md-start align-items-center mb-3">
						<img src="/assets/img/thrivian-white.png" alt="logo-thrivian" class="footer-logo">
					</div>
					<hr class="mt-3" style="border-top: 3px solid #E5E5E5;">
					<div class="col-md-3 footer-col">
						<h6 class="pb-3">Thrivian.org</h6>
						<ul>
							<li>Tentang Kami</li>
							<li>Kontak Kami</li>
							<li>Merchandise</li>
							<li>Blog</li>
						</ul>
					</div>
					<div class="col-md-3 footer-col">
						<h6 class="pb-3">Layanan Kami</h6>
						<ul>
							<li>Community</li>
							<li>Event</li>
							<li></li>
							<li>Bantuan</li>
						</ul>
					</div>
					<div class="col-md-3 footer-col">
						<h6 class="pb-3">Lainnya</h6>
						<ul>
							<li>Syarat dan Ketentuan</li>
							<li>Keijakam Privasi</li>
						</ul>
					</div>
					<div class="col-md-3 footer-col">
						<h6 class="mb-3">Ikuti Kami</h6>
						<div class="social-icons">
							<a href="#"><i class="bi bi-youtube"></i></a>
							<a href="#"><i class="bi bi-facebook"></i></a>
							<a href="#"><i class="bi bi-twitter"></i></a>
							<a href="#"><i class="bi bi-instagram"></i></a>
							<a href="#"><i class="bi bi-linkedin"></i></a>
						</div>
					</div>
				</div>
				<div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center pb-5">
					<p>Thrivian.org @ 2024. All rights reserved.</p>
				</div>
			</div>
		</footer>
		@php
		$end_date = \Carbon\Carbon::parse($mainEvent->end_date);
		@endphp
		<script>
			// var countdownDate = new Date("June 31, 2024 00:00:00").getTime();
			var countdownDate = new Date("{{ $end_date->format('F d, Y H:i:s') }}").getTime();
			
			var x = setInterval(function() {
			    var now = new Date().getTime();
			
			    var distance = countdownDate - now;
			
			    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			
			    document.getElementById("countdown").innerHTML = "<div style='display: inline-block; text-align: center;'><span class='countdown-number'>" + days + "</span><br>Days</div>" +
			                                                     "<div style='display: inline-block; text-align: center; margin-left: 40px;'><span class='countdown-number'>" + hours + "</span><br>Hours</div>" +
			                                                     "<div style='display: inline-block; text-align: center; margin-left: 40px;'><span class='countdown-number'>" + minutes + "</span><br>Minutes</div>" +
			                                                     "<div style='display: inline-block; text-align: center; margin-left: 40px;'><span class='countdown-number'>" + seconds + "</span><br>Seconds</div>";
			
			    if (distance < 0) {
			        clearInterval(x);
			        document.getElementById("countdown").innerHTML = "<span style='font-size: 40px;'>EXPIRED</span>";
			    }
			}, 1000);
		</script>
	</body>
</html>
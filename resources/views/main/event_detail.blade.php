@extends('layouts.template_main')
@section('title', 'Detail Event')
@section('content')
<style>
	#selectedCategories .btn {
	border-radius: 15px;
	}
	.event-image {
	width: 544px;
	height: 671px;
	object-fit: cover;
	object-position: center;
	}
</style>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
	<!-- Tambahkan SweetAlert CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.css">
	<!-- Tambahkan SweetAlert JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<style>
		.banner-section {
		background-color: #13005A;
		color: white;
		padding: 0;
		}
		.banner-content {
		display: flex;
		flex-wrap: wrap;
		align-items: stretch;
		height: 100%;
		}
		.banner-content .image-content {
		flex: 1;
		display: flex;
		padding-left: -5%;
		}
		.banner-content .image-content img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		padding-left: -70%;
		}
		.banner-content .text-content {
		flex: 1;
		padding: 50px;
		display: flex;
		flex-direction: column;
		justify-content: center;
		}
		.details-row {
		display: flex;
		flex-wrap: wrap;
		gap: 20px;
		}
		.details-row div {
		display: flex;
		align-items: center;
		gap: 10px;
		}
		.details-row i {
		font-size: 1.5rem;
		}
		.btn-wrapper {
		display: flex;
		justify-content: left;
		}
		@media (max-width: 767.98px) {
		.banner-content {
		flex-direction: column;
		text-align: center;
		}
		.banner-content .image-content {
		width: 100%;
		padding-left: 0;
		}
		.banner-content .image-content img {
		object-fit: contain;
		height: auto;
		padding-left: 0;
		}
		.banner-content .text-content {
		padding: 20px;
		}
		#banner-home {
		height: auto;
		padding: 2rem 0;
		}
		#banner-home .banner-content {
		position: static;
		transform: none;
		}
		#banner2 .text-content, #banner3 .text-content, #banner4 .text-content {
		padding: 0 1rem;
		display: flex;
		justify-content: center;
		}
		#footer .footer-bottom {
		text-align: center;
		}
		#footer .footer-col {
		text-align: center;
		}
		#footer .footer-logo {
		margin-bottom: 1rem;
		}
		}
	</style>
</head>

<main>
	<section class="banner-section">
		<div class="banner-content">
			<div class="image-content">
				<img src="{{ $event->thumbnail }}" alt="Expo Image" class="event-image">
			</div>
			<div class="text-content" style="padding-left: 10%;">
				<h1>{{ $event->name }}</h1>
				<div class="details-row">
					<div>
						<i class="bi bi-calendar-event"></i>
						<span>{{ \Carbon\Carbon::parse($event->start_date)->format('l, M d, Y') }}</span>
					</div>
					<div class="py-5">
						<i class="bi bi-clock"></i>
						<span>{{ \Carbon\Carbon::parse($event->start_date)->format('d F H:i') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d F H:i') }}</span>
					</div>
					<div class="col-md-8">
						<div>
							<i class="bi bi-geo-alt"></i>
							<span>{{ $event->location }}</span>
						</div>
						<div class="ps-5">
							<i class="bi bi-instagram"></i>
							<a href="{{ $event->website }}" class="text-white" style="text-decoration: none;">{{ $event->website }}</a>
						</div>
					</div>
				</div>
				<div class="btn-wrapper">
					@if ($isJoin)
					<span class="btn btn-light rounded-pill mt-5 me-3 px-5 py-2" style="background-color: #5458E5; color: #fff; border-color: #5458E5;">Joined</span>
					@else
					<button type="button" class="btn btn-light rounded-pill mt-5 me-3 px-5 py-2" style="background-color: #5458E5; color: #fff; border-color: #5458E5;" onclick="joinEvent({{ $event->id }})">Buy your seat now!</button>
					@endif
					@if ($isCreator)
					<button type="button" class="btn btn-light rounded-pill mt-5 me-3 px-5 py-2" style="background-color: #5458E5; color: #fff; border-color: #5458E5;"  data-bs-toggle="modal" data-bs-target="#memberModal">Participants</button>
					@endif
				</div>
			</div>
		</div>
	</section>
	<section class="container my-5">
		<h1 class="text-title" style="color: #fff; background-color: #13005A;">About This Event</h1>
		<p>{{ $event->description }}</p>
	</section>
	<section class="container my-5">
		<h1 class="text-title" style="color: #fff; background-color: #13005A;">Where We're Located</h1>
		<div class="row">
			<div class="col-md-6">
				<p>This event is located in the heart of Jakarta city, close to all city center facilities, attractions, and easily accessible with a range of travel options.</p>
				<p>Gedung Lorem Ipsum<br>Jl. Lorem Ipsum No.1, Daerah Dolor Sit Amet, Bandung, 12345</p>
			</div>
			<div class="col-md-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.8613123456789!2d107.60119851499873!3d-6.914744994990773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e84d71000001%3A0x123456789abcdef!2sGedung%20Lorem%20Ipsum!5e0!3m2!1sid!2sid!4v1620619473175!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
		</div>
	</section>
</main>




<!-- Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="memberModalLabel">Participants List</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						@foreach ($members as $member)
						<div class="col-md-4 mb-3">
							<div class="d-flex align-items-center">
								<img src="{{ $member->avatar }}" alt="Member Avatar" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
								<div>
									{{ $member->name }} (<a href="{{ route('profile.people', ['username' => $member->username]) }}">{{ '@' . $member->username }}</a>)
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
	function joinEvent(eventId) {
	    Swal.fire({
	        title: 'Are you sure?',
	        text: "You want to join this event!",
	        icon: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        confirmButtonText: 'Yes, join it!'
	    }).then((result) => {
	        if (result.isConfirmed) {
	            fetch('{{ route('event.join') }}', {
	                method: 'POST',
	                headers: {
	                    'Content-Type': 'application/json',
	                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
	                },
	                body: JSON.stringify({ event_id: eventId })
	            })
	            .then(response => response.json())
	            .then(data => {
	                if (data.status === 'joined') {
	                    Swal.fire(
	                        'Joined!',
	                        'You have successfully joined the event.',
	                        'success'
	                    ).then(() => {
	                        location.reload();
	                    });
	                }
	            });
	        }
	    });
	}
</script>
@endsection
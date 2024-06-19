<style>
	.btn-custom-outline {
	border-color: #015AAA;
	color: #015AAA;
	}
	.btn-custom-outline:hover {
	background-color: #015AAA;
	color: white;
	}
	.modal-body-custom {
	background-color: #D9E0EB; /* Warna abu-abu */
	padding: 20px; /* Menambahkan padding */
	border-radius: 5px; /* Menambahkan sedikit border radius */
	}
	.custom-dropdown .dropdown-toggle {
	background-color: #C1C8D2;
	border-radius: 70px;
	border-color: #C1C8D2;
	color: black;
	}
	.custom-dropdown .dropdown-toggle:hover,
	.custom-dropdown .dropdown-toggle:focus {
	background-color: #b7d3fe;
	color: #fff;
	border-color: #b7d3fe;
	}
	.custom-dropdown .dropdown-menu {
	border-radius: 5px;
	}
	.custom-dropdown .dropdown-item:hover,
	.custom-dropdown .dropdown-item:focus {
	background-color: #0d6efd;
	color: #fff;
	} 
	@media (max-width: 576px) {
	.custom-elements .btn-custom-outline {
	font-size: 0.75rem; /* Ukuran font lebih kecil */
	padding: 0.20rem 0.4rem; /* Padding lebih kecil */
	}
	.custom-elements img {
	width: 20px;
	height: 20px;
	}
	.custom-elements span {
	font-size: 0.6rem;
	}
	.custom-elements i {
	font-size: 8px;
	}
	.custom-elements .btn-link {
	font-size: 0.5rem;
	}
	.custom-dropdown .dropdown-toggle {
	font-size: 0.75rem; /* Ukuran font lebih kecil */
	padding: 0.25rem 0.5rem; /* Padding lebih kecil */
	}
	.custom-dropdown .dropdown-menu {
	font-size: 0.75rem; /* Ukuran font lebih kecil */
	}
	.custom-dropdown .dropdown-menu p {
	font-size: 0.75rem; /* Ukuran font lebih kecil */
	margin: 0.25rem 0; /* Margin lebih kecil */
	}
	.custom-dropdown .dropdown-menu .dropdown-item {
	font-size: 0.75rem; /* Ukuran font lebih kecil */
	padding: 0.25rem 0.5rem; /* Padding lebih kecil */
	}
	}
</style>
@extends('layouts.template_main')
@section('title', 'Detail Community')
@section('content')
<head>
	<!-- Tambahkan SweetAlert CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.css">
	<!-- Tambahkan SweetAlert JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<main class="container-fluid border" style="margin-top: 5%;">
	<div class="row justify-content-center">
		<div class="col-md-8 border-end border-start mt-5 mt-md-0 mb-5 mb-md-0">
			<div class="card-join mb-2 custom-card">
				<img src="{{ $community->thumbnail }}" class="card-img-top" alt="{{ $community->name }}">
				<div class="card-body">
					<h2 class="card-title" style="color: #015AAA;">{{ $community->name }}</h2>
					<p class="card-text">{{ $community->description }}</p>
					<div class="d-flex align-items-center custom-elements" style="gap: 10px;">
						@if ($isMember)
						<button id="joinButton" type="button" class="btn btn-outline-danger btn-custom-outline px-4" style="border-radius: 30px;" onclick="leaveCommunity({{ $community->id }})">Leave Community</button>
						@else
						<button id="joinButton" type="button" class="btn btn-outline-primary btn-custom-outline px-4" data-bs-toggle="modal" data-bs-target="#communityRulesModal" style="border-radius: 30px;">Join</button>
						@endif
						<button id="joinButton" type="button" class="btn btn-outline-primary btn-custom-outline px-4" style="border-radius: 30px;" data-bs-toggle="modal" data-bs-target="#memberModal">Members</button>
						<div class="d-flex align-items-center">
							<img src="{{asset('/assets/img/3582.jpg')}}" class="rounded-circle" alt="Profile" style="width: 30px; height: 30px;">
							<img src="{{asset('/assets/img/culture_replay_ninja_1054462188.jpg')}}" class="rounded-circle" alt="Profile" style="width: 30px; height: 30px; margin-left: -10px;">
							<img src="{{asset('/assets/img/smiling-asian-man-standing-grey-wall.jpg')}}" class="rounded-circle" alt="Profile" style="width: 30px; height: 30px; margin-left: -10px;">
							<span class="ms-1"><strong>{{ $memberCount }}</strong> Members</span>
						</div>
						<div class="d-flex align-items-center">
							<i class="fas fa-circle text-success" style="font-size: 10px;"></i>
							<span class="ms-1">1 Online</span>
						</div>
						<button type="button" class="btn btn-link" style="text-decoration: none; color: #015AAA;">
						<i class="fas fa-share-alt"></i> Share Community
						</button>
					</div>
					<!-- Agreement Modal -->
					<div class="modal fade" id="communityRulesModal" tabindex="-1" aria-labelledby="communityRulesModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="communityRulesModalLabel" style="color: #015AAA;">Read and Agree to Community Rules</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body modal-body-custom">
									<ol>
										<li><strong>Respectful Communication:</strong> Engage with all members respectfully and professionally. Personal attacks, harassment, and offensive language are strictly prohibited.</li>
										<li><strong>No Spam or Self-Promotion:</strong> Avoid posting unsolicited advertisements or excessive self-promotion. Focus on contributing value to the community discussions.</li>
										<li><strong>Confidentiality:</strong> Respect the privacy of other members. Do not share personal or sensitive information without consent.</li>
										<li><strong>Constructive Feedback:</strong> Provide helpful and constructive feedback. Aim to support and uplift others in their professional journeys.</li>
										<li><strong>Stay On-Topic:</strong> Keep discussions relevant to the community’s focus. Off-topic posts should be shared in designated areas, if available.</li>
										<li><strong>No Plagiarism:</strong> Share original content or properly attribute sources. Plagiarism undermines trust and the community’s integrity.</li>
										<li><strong>Intellectual Property Respect:</strong> Ensure that all shared content respects intellectual property rights. Always credit original creators.</li>
										<li><strong>Active Participation:</strong> Engage regularly and contribute positively to discussions. Active participation helps build a vibrant and supportive community.</li>
										<li><strong>Report Issues:</strong> Promptly report any inappropriate behavior or content to moderators. Help maintain a safe and respectful environment.</li>
										<li><strong>Follow Platform Guidelines:</strong> Adhere to the terms of service and community guidelines of the platform hosting the community. This ensures a consistent experience for all members.</li>
									</ol>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="agreeRulesCheckbox">
										<label class="form-check-label" for="agreeRulesCheckbox" style="color: #015AAA;">
										I agree to all the rules above
										</label>
									</div>
								</div>
								<div class="modal-footer d-flex justify-content-between">
									<button type="button" class="btn btn-outline-primary btn-custom-outline" data-bs-dismiss="modal" onclick="joinCommunity({{ $community->id }})">Join</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="all-posts overflow-auto" style="max-height: 1000px;">

                <div class="post mt-4 me-5" data-category="Business" data-post="Recommended">
                    @foreach ($posts as $post)
					<div class="d-flex align-items-center mb-2">
						<div class="rounded-circle overflow-hidden me-2" style="width: 50px; height: 50px; background-color: #f0f0f0;">
							<img src="{{ $post->user->avatar }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
						</div>
						<div>
							<a href="javascript:void(0);" class="full-post" style="text-decoration: none;">
								<h6 class="mb-0 text-dark fw-bold">{{ $post->user->name }} <span class="text-muted"> <a href="{{ route('profile.people', ['username' => $post->user->username]) }}">{{ '@' . $post->user->username }}</a></span></h6>
							</a>
						</div>
					</div>
					<div class="row mb-0 ms-5 mb-2">
						<div class="col">
							<h5 class="mb-0 text-dark">{{ $post->title }}</h5>
						</div>
					</div>
					<div class="row mb-0 ms-5">
						<div class="col">
                            @if ($post->thumbnail)
                                <img src="{{ $post->thumbnail }}" class="img-fluid w-25" style="border-radius: 15px;" alt="Image">
                            @endif
							<p class="mb-0 truncated" style="text-align: justify;">{{ $post->content }}</p>
						</div>
					</div>
					<div class="row justify-content-end mt-3 me-2">
						<div class="col-auto">                    
							<a class="link-posts me-3 me-md-5" href="{{ route('post.detail', ['slug' => $post->slug]) }}">
								<i class="comment alternate outline black icon" style="font-size: 20px;"></i>
							</a>
						</div>
					</div>
					<hr class="mt-3" style="border-top: 3px solid #E5E5E5;">
                    @endforeach
				</div>
			</div>
		</div>
		<div class="col-3 border-start border-end ml-auto d-none d-md-block" style="overflow-y: auto;">
			@if ($isMember)
			<a href="{{ route('community.post', ['slug' => $community->slug]) }}" type="button" class="btn btn-outline-light w-100 mt-2" style="border-radius: 30px; border-color: #015AAA; color: #015AAA;">
			<i class="fas fa-plus-circle" style="font-size: 15px; color: #015AAA;"></i>
			Create New Post
			</a>
			@endif
			@if ($isAdmin)
			<a href="{{ route('community.addevent', ['slug' => $community->slug]) }}" type="button" class="btn btn-outline-light w-100 mt-2" style="border-radius: 30px; border-color: #015AAA; color: #015AAA;">
			<i class="fas fa-plus-circle" style="font-size: 15px; color: #015AAA;"></i>
			Create New Event
			</a>
			@endif
			<hr class="my-3" style="border-top: 3px solid #E5E5E5;">
			<div class="container mt-3">
				<div class="about-section">
					<h4 style="color: #015AAA;"><strong>About this community</strong></h4>
					<p style="font-size: 0.875rem;">{{ $community->description }}</p>
				</div>
			</div>
			<hr class="my-3" style="border-top: 3px solid #E5E5E5;">
			@if ($allMyEvents->isNotEmpty())
				<div class="mt-3">
					<h4 style="color: #015AAA;">Upcoming Events</h4>
					@foreach($allMyEvents as $index => $event)
					@if($index == 0)
					<!-- start jika looping pertama -->
					<div class="card mb-3" style="border-radius: 15px; overflow: hidden;">
						<div class="position-relative">
							<img src="{{ $event->thumbnail }}" class="card-img-top img-fluid" alt="{{ $event->name }}">
							<div class="date-badge">
								<span class="badge">
									<div class="day">{{ \Carbon\Carbon::parse($event->start_date)->format('j') }}</div>
									<div class="month">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</div>
								</span>
							</div>
						</div>
						<div class="card-body">
							<h5 class="card-title fs-6"><a href="{{ route('event.detail', ['slug' => $event->slug]) }}" style="text-decoration: none;">{{ $event->name }}</a></h5>
							<p class="card-text">{{ Str::limit($event->description, 50) }}</p>
						</div>
					</div>
					@else
					<div class="card mb-3" style="border-radius: 15px; overflow: hidden;">
						<div class="row g-0">
							<div class="col-4 position-relative">
								<img src="{{ $event->thumbnail }}" class="img-fluid rounded-start" alt="{{ $event->name }}">
								<div class="date-badge">
									<span class="badge">
										<div class="day">{{ \Carbon\Carbon::parse($event->start_date)->format('j') }}</div>
										<div class="month">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</div>
									</span>
								</div>
							</div>
							<div class="col-8">
								<div class="card-body">
									<h5 class="card-title fs-6"><a href="{{ route('event.detail', ['slug' => $event->slug]) }}">{{ $event->name }}</a></h5>
									<p class="card-text">{{ Str::limit($event->description, 25) }}</p>
								</div>
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			@endif
			<div class="d-flex justify-content-center text-align-center mt-4">
				<span class="text-muted small fs-9" style="text-align: center; text-decoration: none;">
					<a href="{{route('privacy')}}" class="text-black">Privacy & Policy</a>
					<p class="text-muted fs-9">Thrivian.org © 2024</p>
				</span>
			</div>
		</div>
	</div>
</main>
<script>
	document.getElementById('modalJoinButton').addEventListener('click', function() {
	   if (document.getElementById('agreeRulesCheckbox').checked) {
	       var joinButton = document.getElementById('joinButton');
	       joinButton.textContent = 'Joined';
	       joinButton.classList.remove('btn-outline-primary');
	       joinButton.classList.add('btn-primary');
	       joinButton.style.backgroundColor = '#015AAA';
	       joinButton.style.color = '#ffffff';
	       joinButton.style.borderColor = '#015AAA';
	
	       // Create the leave button
	       var leaveButton = document.createElement('button');
	       leaveButton.type = 'button';
	       leaveButton.className = 'btn btn-outline-danger btn-custom-outline ms-1';
	       leaveButton.textContent = 'Leave';
	       leaveButton.style.marginLeft = '5px';
	       leaveButton.style.borderRadius = '30px';
	       leaveButton.style.transition = 'background-color 0.3s ease, color 0.3s ease';
	
	       leaveButton.onmouseover = function() {
	           leaveButton.className = 'btn btn-danger ms-1';
	       };
	       leaveButton.onmouseout = function() {
	           leaveButton.className = 'btn btn-outline-danger btn-custom-outline ms-1';
	       };
	
	       joinButton.parentNode.insertBefore(leaveButton, joinButton.nextSibling);
	
	       leaveButton.addEventListener('click', function() {
	           joinButton.textContent = 'Join';
	           joinButton.classList.remove('btn-primary');
	           joinButton.classList.add('btn-outline-primary');
	           joinButton.style.backgroundColor = '';
	           joinButton.style.color = '';
	           joinButton.style.borderColor = '';
	           leaveButton.remove();
	
	           // Hide the "Create New Post" button
	           var createPostBtn = document.querySelector('.create-post-btn');
	           createPostBtn.style.display = 'none';
	       });
	
	       // Show the "Create New Post" button
	       var createPostBtn = document.querySelector('.create-post-btn');
	       createPostBtn.style.display = 'block';
	   } else {
	       alert('You must agree to the rules before joining.');
	   }
	});
	
	document.getElementById('modalJoinButton').addEventListener('click', function() {
	if (document.getElementById('agreeRulesCheckbox').checked) {
	var joinButton = document.getElementById('joinButton');
	joinButton.textContent = 'Joined';
	joinButton.classList.remove('btn-outline-primary');
	joinButton.classList.add('btn-primary');
	joinButton.style.backgroundColor = '#015AAA'; // Warna ungu yang dimaksud
	joinButton.style.color = '#ffffff'; // Warna teks putih
	joinButton.style.borderColor = '#015AAA'; // Warna border ungu
	
	
	// Add the leave button next to the joined button
	joinButton.parentNode.insertBefore(leaveButton, joinButton.nextSibling);
	
	// Add event listener to the leave button
	leaveButton.addEventListener('click', function() {
	   joinButton.textContent = 'Join';
	   joinButton.classList.remove('btn-primary');
	   joinButton.classList.add('btn-outline-primary');
	   joinButton.style.backgroundColor = ''; // Kembalikan warna ke default
	   joinButton.style.color = ''; // Kembalikan warna teks ke default
	   joinButton.style.borderColor = ''; // Kembalikan warna border ke default
	   leaveButton.remove();
	});
	} else {
	alert('You must agree to the rules before joining.');
	}
	});
	
	document.addEventListener('DOMContentLoaded', function () {
	const dropdownItems = document.querySelectorAll('.dropdown-item');
	const posts = document.querySelectorAll('.post');
	const dropdownButton = document.getElementById('dropdownMenuButton');
	
	dropdownItems.forEach(item => {
	item.addEventListener('click', function (event) {
	   event.preventDefault();
	   const postCategory = this.getAttribute('data-post');
	   filterPosts(postCategory);
	   dropdownButton.textContent = this.textContent;
	});
	});
	
	function filterPosts(postCategory) {
	posts.forEach(post => {
	   if (postCategory === 'Latest' || post.getAttribute('data-post') === postCategory) {
	       post.style.display = 'block';
	   } else {
	       post.style.display = 'none';
	   }
	});
	}
	});
	
</script>
<!-- Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="memberModalLabel">Member List</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					@foreach ($members as $member)
					<li class="list-group-item d-flex align-items-center">
						<img src="{{ $member->avatar }}" alt="Member Avatar" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
						{{ $member->name }} ({{ '@' . $member->username }}) [{{ $member->pivot->role }}]
					</li>
					@endforeach
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script>
	function joinCommunity(communityId) {
	    Swal.fire({
	        title: 'Are you sure?',
	        text: "You are about to join this community!",
	        icon: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        confirmButtonText: 'Yes, join!'
	    }).then((result) => {
	        if (result.isConfirmed) {
	            fetch('{{ route('community.join') }}', {
	                method: 'POST',
	                headers: {
	                    'Content-Type': 'application/json',
	                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
	                },
	                body: JSON.stringify({ community_id: communityId })
	            })
	            .then(response => response.json())
	            .then(data => {
	                if (data.status === 'joined') {
	                    location.reload();
	                }
	            });
	        }
	    })
	}
	
	function leaveCommunity(communityId) {
	    Swal.fire({
	        title: 'Are you sure?',
	        text: "You are about to leave this community!",
	        icon: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        confirmButtonText: 'Yes, leave!'
	    }).then((result) => {
	        if (result.isConfirmed) {
	            fetch('{{ route('community.leave') }}', {
	                method: 'POST',
	                headers: {
	                    'Content-Type': 'application/json',
	                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
	                },
	                body: JSON.stringify({ community_id: communityId })
	            })
	            .then(response => response.json())
	            .then(data => {
	                if (data.status === 'left') {
	                    location.reload();
	                }
	            });
	        }
	    })
	}
</script>
@endsection
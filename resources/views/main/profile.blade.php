@extends('layouts.template_main')
@section('title', 'My Profile')
@section('content')
<main class="container-fluid border" style="margin-top: 69px;">
	<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4 border-start border-end" style="overflow-y: auto;">
			<div class="profile-container">
				<div class="profile-header bg-light">
					<div class="d-flex justify-content-center align-items-center pt-5" style="height: 450px; position: relative;">
						<div class="position-absolute top-0 start-0 w-100" style="background-color: #4D88FF; height: 140px;"></div>
						<div style="position: relative; text-align: center; z-index: 1;">
							<div class="rounded-circle overflow-hidden border border-dark shadow" style="width: 140px; height: 140px; margin-top: -10px; position: absolute; left: 50%; transform: translateX(-50%);">
								<img src="{{$avatar}}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
							</div>
							<div style="text-align: center; margin-top: 140px;">
								<!-- Adjusted margin-top to push the content below the centered profile picture -->
								<h2 class="mt-3 mb-2">{{ $name }}</h2>
								<span class="mt-3 mb-2">{{ '@' . $username }}</span>
								<p class="fs-6 mt-2 mb-2">
									<span style="color: {{ $interest == 'Business' ? 'orange' : '#9747FF' }}; margin-right: 8px;">• {{$interest}}</span>
								</p>
								<p class="fs-6 mt-2 mb-2">{{ $bio }}</p>
								<div class="user-stats">
									<div class="d-flex justify-content-center fs-5" style="margin-top: 40px;">
										<div style="padding: 0 20px; border-right: 3px solid black;">
											<div class="mb-4">{{ Auth::user()->followers()->count() }}</div>
											<div>Followers</div>
										</div>
										<div style="padding: 0 20px; border-right: 3px solid black;">
											<div class="mb-4">{{ Auth::user()->following()->count() }}</div>
											<div>Following</div>
										</div>
										<div style="padding: 0 20px;">
											<div class="mb-4">{{ Auth::user()->totalLikes() }}</div>
											<div>Likes</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr class="mt-1" style="border-top: 4px solid #E5E5E5;">
				</div>
				<div class="mt-3">
					<h6 style="color: #13005A;">My Communities</h6>
					@if ($allMyCommunities->isNotEmpty())
						@foreach ($allMyCommunities as $myCommunity)
							<div class="d-flex align-items-center mt-2">
								<div class="rounded-circle overflow-hidden" style="width: 30px; height: 30px; background-color: #f0f0f0;">
									<img src="{{ $myCommunity->thumbnail }}" alt="Community Image" style="width: 100%; height: 100%; object-fit: cover;">
								</div>
								<a href="{{ route('community.detail', ['slug' => $myCommunity->slug]) }}" class="ms-2 text-decoration-none" style="color: black;">{{ $myCommunity->name }}</a>
							</div>
						@endforeach
					@else
					<div class="alert alert-warning d-flex align-items-center mt-2" role="alert" style="width: 100%;">
						<div style="flex: 1;">
							<span>You're not yet joined any community.</span>
						</div>
						<a href="{{ route('community') }}" class="btn btn-outline-light" style="border-color: #13005A; color: #13005A; margin-left: 10px;">Go find some Community</a>
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-7 border-start border-end">
			<div class="posts" style="position: sticky; top: 0; z-index: 1;">
				<div class="posts">
					<ul class="nav justify-content-center navbar-bawah">
						<!-- Tambahkan kelas 'navbar-bawah' untuk membedakan -->
						<li class="nav-item">
							<a class="nav-link text-secondary active" href="#" style="margin-right: 9px; margin-left: 9px;" onclick="showPosts('Posts')">Posts</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-secondary" href="#" style="margin-right: 9px; margin-left: 9px;" onclick="showPosts('Likes')">Likes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-secondary" href="#" style="margin-right: 9px; margin-left: 9px;" onclick="showPosts('Saves')">Saves</a>
						</li>
					</ul>
					<hr class="mt-1" style="border-top: 3px solid #E5E5E5;">
				</div>
				<div class="all-posts" style="max-height: 500px; overflow-y: auto;">
					@foreach ($myposts as $mypost)
					<div class="post mt-4 me-5 mb-5" data-category="Posts">
						<div class="d-flex align-items-center mb-2">
							<div class="rounded-circle overflow-hidden me-2" style="width: 50px; height: 50px; background-color: #f0f0f0;">
								<img src="{{ $mypost->user->avatar }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
							</div>
							<div>
								<h6 class="mb-0">{{ $mypost->user->name }}<span class="text-muted"> {{ '@' . $mypost->user->username }}</span></h6>
								<p class="fs-6" style="{{ $mypost->category == 'Business' ? 'orange' : '#9747FF' }}; margin-bottom: 0;"> > {{ $mypost->category }}</p>
							</div>
						</div>
						<div class="row mb-0 ms-5 mb-2">
							<div class="col">
								<h5 class="mb-0">{{ $mypost->title }}</h5>
							</div>
						</div>
						<div class="row mb-0 ms-5">
							<div class="col">
								@if ( $mypost->thumbnail )
								<img src="{{ $mypost->thumbnail }}" class="img-fluid w-25" style="border-radius: 15px;" alt="Image">								
								@endif
								<p class="mb-0 mt-1" style="text-align: justify;">{{ $mypost->content }}</p>
							</div>
						</div>
						<div class="row justify-content-end mt-3 me-2">
							<div class="col-auto">
								<a class="link-posts me-3 me-md-5" onclick="toggleLike({{ $mypost->id }})">
								<i id="like-{{ $mypost->id }}" class="thumbs up outline black icon" style="font-size: 20px; {{ $mypost->liked ? 'display: none;' : '' }}"></i>
								<i id="liked-{{ $mypost->id }}" class="thumbs up black icon" style="font-size: 20px; {{ $mypost->liked ? '' : 'display: none;' }}"></i>
								<span id="likeCount-{{ $mypost->id }}" style="margin-left: 5px; color: black;">
								{{ $mypost->likes()->count() }}
								</span>
								</a>
								<form id="like-form-{{ $mypost->id }}" method="POST" action="{{ route('like.post') }}" style="display: none;">
									@csrf
									<input type="hidden" name="post_id" value="{{ $mypost->id }}">
								</form>
								<a class="link-posts me-3 me-md-5" href="#">
									<i class="comment alternate outline black icon" style="font-size: 20px;"></i>
									<!-- <span style="margin-left: 5px; color: black;">5</span> -->
								</a>
								<a class="link-posts me-3 me-md-5" onclick="toggleBookmark({{ $mypost->id }})">
								<i id="bookmark-{{ $mypost->id }}" class="bookmark outline black icon" style="font-size: 20px; {{ $mypost->bookmarked ? 'display: none;' : '' }}"></i>
								<i id="bookmarked-{{ $mypost->id }}" class="bookmark icon" style="font-size: 20px; color: orange; {{ $mypost->bookmarked ? '' : 'display: none;' }}"></i>
								<span id="bookmarkCount-{{ $mypost->id }}" style="margin-left: 5px; color: black;">
								{{ $mypost->bookmarks()->count() }}
								</span>
								</a>
								<form id="bookmark-form-{{ $mypost->id }}" method="POST" action="{{ route('bookmark.post') }}" style="display: none;">
									@csrf
									<input type="hidden" name="post_id" value="{{ $mypost->id }}">
								</form>
								<script>
									function toggleLike(postId) {
									    var likeIcon = document.getElementById('like-' + postId);
									    var likedIcon = document.getElementById('liked-' + postId);
									    var likeCount = document.getElementById('likeCount-' + postId);
									
									    fetch('{{ route('like.post') }}', {
									        method: 'POST',
									        headers: {
									            'Content-Type': 'application/json',
									            'X-CSRF-TOKEN': '{{ csrf_token() }}'
									        },
									        body: JSON.stringify({
									            post_id: postId
									        })
									    })
									    .then(response => response.json())
									    .then(data => {
									        if (data.liked) {
									            likeIcon.style.display = 'none';
									            likedIcon.style.display = 'inline';
									        } else {
									            likeIcon.style.display = 'inline';
									            likedIcon.style.display = 'none';
									        }
									        likeCount.textContent = data.likeCount;
									    });
									}
									
									function toggleBookmark(postId) {
									    var bookmarkIcon = document.getElementById('bookmark-' + postId);
									    var bookmarkedIcon = document.getElementById('bookmarked-' + postId);
									    var bookmarkCount = document.getElementById('bookmarkCount-' + postId);
									
									    fetch('{{ route('bookmark.post') }}', {
									        method: 'POST',
									        headers: {
									            'Content-Type': 'application/json',
									            'X-CSRF-TOKEN': '{{ csrf_token() }}'
									        },
									        body: JSON.stringify({
									            post_id: postId
									        })
									    })
									    .then(response => response.json())
									    .then(data => {
									        if (data.bookmarked) {
									            bookmarkIcon.style.display = 'none';
									            bookmarkedIcon.style.display = 'inline';
									        } else {
									            bookmarkIcon.style.display = 'inline';
									            bookmarkedIcon.style.display = 'none';
									        }
									        bookmarkCount.textContent = data.bookmarkCount;
									    });
									}
								</script>
							</div>
						</div>
						<hr class="mt-3" style="border-top: 3px solid #E5E5E5;">
					</div>
					@endforeach
					@foreach ($likeposts as $likepost)
					<div class="post mt-4 me-5" style="display: none;" data-category="Likes">
						<div class="d-flex align-items-center mb-2">
							<div class="rounded-circle overflow-hidden me-2" style="width: 50px; height: 50px; background-color: #f0f0f0;">
								<img src="{{ $avatar }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
							</div>
							<div>
								<h6 class="mb-0">{{ $likepost->post->user->name }}<span class="text-muted">{{ '@'.$likepost->post->user->username }}</span></h6>
								<p class="fs-6" style="color: {{ $likepost->post->category == 'Business' ? 'orange' : '#9747FF' }}; margin-bottom: 0;"> > {{ $likepost->post->category }}</p>
							</div>
						</div>
						<div class="row mb-0 ms-5 mb-2">
							<div class="col">
								<h5 class="mb-0">{{ $likepost->post->title }}</h5>
							</div>
						</div>
						<div class="row mb-0 ms-5">
							<div class="col">
								@if ($likepost->post->thumbnail)
								<img src="{{ $likepost->post->thumbnail }}" class="img-fluid w-25" style="border-radius: 15px; width: 100%; height: 100%;" alt="Image">
								@endif
								<p class="mb-0">{{ $likepost->post->content }}</p>
							</div>
						</div>
						<div class="row justify-content-end mt-3 me-2 mb-5">
							<div class="col-auto">
								<a class="link-posts me-3 me-md-5" onclick="toggleLike({{ $likepost->post->id }})">
								<i id="like-{{ $likepost->post->id }}" class="thumbs up outline black icon" style="font-size: 20px; {{ $likepost->post->liked ? 'display: none;' : '' }}"></i>
								<i id="liked-{{ $likepost->post->id }}" class="thumbs up black icon" style="font-size: 20px; {{ $likepost->post->liked ? '' : 'display: none;' }}"></i>
								<span id="likeCount-{{ $likepost->post->id }}" style="margin-left: 5px; color: black;">
								{{ $likepost->post->likes()->count() }}
								</span>
								</a>
								<form id="like-form-{{ $likepost->post->id }}" method="POST" action="{{ route('like.post') }}" style="display: none;">
									@csrf
									<input type="hidden" name="post_id" value="{{ $likepost->post->id }}">
								</form>
								<a class="link-posts me-3 me-md-5" href="#">
									<i class="comment alternate outline black icon" style="font-size: 20px;"></i>
									<!-- <span style="margin-left: 5px; color: black;">5</span> -->
								</a>
								<a class="link-posts me-3 me-md-5" onclick="toggleBookmark({{ $likepost->post->id }})">
								<i id="bookmark-{{ $likepost->post->id }}" class="bookmark outline black icon" style="font-size: 20px; {{ $likepost->post->bookmarked ? 'display: none;' : '' }}"></i>
								<i id="bookmarked-{{ $likepost->post->id }}" class="bookmark icon" style="font-size: 20px; color: orange; {{ $likepost->post->bookmarked ? '' : 'display: none;' }}"></i>
								<span id="bookmarkCount-{{ $likepost->post->id }}" style="margin-left: 5px; color: black;">
								{{ $likepost->post->bookmarks()->count() }}
								</span>
								</a>
								<form id="bookmark-form-{{ $likepost->post->id }}" method="POST" action="{{ route('bookmark.post') }}" style="display: none;">
									@csrf
									<input type="hidden" name="post_id" value="{{ $likepost->post->id }}">
								</form>
								<script>
									function toggleLike(postId) {
										var likeIcon = document.getElementById('like-' + postId);
										var likedIcon = document.getElementById('liked-' + postId);
										var likeCount = document.getElementById('likeCount-' + postId);
									
										fetch('{{ route('like.post') }}', {
											method: 'POST',
											headers: {
												'Content-Type': 'application/json',
												'X-CSRF-TOKEN': '{{ csrf_token() }}'
											},
											body: JSON.stringify({
												post_id: postId
											})
										})
										.then(response => response.json())
										.then(data => {
											if (data.liked) {
												likeIcon.style.display = 'none';
												likedIcon.style.display = 'inline';
											} else {
												likeIcon.style.display = 'inline';
												likedIcon.style.display = 'none';
											}
											likeCount.textContent = data.likeCount;
										});
									}
									
									function toggleBookmark(postId) {
										var bookmarkIcon = document.getElementById('bookmark-' + postId);
										var bookmarkedIcon = document.getElementById('bookmarked-' + postId);
										var bookmarkCount = document.getElementById('bookmarkCount-' + postId);
									
										fetch('{{ route('bookmark.post') }}', {
											method: 'POST',
											headers: {
												'Content-Type': 'application/json',
												'X-CSRF-TOKEN': '{{ csrf_token() }}'
											},
											body: JSON.stringify({
												post_id: postId
											})
										})
										.then(response => response.json())
										.then(data => {
											if (data.bookmarked) {
												bookmarkIcon.style.display = 'none';
												bookmarkedIcon.style.display = 'inline';
											} else {
												bookmarkIcon.style.display = 'inline';
												bookmarkedIcon.style.display = 'none';
											}
											bookmarkCount.textContent = data.bookmarkCount;
										});
									}
								</script>
							</div>
						</div>
						<hr class="mt-3" style="border-top: 3px solid #E5E5E5;">
					</div>
					@endforeach
					@foreach ($saveposts as $savepost)
					<div class="post mt-4 me-5" style="display: none;" data-category="Saves">
						<div class="d-flex align-items-center mb-2">
							<div class="rounded-circle overflow-hidden me-2" style="width: 50px; height: 50px; background-color: #f0f0f0;">
								<img src="{{ $avatar }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
							</div>
							<div>
								<h6 class="mb-0">{{ $savepost->post->user->name }}<span class="text-muted">{{ '@'.$savepost->post->user->username }}</span></h6>
								<p class="fs-6" style="color: {{ $savepost->post->category == 'Business' ? 'orange' : '#9747FF' }}; margin-bottom: 0;"> > {{ $savepost->post->category }}</p>
							</div>
						</div>
						<div class="row mb-0 ms-5 mb-2">
							<div class="col">
								<h5 class="mb-0">{{ $savepost->post->title }}</h5>
							</div>
						</div>
						<div class="row mb-0 ms-5">
							<div class="col">
								@if ($savepost->post->thumbnail)
								<img src="{{ $savepost->post->thumbnail }}" class="img-fluid w-25" style="border-radius: 15px; width: 100%; height: 100%;" alt="Image">
								@endif
								<p class="mb-0">{{ $savepost->post->content }}</p>
							</div>
						</div>
						<div class="row justify-content-end mt-3 me-2 mb-5">
							<div class="col-auto">
								<a class="link-posts me-3 me-md-5" onclick="toggleLike({{ $likepost->post->id }})">
								<i id="like-{{ $likepost->post->id }}" class="thumbs up outline black icon" style="font-size: 20px; {{ $likepost->post->liked ? 'display: none;' : '' }}"></i>
								<i id="liked-{{ $likepost->post->id }}" class="thumbs up black icon" style="font-size: 20px; {{ $likepost->post->liked ? '' : 'display: none;' }}"></i>
								<span id="likeCount-{{ $likepost->post->id }}" style="margin-left: 5px; color: black;">
								{{ $likepost->post->likes()->count() }}
								</span>
								</a>
								<form id="like-form-{{ $likepost->post->id }}" method="POST" action="{{ route('like.post') }}" style="display: none;">
									@csrf
									<input type="hidden" name="post_id" value="{{ $likepost->post->id }}">
								</form>
								<a class="link-posts me-3 me-md-5" href="#">
									<i class="comment alternate outline black icon" style="font-size: 20px;"></i>
									<!-- <span style="margin-left: 5px; color: black;">5</span> -->
								</a>
								<a class="link-posts me-3 me-md-5" onclick="toggleBookmark({{ $likepost->post->id }})">
								<i id="bookmark-{{ $likepost->post->id }}" class="bookmark outline black icon" style="font-size: 20px; {{ $likepost->post->bookmarked ? 'display: none;' : '' }}"></i>
								<i id="bookmarked-{{ $likepost->post->id }}" class="bookmark icon" style="font-size: 20px; color: orange; {{ $likepost->post->bookmarked ? '' : 'display: none;' }}"></i>
								<span id="bookmarkCount-{{ $likepost->post->id }}" style="margin-left: 5px; color: black;">
								{{ $likepost->post->bookmarks()->count() }}
								</span>
								</a>
								<form id="bookmark-form-{{ $likepost->post->id }}" method="POST" action="{{ route('bookmark.post') }}" style="display: none;">
									@csrf
									<input type="hidden" name="post_id" value="{{ $likepost->post->id }}">
								</form>
								<script>
									function toggleLike(postId) {
										var likeIcon = document.getElementById('like-' + postId);
										var likedIcon = document.getElementById('liked-' + postId);
										var likeCount = document.getElementById('likeCount-' + postId);
									
										fetch('{{ route('like.post') }}', {
											method: 'POST',
											headers: {
												'Content-Type': 'application/json',
												'X-CSRF-TOKEN': '{{ csrf_token() }}'
											},
											body: JSON.stringify({
												post_id: postId
											})
										})
										.then(response => response.json())
										.then(data => {
											if (data.liked) {
												likeIcon.style.display = 'none';
												likedIcon.style.display = 'inline';
											} else {
												likeIcon.style.display = 'inline';
												likedIcon.style.display = 'none';
											}
											likeCount.textContent = data.likeCount;
										});
									}
									
									function toggleBookmark(postId) {
										var bookmarkIcon = document.getElementById('bookmark-' + postId);
										var bookmarkedIcon = document.getElementById('bookmarked-' + postId);
										var bookmarkCount = document.getElementById('bookmarkCount-' + postId);
									
										fetch('{{ route('bookmark.post') }}', {
											method: 'POST',
											headers: {
												'Content-Type': 'application/json',
												'X-CSRF-TOKEN': '{{ csrf_token() }}'
											},
											body: JSON.stringify({
												post_id: postId
											})
										})
										.then(response => response.json())
										.then(data => {
											if (data.bookmarked) {
												bookmarkIcon.style.display = 'none';
												bookmarkedIcon.style.display = 'inline';
											} else {
												bookmarkIcon.style.display = 'inline';
												bookmarkedIcon.style.display = 'none';
											}
											bookmarkCount.textContent = data.bookmarkCount;
										});
									}
								</script>
							</div>
						</div>
						<hr class="mt-3" style="border-top: 3px solid #E5E5E5;">
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</main>
<script>
	function removeActiveClass() {
	    var navLinks = document.querySelectorAll('.nav-link');
	    navLinks.forEach(function(link) {
	        link.classList.remove('active');
	    });
	}
	
	function setActiveLink(link) {
	    removeActiveClass();
	    link.classList.add('active');
	}
	
	var navLinks = document.querySelectorAll('.nav-link');
	
	navLinks.forEach(function(link) {
	    link.addEventListener('click', function() {
	        setActiveLink(link);
	    });
	});
	
	function showPosts(category) {
	    var posts = document.getElementsByClassName('post');
	    for (var i = 0; i < posts.length; i++) {
	        var post = posts[i];
	        var postCategory = post.getAttribute('data-category');
	        if (category === 'All' || postCategory === category) {
	            post.style.display = 'block';
	        } else {
	            post.style.display = 'none';
	        }
	    }
	}
</script>
@endsection
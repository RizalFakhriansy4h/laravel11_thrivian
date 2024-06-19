@extends('layouts.template_main')
@section('title', 'Home')
@section('content')
<main class="container-fluid border" style="margin-top: 6%;">
	<div class="row justify-content-center">
		<div class="col-3 border-start border-end ml-3 d-none d-md-block" style="overflow-y: auto;">
			<a href="{{ route('viewpost') }}" type="button" class="btn btn-outline-light w-100 mt-2" style="border-radius: 30px; border-color: #015AAA; color: #015AAA;">
			<i class="fas fa-plus-circle" style="font-size: 15px; color: #015AAA;"></i>
			Create New Post
			</a>
			@if ($role == 1)
			<a href="{{ route('viewcommunity') }}" type="button" class="btn btn-outline-light w-100 mt-2" style="border-radius: 30px; border-color: #015AAA; color: #015AAA;">
			<i class="fas fa-plus-circle" style="font-size: 15px; color: #015AAA;"></i>
			Create New Community
			</a>
			<a href="{{ route('viewevent') }}" type="button" class="btn btn-outline-light w-100 mt-2" style="border-radius: 30px; border-color: #015AAA; color: #015AAA;">
			<i class="fas fa-plus-circle" style="font-size: 15px; color: #015AAA;"></i>
			Create New Event
			</a>
			@endif
			<div class="mt-3">
				<h6 style="color: #015AAA;">My Communities</h6>
				@if ($allMyCommunities->isNotEmpty())
				@foreach ($allMyCommunities as $myCommunity)
                <div class="d-flex align-items-center mt-2">
                    <div class="rounded-circle overflow-hidden bg-light" style="width: 30px; height: 30px;">
                        <img src="{{ $myCommunity->thumbnail }}" alt="Community Image" class="w-100 h-100 object-cover">
                    </div>
                    <a href="{{ route('community.detail', ['slug' => $myCommunity->slug]) }}" class="ms-2 text-dark text-decoration-none">{{ $myCommunity->name }}</a>
                </div>
				@endforeach
				@else
				<div class="alert alert-warning d-flex align-items-center mt-2" role="alert" style="width: 100%;">
					<div style="flex: 1;">
						<span>You're not yet joined any community.</span>
					</div>
					<a href="{{ route('community') }}" class="btn btn-outline-light" style="border-color: #015AAA; color: #015AAA; margin-left: 10px;">Go find some Community</a>
				</div>
				@endif
			</div>
			<hr class="my-3" style="border-top: 3px solid #E5E5E5;">
			<div class="mt-3">
				<h6 class="mb-3" style="color: #015AAA;">Upcoming Events</h6>
				@if($allMyEvents->isNotEmpty())
				@foreach($allMyEvents as $index => $event)
				@if($index == 0)
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
				@else
				<div class="alert alert-warning d-flex align-items-center" role="alert">
					<strong class="me-2">No upcoming events!</strong> 
					You haven't joined any events yet. 
					<a href="{{ route('event') }}" class="btn btn-outline-dark ms-3">Explore Events</a>
				</div>
				@endif
			</div>
			<div class="d-flex justify-content-center text-align-center mt-4">
				<span class="text-muted small fs-9" style="text-align: center; text-decoration: none;">
					<a href="{{route('privacy')}}" class="text-black">Privacy & Policy</a>
					<p class="text-muted fs-9">Thrivian.org © 2024</p>
				</span>
			</div>
		</div>
        <div class="col-md-8 border-end border-start mt-5 mt-md-0 mb-5 mb-md-0">
            <div class="posts">
                <div class="posts mb-2">
                    <div class="posts mb-2">
                        <p class="mt-2"><b>Show posts from</b>
                            <a href="#" id="allBtn" class="badge-post rounded-pill bg-light text-dark me-1 border border-secondary active" onclick="showPosts('All')">All</a>
                            <a href="#" id="businessBtn" class="badge-post rounded-pill bg-light text-dark me-1 border border-secondary" onclick="showPosts('Business')">Business</a>
                            <a href="#" id="financeBtn" class="badge-post rounded-pill bg-light text-dark border border-secondary" onclick="showPosts('Finance')">Finance</a>
                        </p>
                    </div>
                </div>
            </div>  
			<div class="all-posts overflow-auto" style="max-height: 1000px;">
				@foreach ($allPosts as $post)
				<div class="post mt-4 me-5" data-category="{{ $post->category ? ($post->category == 'Business' ? 'Business' : 'Finance') : '' }}">
					<div class="d-flex align-items-center mb-2">
						<div class="rounded-circle overflow-hidden me-2" style="width: 50px; height: 50px; background-color: #f0f0f0;">
							<img src="{{ $post->user->avatar }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
						</div>
						<div>
							<h6 class="mb-0">
								{{ $post->user->name }} 
								<span class="text-muted">
								<a href="{{ route('profile.people', ['username' => $post->user->username]) }}">{{ '@' . $post->user->username }}</a>
								</span>
								@if ($post->community)
								<a href="{{ route('community.detail', ['slug' => $post->community->slug]) }}" style="color: inherit;">> {{ $post->community->name }}</a>
								@endif
							</h6>
							<p class="fs-6" style="color: {{ $post->category == 'Business' ? 'orange' : ($post->category == 'Finance' ? '#9747FF' : '') }}; margin-bottom: 0;">
								{{ $post->category ? '> ' . $post->category : '' }}
							</p>
						</div>
					</div>
					<div class="row mb-0 ms-5 mb-2">
						<div class="col">
							<h3 class="mb-0">{{ $post->title }}</h3>
						</div>
					</div>
					<div class="row mb-0 ms-5">
						<div class="col">
							@if ($post->thumbnail)
							<img src="{{ $post->thumbnail }}" class="img-fluid w-25" style="border-radius: 15px;" alt="Image">
							@endif
							<p class="mb-0" style="text-align: justify;">{{ $post->content }}</p>
						</div>
					</div>
					<div class="row justify-content-end mt-3 me-2">
						<div class="col-auto">
							<a class="link-posts me-3 me-md-5" onclick="toggleLike({{ $post->id }})">
							<i id="like-{{ $post->id }}" class="thumbs up outline black icon" style="font-size: 20px; {{ $post->liked ? 'display: none;' : '' }}"></i>
							<i id="liked-{{ $post->id }}" class="thumbs up black icon" style="font-size: 20px; {{ $post->liked ? '' : 'display: none;' }}"></i>
							<span id="likeCount-{{ $post->id }}" style="margin-left: 5px; color: black;">
							{{ $post->likes()->count() }}
							</span>
							</a>
							<form id="like-form-{{ $post->id }}" method="POST" action="{{ route('like.post') }}" style="display: none;">
								@csrf
								<input type="hidden" name="post_id" value="{{ $post->id }}">
							</form>
							<a class="link-posts me-3 me-md-5" href="{{ route('post.detail', ['slug' => $post->slug]) }}">
							<i class="comment alternate outline black icon" style="font-size: 20px;"></i>
							</a>
							<a class="link-posts me-3 me-md-5" onclick="toggleBookmark({{ $post->id }})">
							<i id="bookmark-{{ $post->id }}" class="bookmark outline black icon" style="font-size: 20px; {{ $post->bookmarked ? 'display: none;' : '' }}"></i>
							<i id="bookmarked-{{ $post->id }}" class="bookmark icon" style="font-size: 20px; color: orange; {{ $post->bookmarked ? '' : 'display: none;' }}"></i>
							<span id="bookmarkCount-{{ $post->id }}" style="margin-left: 5px; color: black;">
							{{ $post->bookmarks()->count() }}
							</span>
							</a>
							<form id="bookmark-form-{{ $post->id }}" method="POST" action="{{ route('bookmark.post') }}" style="display: none;">
								@csrf
								<input type="hidden" name="post_id" value="{{ $post->id }}">
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
</main>
@endsection
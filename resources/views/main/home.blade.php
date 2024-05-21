@extends('layouts.template_main')
@section('title', 'Home')
@section('content')
<main class="container-fluid border" style="margin-top: 6%;">

	<div class="row justify-content-center">
		<div class="col-md-3 border-start border-end ml-3 d-none d-md-block" style="overflow-y: auto;">
			<button type="button" class="btn btn-outline-light" style="width: 280px; margin-top: 9px; border-radius: 30px; border-color: #13005A; color: #13005A;" data-bs-toggle="modal" data-bs-target="#createPostModal">
			<i class="add circle icon" style="font-size: 15px; color: #13005A;"></i>
			Create New Post
			</button>
			<button type="button" class="btn btn-outline-light" style="width: 280px; margin-top: 9px; border-radius: 30px; border-color: #13005A; color: #13005A;" data-bs-toggle="modal" data-bs-target="#createCommunityModal">
			<i class="add circle icon" style="font-size: 15px; color: #13005A;"></i>
			Create New Community
			</button>
			@if ($role == 1)
				<button type="button" class="btn btn-outline-light" style="width: 280px; margin-top: 9px; border-radius: 30px; border-color: #13005A; color: #13005A;">
				<i class="add circle icon" style="font-size: 15px; color: #13005A;"></i>
				Create New Event
				</button>
			@endif
			<div class="mt-3">
				<h6 style="color: #13005A;">My Communities</h6>
				@if ($allMyCommunities->isNotEmpty())
					@foreach ($allMyCommunities as $myCommunity)
						<div class="d-flex align-items-center mt-2">
							<div class="rounded-circle overflow-hidden" style="width: 30px; height: 30px; background-color: #f0f0f0;">
								<img src="{{ $myCommunity->thumbnail }}" alt="Community Image" style="width: 100%; height: 100%; object-fit: cover;">
							</div>
							<a href="link_ke_halaman_komunitas_{{ $myCommunity->id }}" class="ms-2 text-decoration-none" style="color: black;">{{ $myCommunity->name }}</a>
						</div>
					@endforeach
				@else
					<div class="d-flex align-items-center mt-2">
						<div class="rounded-circle overflow-hidden" style="width: 30px; height: 30px; background-color: #f0f0f0;">
							<img src="/storage/thumbnail_community/404.jpg" alt="Community Image" style="width: 100%; height: 100%; object-fit: cover;">
						</div>
						<a href="" class="ms-2 text-decoration-none" style="color: black;">Go find some Community</a>
					</div>
				@endif

			</div>
			<hr class="my-3" style="border-top: 3px solid #E5E5E5;">
			<div class="mt-3">
				<h6 style="color: #13005A;">Upcoming Events</h6>
				<div class="border-radius mb-2">
					<img src="/assets/img/pidato.jpg" class="card-img-top img-fluid" style="border-radius: 15px;" alt="Pidato">
					<div class="card-body">
						<h5 class="card-title fs-6">Personal Finance Webinar <span class="badge rounded-pill badge-custom" style="background-color: #13005A;">September 10th</span></h5>
						<p class="card-text">
							Come reserve your seat at our free gathering and 
							sharing online seminar talking about how to manage 
							your personal finance today!
						</p>
					</div>
				</div>
				<div class="card-row row align-items-center mb-3">
					<div class="col-md-2">
						<img src="/assets/img/waiting-room-with-monitors.jpg" alt="..." class="rounded" style="width: 130px; height: 130px;">
					</div>
					<div class="col-md-10 d-flex align-items-start">
						<!-- Menggunakan d-flex dan align-items-start -->
						<div class="card-body" style="margin-left: 77px;">
							<span class="badge rounded-pill badge-custom mb-2" style="background-color: #13005A;">September 10th</span>
							<h6 class="card-title text-sm">Stocks market reope...</h6>
							<p class="card-text text-sm">
								Come reserve your seat at 
								our free gathering and<a href="" class="full-posts" style="text-decoration: none;">....</a>
							</p>
						</div>
					</div>
				</div>
				<div class="card-row row align-items-center">
					<div class="col-md-2">
						<img src="/assets/img/waiting-room-with-monitors.jpg" alt="..." class="rounded" style="width: 130px; height: 130px;">
					</div>
					<div class="col-md-10 d-flex align-items-start">
						<!-- Menggunakan d-flex dan align-items-start -->
						<div class="card-body" style="margin-left: 77px;">
							<span class="badge rounded-pill badge-custom mb-2" style="background-color: #13005A;">September 10th</span>
							<h6 class="card-title text-sm">Stocks market reope...</h6>
							<p class="card-text text-sm">
								Come reserve your seat at 
								our free gathering and<a href="" class="full-posts" style="text-decoration: none;">....</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="d-flex justify-content-center text-align-center mt-4">
				<span class="text-muted small fs-9" style="text-align: center; text-decoration: none;">
					<a href="about_us.html" class="text-muted">About Us</a> • 
					<a href="privacy_terms.html" class="text-muted">Privacy & Terms</a> • 
					<a href="more.html" class="text-muted">More</a>
					<p class="text-muted fs-9">Thrivian.org © 2024</p>
				</span>
			</div>
		</div>
		<div class="col-md-8 border-end border-start">
			<div class="posts">
				<div class="posts">
					<p style="margin-top: 5px;"><b>Show posts from</b>
						<a href="#" id="allBtn" class="badge rounded-pill bg-light text-dark me-1 border border-secondary active" onclick="showPosts('All')">All</a>
						<a href="#" id="businessBtn" class="badge rounded-pill bg-light text-dark me-1 border border-secondary" onclick="showPosts('Business')">Business</a>
						<a href="#" id="financeBtn" class="badge rounded-pill bg-light text-dark border border-secondary" onclick="showPosts('Finance')">Finance</a>
					</p>
				</div>
			</div>
			<div class="all-posts overflow-auto" style="max-height: 1000px;">
			@foreach ($allPosts as $post)
    <div class="post mt-4 me-5" data-category="{{ $post->category == 'Business' ? 'Business' : 'Finance' }}">
        <div class="d-flex align-items-center mb-2">
            <div class="rounded-circle overflow-hidden me-2" style="width: 50px; height: 50px; background-color: #f0f0f0;">
                <img src="{{ $post->user->avatar }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div>
                <h6 class="mb-0">{{ $post->user->name }} <span class="text-muted"> {{ '@' . $post->user->username }}</span></h6>
                <p class="fs-6" style="color: {{ $post->category == 'Business' ? 'orange' : '#9747FF' }}; margin-bottom: 0;"> > {{ $post->category }}</p>
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
                    <img src="{{ $post->thumbnail }}" class="img-fluid" style="border-radius: 15px;" alt="Image">
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

				<a class="link-posts me-3 me-md-5" href="#">
                    <i class="comment alternate outline black icon" style="font-size: 20px;"></i>
                    <!-- <span style="margin-left: 5px; color: black;">5</span> -->
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


<!-- Modal POST -->
<div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="createPostModalLabel">Create New Post</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{ route('uploadPost') }}" enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
						<label for="postThumbnail" class="form-label">Thumbnail</label>
						<input type="file" class="form-control" id="postThumbnail" accept="image/*" name="thumbnail">
						<img id="thumbnailPreview" src="" alt="Thumbnail Preview" class="img-thumbnail mt-2" style="display: none; width: 100px; height: auto;">
					</div>
					<div class="mb-3">
						<label for="postTitle" class="form-label">Title</label>
						<input type="text" class="form-control" id="postTitle" required name="title">
					</div>
					<div class="mb-3">
						<label for="postContent" class="form-label">Content</label>
						<textarea class="form-control" id="postContent" rows="3" required name="content"></textarea>
					</div>
					<div class="mb-3">
						<label for="postCategory" class="form-label">Category</label>
						<select class="form-select" id="postCategory" name="category">
							<option value="Business">Business</option>
							<option value="Finance">Finance</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save Post</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal COMMUNITY -->
<div class="modal fade" id="createCommunityModal" tabindex="-1" aria-labelledby="createCommunityModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="createCommunityModalLabel">Create New Community</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{ route('requestCommunity') }}" enctype="multipart/form-data">
					@csrf
					<div class="mb-3">
						<label for="CommunityThumbnail" class="form-label">Thumbnail</label>
						<input type="file" class="form-control" id="CommunityThumbnail" accept="image/*" name="thumbnail">
						<img id="communityThumbnailPreview" src="" alt="Thumbnail Preview" class="img-thumbnail mt-2" style="display: none; width: 100px; height: auto;">
					</div>
					<div class="mb-3">
						<label for="communityName" class="form-label">Community Name</label>
						<input type="text" class="form-control" id="communityName" placeholder="Enter community name" required name="name">
					</div>
					<div class="mb-3">
						<label for="postCategory" class="form-label">Category</label>
						<select class="form-select" id="postCategory" name="category">
							<option value="Business">Business</option>
							<option value="Finance">Finance</option>
							<option value="Personal Development">Personal Development</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="communityDescription" class="form-label">Description</label>
						<textarea class="form-control" id="communityDescription" rows="3" placeholder="Describe your community" required name="description"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Create Community</button>
				</div>
				</form>
		</div>
	</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }

    const postThumbnailInput = document.getElementById('postThumbnail');
    postThumbnailInput.addEventListener('change', function () {
        previewImage(this, 'thumbnailPreview');
    });

    const communityThumbnailInput = document.getElementById('CommunityThumbnail');
    communityThumbnailInput.addEventListener('change', function () {
        previewImage(this, 'communityThumbnailPreview');
		});
	});

</script>
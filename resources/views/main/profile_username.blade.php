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
                                    <img src="{{ $userNow->avatar }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div style="text-align: center; margin-top: 140px;">
                                    <h2 class="mt-3 mb-2">{{ $userNow->name }}</h2>
                                    <span class="mt-3 mb-2">{{ '@' . $userNow->username }}</span>
                                    <p class="fs-6 mt-2 mb-2">
                                        <span style="color: {{ $userNow->interest == 'Business' ? 'orange' : '#9747FF' }}; margin-right: 8px;">• {{$userNow->interest}}</span>
                                    </p>
                                    <p class="fs-6 mt-2 mb-2">{{ $userNow->bio }}</p>
                                    <div class="user-stats">
                                        <div class="d-flex justify-content-center fs-5" style="margin-top: 40px;">
                                            <div style="padding: 0 20px; border-right: 3px solid black;">
                                                <div class="mb-4">{{ $userNow->followers()->count() }}</div>
                                                <div>Followers</div>
                                            </div>
                                            <div style="padding: 0 20px; border-right: 3px solid black;">
                                                <div class="mb-4">{{ $userNow->following()->count() }}</div>
                                                <div>Following</div>
                                            </div>
                                            <div style="padding: 0 20px;">
                                                <div class="mb-4">{{ $userNow->totalLikes() }}</div>
                                                <div>Likes</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-1" style="border-top: 4px solid #E5E5E5;">
                        @if (Auth::user()->isFollowing($userNow->id))
                            <button type="button" class="btn btn-light w-100 mt-1" onclick="toggleFollow({{ $userNow->id }}, false)" style="border-radius: 30px; background-color: #13005A; color: #FFFFFF;">
                                <i class="fas fa-check" style="font-size: 15px; color: #FFFFFF;"></i>
                                Followed
                            </button>
                        @else
                            <button type="button" class="btn btn-outline-light w-100 mt-1" onclick="toggleFollow({{ $userNow->id }}, true)" style="border-radius: 30px; border-color: #13005A; color: #13005A;">
                                <i class="fas fa-plus" style="font-size: 15px; color: #13005A;"></i>
                                Follow
                            </button>
                        @endif
                    </div>
                    @if ($joinedCommunities->isNotEmpty())
                    <div class="mt-3">
                        <h6 style="color: #13005A;">{{ $userNow->name }} Communities</h6>
                            @foreach ($joinedCommunities as $community)
                                <div class="d-flex align-items-center mt-2">
                                    <div class="rounded-circle overflow-hidden" style="width: 30px; height: 30px; background-color: #f0f0f0;">
                                        <img src="{{ $community->thumbnail }}" alt="Community Image" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <a href="{{ route('community.detail', ['slug' => $community->slug]) }}" class="ms-2 text-decoration-none" style="color: black;">{{ $community->name }}</a>
                                </div>
                            @endforeach
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-7 border-start border-end">
                <div class="posts" style="position: sticky; top: 0; z-index: 1;">
                    <div class="posts">
                        <ul class="nav justify-content-center navbar-bawah">
                            <li class="nav-item">
                                <a class="nav-link text-secondary active" href="#" style="margin-right: 9px; margin-left: 9px;" onclick="showPosts('Posts')">Posts</a>
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
                                    <p class="fs-6" style="color: {{ $mypost->category == 'Business' ? 'orange' : '#9747FF' }}; margin-bottom: 0;"> > {{ $mypost->category }}</p>
                                </div>
                            </div>
                            <div class="row mb-0 ms-5 mb-2">
                                <div class="col">
                                    <h5 class="mb-0">{{ $mypost->title }}</h5>
                                </div>
                            </div>
                            <div class="row mb-0 ms-5">
                                <div class="col">
                                    @if ($mypost->thumbnail)
                                    <img src="{{ $mypost->thumbnail }}" class="img-fluid w-50" style="border-radius: 15px;" alt="Image">								
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
                                    <a class="link-posts me-3 me-md-5" href="{{ route('post.detail', ['slug' => $mypost->slug]) }}">
                                        <i class="comment alternate outline black icon" style="font-size: 20px;"></i>
                                    </a>
                                </div>
                            </div>
                            <hr class="mt-3" style="border-top: 3px solid #E5E5E5;">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function toggleFollow(userId, follow) {
        var url = follow ? '{{ route("follow", ["user" => ":id"]) }}' : '{{ route("unfollow", ["user" => ":id"]) }}';
        url = url.replace(':id', userId);

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            }
        });
    }

    // Fungsi untuk menghapus kelas active dari semua elemen nav-link
    function removeActiveClass() {
        var navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(function(link) {
            link.classList.remove('active');
        });
    }
    
    // Fungsi untuk menambahkan kelas active ke teks yang diklik
    function setActiveLink(link) {
        removeActiveClass(); // Hapus kelas active dari semua elemen nav-link
        link.classList.add('active');
    }
    
    // Ambil semua elemen anchor dengan kelas nav-link
    var navLinks = document.querySelectorAll('.nav-link');
    
    // Tambahkan event listener ke setiap elemen anchor
    navLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            setActiveLink(link); // Ketika teks navigasi diklik, atur teks yang diklik sebagai aktif
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

    function toggleLike(postId) {
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
                document.getElementById('like-' + postId).style.display = 'none';
                document.getElementById('liked-' + postId).style.display = 'inline';
            } else {
                document.getElementById('like-' + postId).style.display = 'inline';
                document.getElementById('liked-' + postId).style.display = 'none';
            }
            document.getElementById('likeCount-' + postId).textContent = data.likeCount;
        });
    }

    function toggleFollow(userId, follow) {
    if (!follow) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, unfollow!'
        }).then((result) => {
            if (result.isConfirmed) {
                proceedToggleFollow(userId, follow);
            }
        });
    } else {
        proceedToggleFollow(userId, follow);
    }
}

function proceedToggleFollow(userId, follow) {
    var url = follow ? '{{ route("follow", ["user" => ":id"]) }}' : '{{ route("unfollow", ["user" => ":id"]) }}';
    url = url.replace(':id', userId);

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.reload();
        }
    });
}

</script>
@endsection

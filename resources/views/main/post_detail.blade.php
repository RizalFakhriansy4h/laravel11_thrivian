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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Gaya CSS tambahan */
        .nav-item:hover .nav-link {
            text-decoration: underline;
        }

        .profile-info {
            display: none;
            position: absolute;
            top: 40px;
            right: 12%;
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

        .comments {
            margin-top: 20px;
        }

        .comment {
            border-bottom: 1px solid #E5E5E5;
            padding-bottom: 15px;
        }

        .comment:last-child {
            border-bottom: none;
        }

        .comment img {
            border-radius: 50%;
        }

        .comment h6 {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .comment p {
            margin: 0;
            text-align: justify;
        }

        .profile-image-container {
        width: 50px;
        height: 50px;
        background-color: #f0f0f0;
        border-radius: 50%;
        overflow: hidden;
        flex-shrink: 0; 
}

    .profile-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%; 
}

    </style>
</head>

<body>
<nav class="navbar navbar-light bg-light fixed-top d-none d-lg-block">
    <div class="container">
        
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{asset('/assets/img/Thrivian Logo_OK.png')}}" alt="Thrivian.org" width="60" height="45" />
        </a>

        <ul class="nav me-auto">
            <li class="nav-item">
                <a class="nav-link text-secondary  {{ $title == 'Home' ? 'active text-decoration-underline' : '' }}" style="color: {{ $title == 'Home' ? "#13005A !important;" : ""}}" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary {{ $title == 'Community' ? 'active text-decoration-underline' : '' }}" style="color: {{ $title == 'Community' ? "#13005A !important;" : ""}}" href="{{ route('community') }}">Community</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary {{ $title == 'Event' ? 'active text-decoration-underline' : '' }}" style="color: {{ $title == 'Event' ? "#13005A !important;" : ""}}" href="{{ route('event') }}">Event</a>
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
                            <img id="userImage" src="{{ $avatar }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover" />
                        </div>
                        <div id="profileInfo" class="profile-info">
                            <p class="username">{{ $name }}</p>
                            <p class="account">{{ '@' . $username }}</p>
                            <a href="{{ route('profile') }}" class="view-profile">View my profile</a>
                            <a href="./events.html" class="my-events">My Events</a>
                            <a href="manage-communities.html" class="manage-communities">Manage your communities</a>
                            <hr class="my-2" style="border-top: 3px solid #e5e5e5" />
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
        <a class="navbar-brand" href="{{ route('home') }}" style="flex-grow: 1">
            <img src="{{asset('/assets/img/thrivan-logo.png')}}" alt="Thrivian.org" width="150" />
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
                    <a class="nav-link" href="{{ route('community') }}">Community</a>
                    <hr class="my-2 custom-hr-mobile" />
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('event') }}">Events</a>
                    <hr class="my-2 custom-hr-mobile" />
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('settings') }}">Settings</a>
                    <hr class="my-2 custom-hr-mobile" />
                </li>
            </ul>
            <div class="navbar-footer">
                <div class="d-flex justify-content-center text-align-center mt-4">
                    <span class="text-muted small fs-9" style="text-align: center; text-decoration: none">
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
            <a class="nav-link text-dark" href="#"><i class="bi bi-bell"></i></a>
        </li>
        <li class="nav-item">
            <a href="./pages/profile.html">
                <div class="rounded-circle overflow-hidden ms-5 mt-1" style="width: 25px; height: 25px; background-color: #f0f0f0;">
                    <img id="userImage" src="{{asset('/assets/img/3582.jpg')}}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </a>
        </li>
    </ul>
  </nav>

    <main class="container-fluid border" style="margin-top: 6%;">
        <div class="row justify-content-center">
            <div class="col-3 border-start border-end ml-3 d-none d-md-block" style="overflow-y: auto;">
                <a href="{{ route('viewpost') }}" type="button" class="btn btn-outline-light w-100 mt-2" style="border-radius: 30px; border-color: #13005A; color: #13005A;">
                    <i class="fas fa-plus-circle" style="font-size: 15px; color: #13005A;"></i>
                    Create New Post
                </a>
                <a href="{{ route('viewcommunity') }}" type="button" class="btn btn-outline-light w-100 mt-2" style="border-radius: 30px; border-color: #13005A; color: #13005A;">
                    <i class="fas fa-plus-circle" style="font-size: 15px; color: #13005A;"></i>
                    Create New Community
                </a>
                @if ($role == 1)
                <a href="{{ route('viewevent') }}" type="button" class="btn btn-outline-light w-100 mt-2" style="border-radius: 30px; border-color: #13005A; color: #13005A;">
                    <i class="fas fa-plus-circle" style="font-size: 15px; color: #13005A;"></i>
                    Create New Event
                </a>
                @endif

                <div class="container mt-3">
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
                        <div class="d-flex align-items-center mt-2">
                            <div class="rounded-circle overflow-hidden" style="width: 30px; height: 30px; background-color: #f0f0f0;">
                                <img src="{{asset('/storage/thumbnail_community/404.jpg')}}" alt="Community Image" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <a href="{{ route('community') }}" class="ms-2 text-decoration-none" style="color: black;">Go find some Community</a>
                        </div>
                    @endif
                </div>

                <hr class="my-3" style="border-top: 3px solid #E5E5E5;">

                <div class="mt-3">
                    <h6 style="color: #13005A;">Upcoming Events</h6>

                    @foreach($allMyEvents as $index => $event)
                        @if($index == 0)
                        <!-- start jika looping pertama -->
                        <div class="border-radius mb-2">
                            <img src="{{ $event->thumbnail }}" class="card-img-top img-fluid" alt="{{ $event->name }}" style="width: 474px; height: 262px; object-fit: cover; object-position: center;">
                            <div class="card-body">
                                <h5 class="card-title fs-6"><a href="{{ route('event.detail', ['slug' => $event->slug]) }}" style="text-decoration: none;">{{ $event->name }}</a> <span class="badge rounded-pill badge-custom" style="background-color: #13005A;">{{ \Carbon\Carbon::parse($event->start_date)->format('F jS') }}</span></h5>
                                <p class="card-text">{{ Str::limit($event->description, 50) }}</p>
                            </div>
                        </div>
                        @else
                        <!-- looping kedua dan seterusnya -->
                        <div class="card-row row align-items-center mb-3">
                            <div class="col-md-2">
                                <img src="{{ $event->thumbnail }}" alt="{{ $event->name }}" class="rounded" style="width: 130px; height: 130px;">
                            </div>
                            <div class="col-md-10 d-flex align-items-start">
                                <div class="card-body" style="margin-left: 77px;">
                                    <span class="badge rounded-pill badge-custom mb-2" style="background-color: #13005A;">{{ \Carbon\Carbon::parse($event->start_date)->format('F jS') }}</span>
                                    <a href="{{ route('event.detail', ['slug' => $event->slug]) }}"><h6 class="card-title text-sm">{{ Str::limit($event->name, 20) }}</h6></a>
                                    <p class="card-text text-sm">
                                        {{ Str::limit($event->description, 25) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>

                <div class="d-flex justify-content-center text-align-center mt-4">
                    <span class="text-muted small fs-9" style="text-align: center; text-decoration: none;">
                        <a href="{{route('privacy')}}" class="text-black">Privacy & Policy</a>
                        <p class="text-muted fs-9">Thrivian.org © 2024</p>
                    </span>
                </div>
            </div>

            <div class="col-md-8 border-end border-start mt-5 mt-md-0 mb-5 mb-md-0">

                <div class="all-posts overflow-auto" style="max-height: 1000px;">

                    <div class="post mt-4 me-5" data-category="Business">
                        <div class="d-flex align-items-center mb-2">
                            <div class="rounded-circle overflow-hidden me-2" style="width: 50px; height: 50px; background-color: #f0f0f0;">
                                <img src="{{ $post->user->avatar }}" alt="Profile Image" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div>
                                <a class="full-post" style="text-decoration: none;">
                                    <h6 class="mb-0 text-dark fw-bold">{{ $post->user->name }} <span class="text-muted"> {{ '@' . $post->user->username }}</span></h6>
                                </a>
                            </div>
                        </div>
                        <div class="row mb-0 ms-5 mb-2">
                            <div class="col">
                                <h5 class="mb-0 text-dark">{{ $post->title }}</h5>
                            </div>
                        </div>
                        <div class="row mb-0 ms-5 mb-2">
                            <div class="col">
                            @if ($post->thumbnail)
                                <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="img-fluid mb-3 w-50">
                            @endif
                            </div>
                        </div>
                        <div class="row mb-0 ms-5">
                            <div class="col">
                                <p class="mb-0 full-content" style="text-align: justify;">{{ $post->content }}</p>
                            </div>
                        </div>

                        <div class="row justify-content-end mt-3 me-2">
                            <div class="col-auto">
                                <a class="link-posts me-3 me-md-5" href="javascript:void(0)" onclick="toggleIcon(event, 'likeIconOutline_6', 'likeIconSolid_6', 'likeCount_6')">
                                    <i id="likeIconOutline_6" class="thumbs up outline black icon" style="font-size: 20px;"></i>
                                    <i id="likeIconSolid_6" class="thumbs up black icon" style="font-size: 20px; display: none;"></i>
                                    <span id="likeCount_6" style="margin-left: 5px; color: black;">5</span>
                                </a>
                                
                                <a class="link-posts me-3 me-md-5" href="#">
                                    <i class="bookmark outline black icon" style="font-size: 20px;"></i>
                                </a>

                                <a class="link-posts me-1" href="#" data-bs-toggle="modal" data-bs-target="#collaborateModal">
                                    <i class="fas fa-handshake" style="font-size: 20px; color: black;"></i>
                                    <span style="margin-left: 5px; color: black;"></span>
                                </a>

                            <!-- Modal -->
                            <div class="modal fade" id="collaborateModal" tabindex="-1" aria-labelledby="collaborateModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="collaborateModalLabel">Ask to Collaborate</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="mb-3">
                                                    <label for="collaborateMessage" class="form-label">Add an invitation note about what you want to collaborate!</label>
                                                    <textarea class="form-control" id="collaborateMessage" rows="3" maxlength="80"></textarea>
                                                    <div class="form-text">0/80</div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-secondary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <hr class="mt-3" style="border-top: 3px solid #E5E5E5;">

                        <div class="comments mt-3">
                            <div class="row mb-0 ms-0 mt-3">
                                <div class="col">
                                    
                                    <form action="{{ route('comments.store') }}" method="post">
                                        @csrf
                                        <div class="row mb-3 mt-3">
                                            <div class="col">
                                                <div class="input-group">
                                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                    <input type="text" class="form-control" placeholder="Write your comment" aria-label="Write your comment" style="border-radius: 25px; margin-left: 7%;" name="content">
                                                    <button class="btn btn-primary" type="submit" style="border-radius: 50px; margin-left: 3%;">Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    @if ($post->comments)
                                        @foreach($post->comments as $comment)
                                        <div class="d-flex align-items-center mb-2 mt-4">
                                            <div class="profile-image-container me-2">
                                                <img src="{{ $comment->user->avatar }}" alt="Profile Image" class="profile-image">
                                            </div>
                                            <div>
                                                <div class="full-post" style="text-decoration: none;">
                                                    <h6 class="mb-0 text-dark fw-bold">{{ $comment->user->name }} <span class="text-muted"><a href="{{ route('profile.people', ['username' => $comment->user->username]) }}">{{ '@' . $comment->user->username }}</a></span></h6>
                                                    <p class="mt-1" style="text-align: justify;">{{ $comment->content }}</p>                       
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>

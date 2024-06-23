@extends('layouts.template_main')
@section('title', 'Event')
@section('content')
<style>
	/* Gaya CSS tambahan */
	.nav-item:hover .nav-link {
	text-decoration: underline;
	}
	.profile-info {
	display: none;
	position: absolute;
	top: 40px;
	right: 0;
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
	color: #13005a !important;
	}
	#selectedCategories .btn {
	border-radius: 15px;
	}
	.grow-card {
	transition: transform 0.3s ease;
	}
	.grow-card:hover {
	transform: scale(1.05);
	}
	.card-img-top {
	height: 170px;
	object-fit: cover;
	border-top-left-radius: 15px;
	border-top-right-radius: 15px;
	}
	.card-date {
	position: absolute;
	top: -90px;
	right: 10px;
	color: #015AAA;
	background-color: white;
	padding: 2px 10px;
	border-radius: 5px;
	text-align: center;
	}
	.card-date h5 {
	margin: 0;
	font-size: 24px;
	}
	.card-date p {
	margin: 0;
	font-size: 14px;
	}
	.card-body {
	position: relative;
	}
	.location-badge {
	width: 100%;
	position: absolute;
	top: -29px;
	left: 0;
	background-color: #015AAA;
	color: white;
	padding: 5px 10px;
	}
	.price-badge {
	background-color: #015AAA;
	color: white;
	padding: 5px 10px;
	width: 50%;
	border-radius: 0px 40px 40px 0px;
	display: inline-block;
	}
	@media (max-width: 987px) {
	#eventCards .card {
	width: calc(50% - 60px); /* Menghitung lebar card agar mempertahankan bentuknya */
	margin-right: 0px;
	margin-left: 0px;
	}
	#eventCards .card:first-child {
	margin-left: 0;
	}
	#eventCards .card:last-child {
	margin-right: 0;
	}
	}
	#selectedCategories .badge.bg-secondary {
	font-size: 0.8rem; /* Menambah ukuran font */
	padding: 5px 10px; /* Menambah padding */
	border-radius: 15px; /* Menyamakan border radius dengan tombol filter */
	background-color: #13005a; /* Menyamakan background color dengan tombol filter */
	color: white; /* Menyamakan warna teks dengan tombol filter */
	margin: 2px; /* Menambahkan margin antar tombol */
	}
	#footer {
	background-color: #015AAA;
	color: white;
	padding: 2rem 0;
	}
	#footer .footer-col {
	margin-bottom: 1rem;
	}
	#footer .footer-col h6 {
	font-weight: bold;
	color: white;
	}
	#footer .footer-col ul {
	list-style: none;
	padding: 0;
	}
	#footer .footer-col ul li {
	margin-bottom: 0.5rem;
	}
	#footer .footer-col ul li a {
	color: white;
	text-decoration: none;
	}
	#footer .footer-col ul li a:hover {
	text-decoration: underline;
	}
	#footer .social-icons i {
	font-size: 1.5rem;
	margin-right: 0.5rem;
	color: white;
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
	max-width: 150px;
	height: auto;
	}
	@media (max-width: 768px) {
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
	max-width: 100px;
	max-height: 120px;
	}
	}
</style>
<link rel="stylesheet" href="{{asset('/assets/css/events.css')}}">
<main class="container-fluid" style="margin-top: 69px">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<form class="d-flex mt-3 mb-3">
					<div class="input-group w-50 w-md-25">
						<span
							class="input-group-text"
							style="
							border-top-left-radius: 15px;
							border-bottom-left-radius: 15px;
							background-color: transparent;
							border-right: none;
							"
							>
						<i class="fas fa-search"></i>
						</span>
						<input
							class="form-control"
							type="search"
							placeholder="Search Events..."
							aria-label="Search"
							style="
							border-top-right-radius: 15px;
							border-bottom-right-radius: 15px;
							border-left: none;
							"
							/>
					</div>
					<button
						class="btn btn-outline-secondary btn-sm ms-2"
						type="button"
						style="border-radius: 10px"
						>
					<i class="fas fa-map-marker-alt"></i>
					</button>
				</form>
				<div class="btn-group">
					<button
						type="button"
						class="btn btn-secondary btn-sm dropdown-toggle"
						data-bs-toggle="dropdown"
						aria-expanded="false"
						style="border-radius: 15px; background-color: #015AAA"
						>
					<i class="fas fa-bars custom-bars-icon"></i> Filter
					</button>
					<ul class="dropdown-menu">
						<li>
							<a
								class="dropdown-item"
								href="#"
								onclick="addCategory('finance')"
								>Finance</a
								>
						</li>
						<li>
							<a
								class="dropdown-item"
								href="#"
								onclick="addCategory('business')"
								>Business</a
								>
						</li>
						<li>
							<a
								class="dropdown-item"
								href="#"
								onclick="addCategory('self-development')"
								>Self Development</a
								>
						</li>
					</ul>
					<div id="selectedCategories" class="ms-2 btn-sm"></div>
				</div>
				<div class="col-auto text-end mb-2">
					<div class="dropdown">
						<span
							id="sortByLatest"
							class="dropdown-toggle"
							role="button"
							id="dropdownMenuLink"
							data-bs-toggle="dropdown"
							aria-expanded="false"
							style="color: #015AAA"
							>
						Sort by: Latest
						</span>
						<ul
							class="dropdown-menu dropdown-menu-end"
							aria-labelledby="dropdownMenuLink"
							>
							<li>
								<a
									class="dropdown-item"
									href="#"
									onclick="selectSort('Latest')"
									>Latest</a
									>
							</li>
							<li>
								<a
									class="dropdown-item"
									href="#"
									onclick="selectSort('Oldest')"
									>Oldest</a
									>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div id="eventCards" class="row">
				@foreach ($eventFinances as $event)
				<div class="col-md-3 col-sm-6 mt-3 mb-3  finance">
					<a href="{{ route('event.detail', ['slug' => $event->slug]) }}">
						<div class="card shadow grow-card" style="width: 100%; border-radius: 15px;">
							<img src="{{$event->thumbnail}}" class="card-img-top" alt="{{ $event->name }}">
							<div class="card-body">
								<div class="location-badge">
									<i class="bi bi-geo-alt"></i>{{ $event->location }}
								</div>
								<div class="card-date">
									<h5>{{ \Carbon\Carbon::parse($event->start_date)->format('j') }}</h5>
									<p>{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</p>
								</div>
								<h5 class="card-title py-2" style="margin-top: -3%;">{{ $event->name }}</h5>
								<p class="price-badge d-flex justify-content-center">{{ 'Rp. ' . number_format($event->price, 0, ',', '.') }}</p>
								<p class="card-text text-secondary">{{ Str::limit($event->description, 20) }}</p>
							</div>
						</div>
					</a>
				</div>
				@endforeach
				@foreach ($eventBusiness as $event)
				<div class="col-md-3 col-sm-6 mt-3 mb-3  business">
					<a href="{{ route('event.detail', ['slug' => $event->slug]) }}">
						<div class="card shadow grow-card" style="width: 100%; border-radius: 15px;">
							<img src="{{$event->thumbnail}}" class="card-img-top" alt="{{ $event->name }}">
							<div class="card-body">
								<div class="location-badge">
									<i class="bi bi-geo-alt"></i>{{ $event->location }}
								</div>
								<div class="card-date">
									<h5>{{ \Carbon\Carbon::parse($event->start_date)->format('j') }}</h5>
									<p>{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</p>
								</div>
								<h5 class="card-title py-2" style="margin-top: -3%;">{{ $event->name }}</h5>
								<p class="price-badge d-flex justify-content-center">{{ 'Rp. ' . number_format($event->price, 0, ',', '.') }}</p>
								<p class="card-text text-secondary">{{ Str::limit($event->description, 20) }}</p>
							</div>
						</div>
					</a>
				</div>
				@endforeach
				@foreach ($eventPersonals as $event)
				<div class="col-md-3 col-sm-6 mt-3 mb-3  self-development">
					<a href="{{ route('event.detail', ['slug' => $event->slug]) }}">
						<div class="card shadow grow-card" style="width: 100%; border-radius: 15px;">
							<img src="{{$event->thumbnail}}" class="card-img-top" alt="{{ $event->name }}">
							<div class="card-body">
								<div class="location-badge">
									<i class="bi bi-geo-alt"></i>{{ $event->location }}
								</div>
								<div class="card-date">
									<h5>{{ \Carbon\Carbon::parse($event->start_date)->format('j') }}</h5>
									<p>{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</p>
								</div>
								<h5 class="card-title py-2" style="margin-top: -3%;">{{ $event->name }}</h5>
								<p class="price-badge d-flex justify-content-center">{{ 'Rp. ' . number_format($event->price, 0, ',', '.') }}</p>
								<p class="card-text text-secondary">{{ Str::limit($event->description, 20) }}</p>
							</div>
						</div>
					</a>
				</div>
				@endforeach
			</div>
		</div>
		<nav aria-label="Page navigation example">
			<ul
				class="pagination justify-content-center"
				style="padding-bottom: 20%"
				>
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</main>
<script>
	// Array untuk menyimpan kategori yang dipilih
	let selectedCategories = [];
	
	// Fungsi untuk menambah kategori
	function addCategory(category) {
	  if (!selectedCategories.includes(category)) {
	    selectedCategories.push(category);
	    updateSelectedCategories();
	    filterCards();
	  }
	}
	
	// Fungsi untuk menghapus kategori
	function removeCategory(category) {
	  selectedCategories = selectedCategories.filter(
	    (cat) => cat !== category
	  );
	  updateSelectedCategories();
	  filterCards();
	}
	
	// Fungsi untuk memperbarui tampilan kategori yang dipilih
	function updateSelectedCategories() {
	  const selectedCategoriesContainer =
	    document.getElementById("selectedCategories");
	  selectedCategoriesContainer.innerHTML = "";
	  selectedCategories.forEach((category) => {
	    const categoryBadge = document.createElement("span");
	    categoryBadge.className = "badge bg-secondary me-2";
	    categoryBadge.style.cursor = "pointer";
	    categoryBadge.innerHTML = `${category} <i class="fas fa-times"></i>`;
	    categoryBadge.onclick = () => removeCategory(category);
	    selectedCategoriesContainer.appendChild(categoryBadge);
	  });
	}
	
	// Fungsi untuk menyaring kartu berdasarkan kategori yang dipilih
	function filterCards() {
	  const cards = document.querySelectorAll("#eventCards .col-md-3");
	  cards.forEach((card) => {
	    const cardCategories = Array.from(card.classList);
	    const hasCategory = selectedCategories.some((category) =>
	      cardCategories.includes(category)
	    );
	    if (hasCategory || selectedCategories.length === 0) {
	      card.style.display = "block";
	    } else {
	      card.style.display = "none";
	    }
	  });
	}
	
	// Inisialisasi filter pada saat halaman dimuat
	document.addEventListener("DOMContentLoaded", () => {
	  filterCards();
	});
</script>
@endsection
@extends('layouts.template_main')
@section('title', 'Event')
@section('content')
<style>
	
	#selectedCategories .btn {
	border-radius: 15px;
	}
	.custom-card {
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	height: 100%;
	border-radius: 8px;
	width: 18rem;
	}
	.card-img-container {
	position: relative;
	height: 100%;
	overflow: hidden;
	border-top-left-radius: 8px;
	border-top-right-radius: 8px;
	}
	.custom-card img {
	object-fit: cover;
	width: 100%;
	height: 100%;
	}
	.card-body {
	flex-grow: 1;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
	}
	.card-text {
	flex-grow: 1;
	}
	.col-md-3 {
	transition: transform 0.3s, border 0.3s;
	}
	.col-md-3:hover {
	transform: scale(1.04);
	}
	.badge-custom {
	position: absolute;
	top: 10px;
	right: 10px;
	z-index: 1;
	background-color: #13005a;
	}
	.badge-secondary {
	background-color: #13005a;
	}
	.event-card {
	position: relative;
	border-radius: 10px;
	overflow: hidden;
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	margin-top: 5px;
	transition: transform 0.3s ease-in-out;
	}
	.event-card:hover {
	transform: scale(1.07);
	}
	.event-image {
	width: 100%;
	height: auto;
	}
	.event-date {
	position: absolute;
	bottom: 115px;
	right: 20px;
	background-color: white;
	color: #13005a;
	border-radius: 9px;
	padding: 3px;
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	}
	.event-date-content {
	text-align: center;
	}
	.event-date-day {
	font-size: 1.4em;
	font-weight: bold;
	display: block;
	}
	.event-date-month {
	font-size: 0.9em;
	display: block;
	}
	.event-info {
	padding: 10px;
	background-color: white;
	}
	.event-location {
	font-size: 0.9em;
	color: #13005a;
	margin-bottom: 5px;
	}
	.event-title {
	font-size: 1.2em;
	font-weight: bold;
	margin: 0;
	}
	.event-community {
	font-size: 0.9em;
	color: #999;
	}
	@media (max-width: 767px) {
	.col-sm-6 {
	flex: 0 0 25%;
	max-width: 50%;
	padding: 5px;
	}
	.event-card {
	margin-top: 5px;
	}
	.event-image {
	width: 100%;
	height: 70%;
	}
	.event-date {
	position: absolute;
	bottom: 185px;
	right: 10px;
	border-radius: 4px;
	padding: 0.5px;
	}
	.event-date-content {
	text-align: center;
	}
	.event-date-day {
	font-size: 0.8em;
	font-weight: bold;
	display: block;
	}
	.event-date-month {
	font-size: 0.5em;
	display: block;
	}
	.event-info {
	padding: 10px;
	background-color: white;
	}
	.event-location {
	font-size: 0.5em;
	color: #13005a;
	margin-bottom: 5px;
	}
	.event-title {
	font-size: 1em;
	font-weight: bold;
	margin: 0;
	}
	.event-price {
	color: white;
	font-size: 0.5em;
	}
	.event-community {
	font-size: 0.5em;
	color: #999;
	}
	.pagination {
	padding-bottom: 25%;
	}
	}
	#selectedCategories .badge.bg-secondary {
	font-size: 0.8rem;
	padding: 5px 10px;
	border-radius: 15px;
	background-color: #13005a;
	color: white;
	margin: 2px;
	}
</style>
<link rel="stylesheet" href="/assets/css/events.css">

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
						style="border-radius: 15px; background-color: #13005a"
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
							style="color: #13005a"
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
				<div class="col-md-3 col-sm-6 mt-3 mb-3 kategori-1 finance">
					<a href="{{ route('event.detail', ['slug' => $event->slug]) }}" class="card-link text-dark">
						<div class="event-card">
							<div class="card-img-container">
								<img src="{{$event->thumbnail}}" alt="{{ $event->name }}" class="event-image"/>
							</div>
							<div class="event-date">
								<div class="event-date-content">
									<span class="event-date-day">{{ \Carbon\Carbon::parse($event->start_date)->format('j') }}</span>
									<span class="event-date-month">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</span>
								</div>
							</div>
							<div class="event-info">
								<p class="event-location"><i class="bi bi-geo-alt"></i>{{ $event->location }}</p>
								<h5 class="event-title">{{ $event->name }}</h5>
								<p class="event-price">{{ 'Rp. ' . number_format($event->price, 0, ',', '.') }}</p>
								<p class="event-community">{{ Str::limit($event->description, 50) }}</p>
							</div>
						</div>
					</a>
				</div>				
				@endforeach
				
				@foreach ($eventBusiness as $event)
				<div class="col-md-3 col-sm-6 mt-3 mb-3 kategori-1 business">
					<a href="{{ route('event.detail', ['slug' => $event->slug]) }}" class="card-link text-dark">
						<div class="event-card">
							<div class="card-img-container">
								<img src="{{$event->thumbnail}}" alt="{{ $event->name }}" class="event-image"/>
							</div>
							<div class="event-date">
								<div class="event-date-content">
									<span class="event-date-day">{{ \Carbon\Carbon::parse($event->start_date)->format('j') }}</span>
									<span class="event-date-month">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</span>
								</div>
							</div>
							<div class="event-info">
								<p class="event-location"><i class="bi bi-geo-alt"></i>{{ $event->location }}</p>
								<h5 class="event-title">{{ $event->name }}</h5>
								<p class="event-price">{{ 'Rp. ' . number_format($event->price, 0, ',', '.') }}</p>
								<p class="event-community">{{ Str::limit($event->description, 20) }}</p>
							</div>
						</div>
					</a>
				</div>				
				@endforeach
				
				@foreach ($eventPersonals as $event)
				<div class="col-md-3 col-sm-6 mt-3 mb-3 kategori-1 self-development">
					<a href="{{ route('event.detail', ['slug' => $event->slug]) }}" class="card-link text-dark">
						<div class="event-card">
							<div class="card-img-container">
								<img src="{{$event->thumbnail}}" alt="{{ $event->name }}" class="event-image"/>
							</div>
							<div class="event-date">
								<div class="event-date-content">
									<span class="event-date-day">{{ \Carbon\Carbon::parse($event->start_date)->format('j') }}</span>
									<span class="event-date-month">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</span>
								</div>
							</div>
							<div class="event-info">
								<p class="event-location"><i class="bi bi-geo-alt"></i>{{ $event->location }}</p>
								<h5 class="event-title">{{ $event->name }}</h5>
								<p class="event-price">{{ 'Rp. ' . number_format($event->price, 0, ',', '.') }}</p>
								<p class="event-community">{{ Str::limit($event->description, 50) }}</p>
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
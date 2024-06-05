<style>
    .card-img-container {
    width: 310px;
    height: 186px;
    overflow: hidden;
    position: relative;
    border-radius: 15px; /* Optional: to match the card's border radius */
}

.card-img-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center; /* Ensures the image is positioned from the top */
}

.badge-custom {
    position: absolute;
    top: 10px; /* Adjust as needed */
    right: 10px; /* Adjust as needed */
    z-index: 1; /* Ensure badge appears above the image */
    background-color: #13005A;
}

.badge-secondary {
    background-color: #13005A;
}

.card.custom-card {
    border-radius: 15px; /* Optional: to round the corners of the card */
    overflow: hidden; /* Ensure no content spills out */
}

</style>
@extends('layouts.template_main')
@section('advanced_css')
<link rel="stylesheet" href="/assets/css/event.css">
@endsection
@section('title', 'Event')
@section('content')
<main class="container-fluid" style="margin-top: 69px;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<form class="d-flex mt-3 mb-3">
					<div class="input-group w-50 w-md-25">
						<span class="input-group-text" style="border-top-left-radius: 15px; border-bottom-left-radius: 15px; background-color: transparent; border-right: none;">
						<i class="fas fa-search"></i>
						</span>
						<input class="form-control" type="search" placeholder="Search Events..." aria-label="Search" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px; border-left: none;">
					</div>
					<button class="btn btn-outline-secondary btn-sm ms-2" type="button" style="border-radius: 10px;">
					<i class="fas fa-map-marker-alt"></i>
					</button>
				</form>
				<div class="btn-group">
					<button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 15px; background-color: #13005A;">
					<i class="fas fa-bars custom-bars-icon"></i> Filter
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#" onclick="addCategory('finance')">Finance</a></li>
						<li><a class="dropdown-item" href="#" onclick="addCategory('business')">Business</a></li>
						<li><a class="dropdown-item" href="#" onclick="addCategory('personal-development')">Personal Development</a></li>
						<!-- Tambahkan lebih banyak kategori sesuai kebutuhan -->
					</ul>
					<div id="selectedCategories" class="ms-2 btn-sm"></div>
				</div>
				<div class="col-auto text-end mb-2">
					<div class="dropdown">
						<span id="sortByLatest" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="color: #13005A;">
						Sort by: Latest
						</span>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
							<li><a class="dropdown-item" href="#" onclick="selectSort('Latest')">Latest</a></li>
							<li><a class="dropdown-item" href="#" onclick="selectSort('Oldest')">Oldest</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div id="eventCards" class="row">
                @foreach ($eventFinances as $event)
                <div class="col-md-3 col-sm-6 mt-3 mb-3 finance">
                    <a href="{{ route('event.detail', ['slug' => $event->slug]) }}" class="card-link text-dark">
                        <div class="card custom-card">
                            <div class="card-img-container">
                                <img src="{{ $event->thumbnail }}" class="card-img-top" alt="Finance Meet-Up">
                                <span class="badge rounded-pill badge-custom">{{ \Carbon\Carbon::parse($event->start_date)->format('F jS') }}</span>
                            </div>
                            <div class="card-body mt-1">
                                <h5 class="card-title">{{ $event->name }}</h5>
                                <p class="card-text text-justify">{{ Str::limit($event->description, 75) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge rounded-pill badge-secondary">{{ 'Rp. ' . number_format($event->price, 0, ',', '.') }}</span>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-map-marker-alt location-icon"></i>
                                        <span class="ms-1 location-text">{{ $event->location }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                @foreach ($eventBusiness as $event)
				<div class="col-md-3 col-sm-6 mt-3 mb-3 business">
					<a href="{{ route('event.detail', ['slug' => $event->slug]) }}" class="card-link text-dark">
						<div class="card custom-card">
							<div class="card-img-container">
								<img src="{{ $event->thumbnail }}" class="card-img-top" alt="Business Meetup">
								<span class="badge rounded-pill badge-custom">{{ \Carbon\Carbon::parse($event->start_date)->format('F jS') }}</span>
							</div>
							<div class="card-body mt-1">
								<h5 class="card-title">{{ $event->name }}</h5>
								<p class="card-text text-justify">{{ Str::limit($event->description, 75) }}</p>
								<div class="d-flex justify-content-between align-items-center">
									<span class="badge rounded-pill badge-secondary">{{ 'Rp. ' . number_format($event->price, 0, ',', '.') }}</span>
									<div class="d-flex align-items-center">
										<i class="fas fa-map-marker-alt location-icon"></i>
										<span class="ms-1 location-text">{{ $event->location }}</span>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
                @endforeach
                @foreach ($eventPersonals as $event)
				<div class="col-md-3 col-sm-6 mt-3 mb-3 kategori-1 personal-development">
					<a href="{{ route('event.detail', ['slug' => $event->slug]) }}" class="card-link text-dark">
						<div class="card custom-card">
							<div class="card-img-container">
								<img src="{{ $event->thumbnail }}" class="card-img-top" alt="personal-development">
								<span class="badge rounded-pill badge-custom">{{ \Carbon\Carbon::parse($event->start_date)->format('F jS') }}</span>
							</div>
							<div class="card-body mt-1">
								<h5 class="card-title">{{ $event->name }}</h5>
								<p class="card-text text-justify">{{ Str::limit($event->description, 75) }}</p>
								<div class="d-flex justify-content-between align-items-center">
									<span class="badge rounded-pill badge-secondary">{{ 'Rp. ' . number_format($event->price, 0, ',', '.') }}</span>
									<div class="d-flex align-items-center">
										<i class="fas fa-map-marker-alt location-icon"></i>
										<span class="ms-1 location-text">{{ $event->location }}</span>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
                @endforeach
			</div>
		</div>
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
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
	  selectedCategories = selectedCategories.filter(cat => cat !== category);
	  updateSelectedCategories();
	  filterCards();
	}
	
	// Fungsi untuk memperbarui tampilan kategori yang dipilih
	function updateSelectedCategories() {
	  const selectedCategoriesContainer = document.getElementById('selectedCategories');
	  selectedCategoriesContainer.innerHTML = '';
	  selectedCategories.forEach(category => {
	    const categoryBadge = document.createElement('span');
	    categoryBadge.className = 'badge bg-secondary me-2';
	    categoryBadge.style.cursor = 'pointer';
	    categoryBadge.innerHTML = `${category} <i class="fas fa-times"></i>`;
	    categoryBadge.onclick = () => removeCategory(category);
	    selectedCategoriesContainer.appendChild(categoryBadge);
	  });
	}
	
	// Fungsi untuk menyaring kartu berdasarkan kategori yang dipilih
	function filterCards() {
	  const cards = document.querySelectorAll('#eventCards .col-md-3');
	  cards.forEach(card => {
	    const cardCategories = Array.from(card.classList);
	    const hasCategory = selectedCategories.some(category => cardCategories.includes(category));
	    if (hasCategory || selectedCategories.length === 0) {
	      card.style.display = 'block';
	    } else {
	      card.style.display = 'none';
	    }
	  });
	}
	
	// Inisialisasi filter pada saat halaman dimuat
	document.addEventListener('DOMContentLoaded', () => {
	  filterCards();
	});
</script>
@endsection
<style>
	.post-container {
	max-width: 800px;
	margin: 50px auto;
	padding: 20px;
	border-radius: 8px;
	background-color: #fff;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}
	.post-footer {
	display: flex;
	justify-content: flex-end;
	}
	.btn-primary {
	background-color: #4b0082;
	border-color: #4b0082;
	border-radius: 20px;
	}
	.file-input {
	display: none;
	}
	.preview-container {
	display: flex;
	flex-wrap: wrap;
	margin-top: 10px; /* Mengatur jarak atas antara gambar/video */
	}
	/* Styles untuk desktop */
	.input-wrapper {
	position: relative;
	width: 100%;
	}
	.title-input {
	width: 100%;
	box-sizing: border-box;
	border: 1px solid #ced4da;
	border-bottom: none;
	border-radius: 4px 4px 0 0; /* Rounded corners on top */
	padding: 10px;
	margin: 0; /* Remove any default margin */
	}
	.separator {
	width: calc(100% - 40px); /* Adjust width to match padding */
	margin: 0 auto; /* Center the separator */
	border: none; /* Remove default border */
	border-top: 1px solid #ced4da; /* Custom border */
	}
	textarea.form-control {
	padding-top: 10px; /* Adjust padding as needed */
	border: 1px solid #ced4da;
	border-radius: 0 0 4px 4px; /* Rounded corners on bottom */
	border-top: none; /* Remove top border to blend with separator */
	box-sizing: border-box;
	width: 100%;
	}
	/* Styles untuk preview items */
	.preview-item {
	max-width: 200px;
	max-height: 200px;
	object-fit: cover; /* Mengatur agar gambar/video tidak terlalu terdistorsi */
	margin-right: 10px; /* Mengatur jarak kanan antara gambar/video */
	margin-bottom: 10px; /* Mengatur jarak bawah antara gambar/video */
	border-radius: 8px; /* Mengatur sudut bulatan untuk gambar/video */
	}
	.file-preview {
	display: grid;
	grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
	gap: 10px;
	}
	.file-preview img, .file-preview video {
	width: 100%;
	height: auto;
	border-radius: 8px;
	border: 1px solid #ccc;
	}
	.custom-input:not(:placeholder-shown) {
	font-weight: bold;
	}
	.delete-icon {
	position: absolute;
	right: 5px;
	top: 5px;
	cursor: pointer;
	color: red;
	background-color: white;
	border-radius: 50%;
	padding: 2px;
	}
	@media (max-width: 768px) {
	.img-profile {
	display: none; /* Hide profile image on tablets and mobiles */
	}
	.title-input, textarea.form-control {
	padding: 8px; /* Adjust padding for smaller screens */
	font-size: 14px; /* Adjust font size for smaller screens */
	}
	.separator {
	width: calc(100% - 20px); /* Adjust width to match reduced padding */
	}
	.post-container {
	padding: 15px; /* Reduce padding for smaller screens */
	}
	.btn-primary {
	padding: 8px 16px; /* Adjust button padding for smaller screens */
	}
	.form-select {
	width: 100%; /* Make select input full width on smaller screens */
	margin-top: 10px; /* Add margin top for better spacing */
	}
	}
	.preview-container {
	display: flex;
	flex-wrap: wrap;
	margin-top: 10px;
	position: relative; /* Menambahkan posisi relatif */
	}
	.preview-item-wrapper {
	position: relative;
	margin-right: 10px;
	margin-bottom: 10px;
	}
	.delete-icon {
	position: absolute;
	top: 5px;
	right: 5px;
	cursor: pointer;
	color: red;
	background-color: white;
	border-radius: 50%;
	padding: 2px;
	z-index: 1;
	}
	@media (max-width: 480px) {
	.title-input, textarea.form-control {
	font-size: 12px; /* Further adjust font size for smaller mobile screens */
	}
	.post-container {
	margin: 20px auto; /* Reduce margin for very small screens */
	}
	.btn-primary {
	font-size: 14px; /* Adjust button font size for smaller screens */
	}
	.d-flex.justify-content-between.mb-2 h2 {
	font-size: 18px; /* Adjust heading size for smaller screens */
	}
	.nav-link {
	font-size: 14px; /* Adjust navbar link font size for smaller screens */
	}
	/* Additional styles for smaller heading and select input */
	.d-flex.justify-content-between.mb-2 h2 {
	font-size: 1.25rem; /* Adjust heading size for medium screens */
	}
	.d-flex.justify-content-between.mb-2 .form-select {
	width: 120px; /* Adjust width for medium screens */
	height: 28px; /* Adjust height for medium screens */
	font-size: 0.875rem; /* Adjust font size for medium screens */
	}
	@media (max-width: 480px) {
	.d-flex.justify-content-between.mb-2 h2 {
	font-size: 1rem; /* Further adjust heading size for small screens */
	}
	.d-flex.justify-content-between.mb-2 .form-select {
	width: 100px; /* Adjust width for small screens */
	height: 26px; /* Adjust height for small screens */
	font-size: 0.75rem; /* Adjust font size for small screens */
	}
	}
	}
</style>
@extends('layouts.template_main')
@section('title', 'Add Post')
@section('content')
<!-- Create Post Form -->
<div class="container mt-5 pt-5">
	<div class="post-container">
    <form method="post" action="{{ route('community.post.store', ['slug' => $community->slug]) }}" enctype="multipart/form-data">
		@csrf
		<!-- <div class="d-flex justify-content-between mb-2">
			<h2 class="fw-bold">Create a post in {{ $community->name }}</h2>
			<select class="form-select" id="postCategory" name="category" aria-label="Select Category" style="width: 160px; height: 30px">
				<option value="Business" {{ old('category') == 'Business' ? 'selected' : '' }}>Business</option>
				<option value="Finance" {{ old('category') == 'Finance' ? 'selected' : '' }}>Finance</option>
				<option value="Personal Development" {{ old('category') == 'Personal Development' ? 'selected' : '' }}>Personal Development</option>
			</select>
		</div> -->
		<hr class="mt-1" style="border-top: 3px solid #e5e5e5" />
		<input class="form-control mb-3 title-input" type="text" id="postTitle" required name="title" value="{{ old('title') }}" placeholder="Write your title here...">
		<hr class="separator">
		<textarea class="form-control" id="postContent" rows="5" required name="content" placeholder="Write your paragraph here...">{{ old('content') }}</textarea>
		<div class="preview-container">
			<img id="thumbnailPreview" src="" alt="Thumbnail Preview" class="img-thumbnail mt-2" style="display: none; width: 200px; height: auto;">
		</div>
		<input type="file" id="image-input" accept="image/*" name="thumbnail" style="display: none;" onchange="previewImage(event)">
		<button type="button" class="btn btn-light" onclick="document.getElementById('image-input').click();">
			<i class="fas fa-image"></i> Upload Image
		</button>
		<div class="post-footer mt-3">
			<button type="submit" class="btn btn-primary">Post</button>
		</div>
	</form>

	<script>
		function previewImage(event) {
			var reader = new FileReader();
			reader.onload = function(){
				var output = document.getElementById('thumbnailPreview');
				output.src = reader.result;
				output.style.display = 'block';
			};
			reader.readAsDataURL(event.target.files[0]);
		}
	</script>

	</div>
</div>
<!-- <script>
	function handleFileUpload(event, type) {
		const file = event.target.files[0];
		const previewContainer = document.querySelector('.preview-container');
		previewContainer.innerHTML = ''; // Clear previous previews

		if (file) {
			const reader = new FileReader();

			reader.onload = function(e) {
				const previewItemWrapper = document.createElement('div');
				previewItemWrapper.classList.add('preview-item-wrapper');

				const deleteIcon = document.createElement('span');
				deleteIcon.classList.add('delete-icon');
				deleteIcon.innerHTML = '&times;';
				deleteIcon.onclick = function() {
					previewItemWrapper.remove();
				};

				const previewItem = document.createElement(type === 'image' ? 'img' : 'video');
				previewItem.classList.add('preview-item');
				previewItem.src = e.target.result;

				previewItemWrapper.appendChild(previewItem);
				previewItemWrapper.appendChild(deleteIcon);
				previewContainer.appendChild(previewItemWrapper);
			}

			reader.readAsDataURL(file);
		}
	}
</script> -->

@endsection
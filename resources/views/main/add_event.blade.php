@extends('layouts.template_main')
@section('title', 'Add Event')
@section('content')
<style>
    .form-section {
        background-color: #fffffe;
        padding: 20px;
        border-radius: 15px;
    }
    .side-section {
        background-color: #fffffe;
        padding: 20px;
        border-radius: 15px;
    }
    .form-control, .btn, .form-label {
        border-radius: 10px;
    }
    .btn-primary {
        background-color: #21024a;
        border: none;
    }
    .btn-light {
        background-color: #f9f9f9;
    }
    .img-profile {
        width: 40px;
        height: 40px;
    }
    .border-round {
        border-radius: 10px;
    }
    .file-upload {
        border: 2px dashed #ccc;
        padding: 30px;
        border-radius: 10px;
    }
    .fa-upload {
        color: #888;
    }
    .position-relative {
        position: relative;
    }
    .position-absolute {
        position: absolute;
    }
    .pl-5 {
        padding-left: 2.5rem;
    }
    #event-title {
        padding-left: 2.5rem; /* Adjust based on icon size */
    }
    #event-title::placeholder,
    #event-date::placeholder,
    #ends-after::placeholder,
    #start-time::placeholder,
    #end-time::placeholder,
    #location::placeholder,
    #about-event::placeholder {
        color: #13005a; /* Inner color of the icon */
    }
    #icon-star {
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        transition: opacity 0.3s;
        font-size: 1rem; /* Adjust the size of the icon */
        color: #fff; /* Inner color of the icon */
        -webkit-text-stroke: 1px #13005a; /* Border color and thickness */
    }
    #event-date {
        padding-left: 2rem; /* Adjust based on icon size */
    }
    #ends-after {
        padding-left: 2rem; /* Adjust based on icon size */
    }
    #icon-calendar-1,
    #icon-calendar-2 {
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        transition: opacity 0.3s;
        font-size: 1rem; /* Adjust the size of the icon */
        color: #fff; /* Inner color of the icon */
        -webkit-text-stroke: 1px #13005a; /* Border color and thickness */
    }
    #icon-clock-1,
    #icon-clock-2 {
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        transition: opacity 0.3s;
        font-size: 1rem; /* Adjust the size of the icon */
        color: #fff; /* Inner color of the icon */
        -webkit-text-stroke: 1px #13005a; /* Border color and thickness */
    }
    #icon-location {
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        transition: opacity 0.3s;
        font-size: 1rem; /* Adjust the size of the icon */
        color: #fff; /* Inner color of the icon */
        -webkit-text-stroke: 1px #13005a; /* Border color and thickness */
    }
    #icon-info {
        left: 15px;
        top: 20%;
        transform: translateY(-50%);
        pointer-events: none;
        transition: opacity 0.3s;
        font-size: 1rem; /* Adjust the size of the icon */
        color: #fff; /* Inner color of the icon */
        -webkit-text-stroke: 1px #13005a; /* Border color and thickness */
    }
</style>

<!-- Create Post Form -->
<div class="container mt-5 pt-5 d-flex justify-content-center">
    <div class="row g-4 justify-content-center">
        <h2 class="fw-bold mb-2 mt-3">Create New Event</h2>
        <div class="col-md-7">
            <div class="form-section p-4 shadow-sm rounded">
                <form method="post" action="{{ route('requestEvent') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 position-relative">
                        <input type="text" id="event-title" class="form-control pl-5" placeholder="Event Title" oninput="handleInput()" required name="name" value="{{ old('name') }}"/>
                        <i id="icon-star" class="fas fa-star position-absolute"></i>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="postCategory" name="category">
                            <option value="Business" {{ old('category') == 'Business' ? 'selected' : '' }}>Business</option>
                            <option value="Finance" {{ old('category') == 'Finance' ? 'selected' : '' }}>Finance</option>
                            <option value="Personal Development" {{ old('category') == 'Personal Development' ? 'selected' : '' }}>Personal Development</option>
                        </select>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6 position-relative">
                            <input type="text" id="event-date" class="form-control pl-5" placeholder="Event Date" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" required name="start_date" value="{{ old('start_date') }}"/>
                            <i id="icon-calendar-1" class="fas fa-calendar-alt position-absolute"></i>
                        </div>
                        <div class="col-md-6 position-relative">
                            <input type="text" id="ends-after" class="form-control pl-5" placeholder="Ends After" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" required name="end_date" value="{{ old('end_date') }}"/>
                            <i id="icon-calendar-2" class="fas fa-calendar-alt position-absolute"></i>
                        </div>
                    </div>
                    <div class="mt-3 position-relative">
                        <input type="text" id="location" class="form-control pl-5" placeholder="Location" required name="location" value="{{ old('location') }}"/>
                        <i id="icon-location" class="fas fa-map-marker-alt position-absolute"></i>
                    </div>
                    <div class="mt-3 position-relative">
                        <input type="text" id="location" class="form-control pl-5" placeholder="Price" required name="price" value="{{ old('price') }}"/>
                        <i id="icon-location" class="fas fa-dollar-sign position-absolute"></i>
                    </div>
                    <div class="mt-3 position-relative">
                        <input type="text" id="location" class="form-control pl-5" placeholder="Instagram" required name="website" value="{{ old('website') }}"/>
                        <i id="icon-location" class="fa-brands fa-instagram position-absolute"></i>
                    </div>
                    <div class="mt-3" style="width: 100%; max-width: 100%;">
                        <div style="position: relative; width: 100%; padding-bottom: 33%; height: 0; overflow: hidden;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.015647640304!2d144.9630580158958!3d-37.81362757975159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0x5045675218ce840!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sus!4v1611812968321!5m2!1sen!2sus" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                    <div class="mt-3 position-relative">
                        <textarea id="about-event" class="form-control pl-5" rows="3" placeholder="About Event" required name="description">{{ old('description') }}</textarea>
                        <i id="icon-info" class="fas fa-info-circle position-absolute"></i>
                    </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="side-section p-4 shadow-sm rounded">
                <label class="form-label" style="color: #13005a;">Upload Banner</label>
                <div id="file-upload" class="file-upload text-center mb-3" style="color: #13005a; border: 2px dashed #13005a; padding: 20px;">
                    <i style="color: #13005a;" class="fas fa-upload fa-2x"></i>
                    <input type="file" id="file-input" class="form-control-file mt-2" style="display: none;" name="thumbnail"/>
                    <p>Click here or drag your files</p>
                </div>
                <div id="preview-container" class="text-center"></div>
                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary me-2">Create Event</button>
                    <a href="" class="btn btn-secondary border-round">Cancel</a>
                </div>
            </div>
        </div>
                </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toggleButton = document.getElementById('toggleSearch');
        var searchInput = document.getElementById('searchInput');
        
        toggleButton.addEventListener('click', function() {
            var isVisible = searchInput.style.display === 'block';
            searchInput.style.display = isVisible ? 'none' : 'block';
        
            if (!isVisible) {
                searchInput.focus();
            }
        });
    });

    // JavaScript for drag and drop file upload
    const fileUpload = document.getElementById('file-upload');
    const fileInput = document.getElementById('file-input');
    const previewContainer = document.getElementById('preview-container');
    
    fileUpload.addEventListener('click', () => {
        fileInput.click();
    });
    
    fileUpload.addEventListener('dragover', (e) => {
        e.preventDefault();
        fileUpload.style.borderColor = '#00f';
    });
    
    fileUpload.addEventListener('dragleave', () => {
        fileUpload.style.borderColor = '#13005a';
    });
    
    fileUpload.addEventListener('drop', (e) => {
        e.preventDefault();
        fileUpload.style.borderColor = '#13005a';
        const files = e.dataTransfer.files;
        handleFiles(files);
    });
    
    fileInput.addEventListener('change', (e) => {
        const files = e.target.files;
        handleFiles(files);
    });
    
    function handleFiles(files) {
        previewContainer.innerHTML = ''; // Clear the preview container
        const file = files[0]; // Only handle the first file
        const reader = new FileReader();
        reader.onload = (e) => {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'img-upload';
            img.style.maxWidth = '100px';
            img.style.height = 'auto';
            previewContainer.innerHTML = ''; // Clear previous preview
            previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
</script>
@endsection

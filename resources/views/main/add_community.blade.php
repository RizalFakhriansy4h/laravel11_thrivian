@extends('layouts.template_main')
@section('title', 'Add Community')
@section('content')

<main class="container" style="margin-top: 6%;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Create New Community</h4>
                    <form method="post" action="{{ route('requestCommunity') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="postThumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" id="postThumbnail" accept="image/*" name="thumbnail" onchange="previewImage();">
                            <img id="thumbnailPreview" src="" alt="Thumbnail Preview" class="img-thumbnail mt-2" style="display: none; width: 200px; height: auto;">
                        </div>
                        <div class="mb-3">
                            <label for="postCategory" class="form-label">Category</label>
                            <select class="form-select" id="postCategory" name="category">
                                <option value="Business" {{ old('category') == 'Business' ? 'selected' : '' }}>Business</option>
                                <option value="Finance" {{ old('category') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                <option value="Personal Development" {{ old('category') == 'Personal Development' ? 'selected' : '' }}>Personal Development</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">Name Community</label>
                            <input type="text" class="form-control" id="postTitle" required name="name" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="postContent" class="form-label">Description About Your Community</label>
                            <textarea class="form-control" id="postContent" rows="5" required name="description">{{ old('description') }}</textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">Save Community</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
function previewImage() {
    var file = document.getElementById("postThumbnail").files;
    if (file.length > 0) {
        var fileReader = new FileReader();

        fileReader.onload = function (event) {
            document.getElementById("thumbnailPreview").setAttribute("src", event.target.result);
            document.getElementById("thumbnailPreview").style.display = "block";
        };

        fileReader.readAsDataURL(file[0]);
    }
}
</script>

@endsection

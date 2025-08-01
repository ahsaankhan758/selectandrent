@extends('admin.layouts.Master')
@section('title') {{ __('messages.edit') }} {{ trans_choice('messages.date',1) }} @endsection
@section('content')
    @if(auth()->user()->role == 'admin')
        <script src="{{asset('/')}}assets/js/admin/tinymce7.9.1/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: 'textarea',
                base_url: '{{asset('/')}}assets/js/admin/tinymce7.9.1', // where tinymce.min.js is
                suffix: '.min',
                plugins: [
                    'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image',
                    'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount'
                ],
                toolbar: 'undo redo | blocks | bold italic underline | link image media table | bullist numlist | removeformat',
                height: 300
            });
        </script>
        <div class="col-10">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.edit') }} {{ trans_choice('messages.date',1) }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ trans_choice('messages.title',1) }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $blog->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">{{ __('messages.date') }} </label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $blog->date) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="authorName" class="form-label">{{ trans_choice('messages.author',1) }}</label>
                            <input type="text" class="form-control" id="authorName" name="authorName" value="{{ old('authorName', $blog->authorName) }}" required>
                        </div>

                        <!-- Thumbnail Image -->
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">{{ __('messages.thumbnail') }}</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" onchange="PreviewThumbnail();">
                            
                            @if ($blog->thumbnail)
                                <div class="mt-2">
                                    <!-- Your existing thumbnail path logic -->
                                    <img src="{{ asset('storage/' . $blog->thumbnail) }}" id="uploadThumbnailPreview" class="img-fluid rounded" width="100">
                                </div>
                            @else
                                <!-- Display the preview only if no thumbnail is present in the blog -->
                                <div class="mt-2">
                                    <img id="uploadThumbnailPreview" class="img-fluid rounded" style="display: none; width: 100px;">
                                </div>
                            @endif
                        </div>               

                        <!-- Multiple Images Upload -->
                        <div class="mb-3">
                            <label for="images" class="form-label">{{ __('messages.images') }}</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple onchange="PreviewImages();">
                        
                            <div class="mt-2 row" id="uploadImagesPreview">
                                @php
                                    $images = json_decode($blog->images, true);
                                @endphp
                                @if (!empty($images))
                                    @foreach ($images as $image)
                                        <div class="col-md-3 mb-2">
                                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded">
                                        </div>
                                    @endforeach
                                @else
                                    <p>No Additional Images Available</p>
                                @endif
                            </div>
                        </div>
                        

                        <div class="mb-3">
                            <label for="detail" class="form-label">{{ __('messages.details') }}</label>
                            <textarea class="form-control" id="detail" name="detail" rows="4" required>{{ old('detail', $blog->detail) }}</textarea>
                        </div>

                        <div class="text-end">
                        <button type="submit" class="btn btn-success">{{ __('messages.update') }}</button>
                        <a href="{{ route('blogs.blogDetail') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function PreviewThumbnail() {
            var reader = new FileReader();
            reader.readAsDataURL(document.getElementById("thumbnail").files[0]);
            reader.onload = function (oFREvent) {
                var preview = document.getElementById("uploadThumbnailPreview");
                preview.src = oFREvent.target.result;
                preview.style.display = "block";  // Show the image preview
            };
        }

        function PreviewImages() {
            var previewContainer = document.getElementById("uploadImagesPreview");
            previewContainer.innerHTML = "";  // Clear the preview container before adding new previews

            var files = document.getElementById("images").files;
            
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.readAsDataURL(files[i]);
                reader.onload = function (oFREvent) {
                    var img = document.createElement("img");
                    img.src = oFREvent.target.result;
                    img.classList.add("img-fluid", "rounded", "col-md-3", "mb-2");
                    previewContainer.appendChild(img);
                };
            }
        }

        </script> 
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection

@extends('admin.layouts.Master')
@section('title') {{ __('messages.create') }} @endsection
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
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.create') }} {{ trans_choice('messages.blog',1) }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name">{{ __('messages.title') }}</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="date">{{ __('messages.publish') }} {{ __('messages.date') }}</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="authorName">{{ trans_choice('messages.author',1) }}</label>
                                <input type="text" name="authorName" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="thumbnail">{{ __('messages.thumbnail') }}</label>
                                <input type="file" name="thumbnail" class="form-control" id="thumbnail" onchange="PreviewThumbnail();" required>
                                <div class="mt-2">
                                    <img id="uploadThumbnailPreview" class="img-fluid rounded" style="display: none; max-width: 100px;">
                                </div>
                            </div>
                        
                            <div class="col-md-12 mb-3">
                                <label for="images">{{ trans_choice('messages.blog',1) }} {{ __('messages.images') }}</label>
                                <input type="file" name="images[]" class="form-control" id="images" multiple onchange="PreviewImages();">
                        
                                <div class="mt-2 row" id="uploadImagesPreview">
                                    <!-- Previews of selected images will show here -->
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="detail">{{ __('messages.description') }}</label>
                                <textarea name="detail" class="form-control" rows="4" id="description"></textarea>
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
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
                preview.style.display = "block";  // Show the preview
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

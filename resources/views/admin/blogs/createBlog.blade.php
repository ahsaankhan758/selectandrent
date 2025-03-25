@extends('admin.layouts.Master')
@section('title') Create @endsection
@section('content')

<div class="col-12">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Create Blog</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Blog Title</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="date">Published Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="authorName">Author</label>
                        <input type="text" name="authorName" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="thumbnail">Upload Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="images">Upload Blog Images</label>
                        <input type="file" name="images[]" class="form-control" multiple required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="detail">Description</label>
                        <textarea name="detail" class="form-control" rows="4" required></textarea>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

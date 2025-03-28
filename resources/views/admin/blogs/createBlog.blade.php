@extends('admin.layouts.Master')
@section('title') {{ __('messages.create') }} @endsection
@section('content')

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
                        <label for="thumbnail"> {{ __('messages.thumbnail') }}Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="images">{{ trans_choice('messages.blog',1) }} {{ __('messages.images') }}</label>
                        <input type="file" name="images[]" class="form-control" multiple required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="detail">{{ __('messages.description') }}</label>
                        <textarea name="detail" class="form-control" rows="4" required></textarea>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

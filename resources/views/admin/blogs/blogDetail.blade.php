@extends('admin.layouts.Master')
@section('title') {{ __('messages.details') }} @endsection
@section('content')

<div class="col-12">
    <div class="card mt-4">
        <div class="card-header">
            <h4>{{ trans_choice('messages.blog',1) }}</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="myTable">
                <thead class="align-text-center">
                    <tr>
                        <th scope="col">{{ trans_choice('messages.title',1) }}</th>
                        <th scope="col">{{ __('messages.date') }}</th>
                        <th scope="col">{{ trans_choice('messages.author',1) }}</th>
                        <th scope="col">{{ __('messages.thumbnail') }}</th>
                        <th scope="col">{{ __('messages.images') }}</th>
                        <th scope="col">{{ __('messages.detail') }}</th>
                        <th scope="col">{{ __('messages.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal{{ $blog->id }}">
                                {{ ucfirst(strtolower($blog->name)) }}
                            </a>
                        </td>
                        <td>{{ $blog->date }}</td>
                        <td>{{ $blog->authorName }}</td>
                        <td>
                            @if ($blog->thumbnail)
                                <img src="{{ asset('storage/' . $blog->thumbnail) }}" class="img-fluid" width="60" height="60">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>
                            @php
                                $images = json_decode($blog->images, true);
                            @endphp
                            @if ($images)
                                @foreach ($images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" class="img-fluid me-1 mb-1" width="50" height="50">
                                @endforeach
                            @else
                                <span>No Images</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($blog->detail, 10) }}</td>
                        <td style="white-space: nowrap; width: 100px;">
                            <a href="{{ route('blogs.edit', $blog->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="{{ route('blogs.destroy', $blog->id) }}" class="btn-delete">
                                <i class="fa-solid fa-trash" style="color: red"></i>
                            </a>
                        </td>
                    </tr>
                
                    <!-- Blog Detail Modal -->
                    <div class="modal fade" id="modal{{ $blog->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2><i class="fas fa-book"></i> {{ $blog->name }}</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Date:</strong> {{ $blog->date }}</p>
                                    <p><strong>Author:</strong> {{ $blog->authorName }}</p>
                                    <div class="col mt-2">
                                        <p><strong>Blog Detail:</strong> {{ $blog->detail }}</p>
                                    </div>

                                    <h4 class="mt-3">Thumbnail</h4>
                                    <div class="row mt-3">
                                        <div class="col-md-4 mb-3">
                                            @if ($blog->thumbnail)
                                                <a href="{{ asset('storage/' . $blog->thumbnail) }}" data-lightbox="blog-thumbnail-{{ $blog->id }}">
                                                    <img src="{{ asset('storage/' . $blog->thumbnail) }}" class="img-fluid" width="100%">
                                                </a>
                                            @else
                                                <p>No Thumbnail Available</p>
                                            @endif
                                        </div>
                                    </div>

                                    <h4 class="mt-3">Images</h4>
                                    <div class="row mt-3">
                                        @if ($images)
                                            @foreach ($images as $image)
                                                <div class="col-md-4 mb-3">
                                                    <a href="{{ asset('storage/' . $image) }}" data-lightbox="blog-images-{{ $blog->id }}">
                                                        <img src="{{ asset('storage/' . $image) }}" class="img-fluid">
                                                    </a>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No Images Available</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach                
                </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-end">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</div>

@endsection

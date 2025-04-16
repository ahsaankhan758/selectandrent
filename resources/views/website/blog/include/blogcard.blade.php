@if ($blogs->count() > 0)
@foreach($blogs as $blog)
<div class="col-lg-4 col-md-6 mb-4">
    <div class="blog-card">
        <a href="{{ route('blog.detail', $blog->id) }}">
            <img src="{{ asset('storage/' . $blog->thumbnail) }}" class="blog-image" alt="Blog Image">
        </a>                    
        <div class="date-box">
            {{ date('d', strtotime($blog->date)) }} <br> {{ date('F', strtotime($blog->date)) }}
        </div>
        <div class="p-3 blog-card-text">
            <p class="author">by {{ $blog->authorName }}</p>
            <h5 class="blog-title">
                {{ $blog->name }}
            </h5>
        </div>
    </div>
</div>
@endforeach 
@else
    <div class="col-12 text-center">
        <p>{{ __('messages.No blogs available') }}.</p>
    </div>
@endif
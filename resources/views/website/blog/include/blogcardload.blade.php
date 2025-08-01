@foreach($blogs as $blog)
<div class="col-lg-4 col-md-6 mb-4">
    <div class="blog-card">
        <a href="{{ route('blog.detail', $blog->id) }}">
            @php
                $path = public_path('storage/' . $blog->thumbnail);
                $imageExists = $blog->thumbnail && file_exists($path);
            @endphp

            @if ($imageExists)
                <img src="{{ asset('storage/' . $blog->thumbnail) }}" class="blog-image" alt="Blog Image">
            @else
                <img src="{{ asset('images/no-image-blog.avif') }}" class="custom-card-img" alt="No Image Available">
            @endif
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
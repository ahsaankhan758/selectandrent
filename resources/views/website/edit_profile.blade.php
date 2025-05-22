@extends('website.layout.master')

@section('title')
{{ __('messages.edit_title') }}
@endsection

@section('content')
<div class="container py-5">
    <section class="profile-section d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="profile-card bg-white shadow-lg p-4 p-md-5 rounded-4 border border-light" style="max-width: 600px; width: 100%; background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(10px);">
            
            <div class="text-center mb-4">
                <h3 class="fw-bold">{{ __('messages.update_profile') }}</h3>
                {{-- <p class="text-muted mb-0">Keep your details up-to-date for better communication.</p> --}}
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li class="text-capitalize">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

          <form action="{{ route('website.update_profile', $user->id) }}" method="POST" enctype="multipart/form-data">
           @csrf

    <div class="mb-4">
        <label class="form-label fw-semibold">{{ __('messages.profile_image') }}</label>
        <input type="file" name="profile_image" class="form-control border rounded-3" onchange="previewImage(event)">

        <div class="mt-3">
            <img id="imagePreview" 
                 src="{{ $user->profile_image ? asset($user->profile_image) : 'https://via.placeholder.com/100' }}" 
                 alt="Profile Image" 
                 width="100" 
                 class="rounded-circle">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">{{ __('messages.profile_name') }}</label>
        <input type="text" name="name" class="form-control border rounded-3" placeholder="Enter your name" value="{{ old('name', $user->name) }}">
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">{{ __('messages.profile_email') }}</label>
        <input type="email" name="email" class="form-control border rounded-3" placeholder="Enter your email" value="{{ old('email', $user->email) }}" disabled>
    </div>

    <div class="mb-4">
        <label class="form-label fw-semibold">{{ __('messages.profile_number') }}</label>
        <input type="text" name="phone" class="form-control border rounded-3" placeholder="Enter your phone number" value="{{ old('phone', $user->phone) }}">
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-dark btn-lg rounded-3">{{ __('messages.profile_save') }}</button>
    </div>
</form>
 </div>
</section>
</div>
<style>
    .profile-section {
    border-radius: 1rem;
    padding: 2rem;
}

.profile-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
       
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
            });
    
            setTimeout(function() {
                alerts.forEach(function(alert) {
                    alert.remove();
                });
            }, 500);
        }, 2000); 
    });
    </script>
    <script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('imagePreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection

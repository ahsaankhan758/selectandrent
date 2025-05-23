@extends('admin.layouts.Master')
@section('title')
{{__('messages.edit_title') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            @if(auth()->check() && auth()->user()->role === 'admin')
                                <a href="#">Admin</a>
                            @else
                                <a href="#">Company</a>
                            @endif
                        </li>
                        <li class="breadcrumb-item active">{{__('messages.update_profile') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('messages.update_profile') }}</h4>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
               @if(session('success'))
                    <div id="alert-success" class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div id="alert-danger" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('admin.update_profile', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 text-center">
                        @if ($user->profile_image)
                            <img src="{{ asset($user->profile_image) }}" alt="Profile Image" class="rounded-circle mb-3 profile-preview-img" style="width: 120px; height: 120px; object-fit: cover;">
                        @else
                            <img src="{{ asset('frontend-assets/assets/profile/default.png') }}" alt="Default Profile Image" class="rounded-circle mb-3 profile-preview-img" style="width: 120px; height: 120px; object-fit: cover;">
                        @endif
                        <label for="profile_image" class="form-label">{{__('messages.profile_image') }}</label>
                        <input type="file" name="profile_image" class="form-control" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('messages.profile_name') }}</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name" value="{{ old('name', $user->name) }}">
                    </div>

                    {{-- Email disabled as per your code --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('messages.email') }}</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="{{ old('email', $user->email) }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">{{__('messages.number') }}</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" value="{{ old('phone', $user->phone) }}">
                    </div>

                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-info waves-effect waves-light">{{__('messages.save') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
 <script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.querySelector('input[name="profile_image"]');
        const imgPreview = document.querySelector('.profile-preview-img');

        input.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imgPreview.setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>
<script>
    setTimeout(function() {
        var successAlert = document.getElementById('alert-success');
        if(successAlert){
            successAlert.style.display = 'none';
        }

        var dangerAlert = document.getElementById('alert-danger');
        if(dangerAlert){
            dangerAlert.style.display = 'none';
        }
    }, 3000);
</script>
@endsection

@extends('website.layout.master')
@section('title')
    {{ __('messages.privacy') }}
@endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-2 d-none d-lg-block"></div>

            <div class="col-lg-8 col-12">
                <h2 class="mb-4">{{ __('messages.privacy_title') }}</h2>

                <p>{{ __('messages.privacy_intro1') }}</p>
                <p>{{ __('messages.privacy_intro2') }}</p>

                <h4>{{ __('messages.privacy_section_collect') }}</h4>
                <p>{{ __('messages.privacy_section_collect_desc') }}</p>

                <h4>{{ __('messages.privacy_section_use') }}</h4>
                <p>{{ __('messages.privacy_section_use_desc') }}</p>

                <h4>{{ __('messages.privacy_section_share') }}</h4>
                <p>{{ __('messages.privacy_section_share_desc') }}</p>

                <h4>{{ __('messages.privacy_section_security') }}</h4>
                <p>{{ __('messages.privacy_section_security_desc') }}</p>

                <h4>{{ __('messages.privacy_section_cookies') }}</h4>
                <p>{{ __('messages.privacy_section_cookies_desc') }}</p>

                <h4>{{ __('messages.privacy_section_retention') }}</h4>
                <p>{{ __('messages.privacy_section_retention_desc') }}</p>

                <h4>{{ __('messages.privacy_section_rights') }}</h4>
                <p>{{ __('messages.privacy_section_rights_desc') }}</p>

                <h4>{{ __('messages.privacy_section_changes') }}</h4>
                <p>{{ __('messages.privacy_section_changes_desc') }}</p>

                <h4>{{ __('messages.privacy_section_contact') }}</h4>
                <p>{{ __('messages.privacy_section_contact_desc') }}</p>

            </div>

            <div class="col-lg-2 d-none d-lg-block"></div>
        </div>
    </div>
@endsection

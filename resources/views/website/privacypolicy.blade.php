@extends('website.layout.master')
@section('title')
{{ __('messages.privacy') }}
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-2 d-none d-lg-block"></div> 

        <div class="col-lg-8 col-12"> <!-- Main content area -->
            <h2 class="mb-4">Select And Rent Privacy Policy</h2>

            <p>At our Car Rental Service, we respect your privacy and are committed to protecting your personal data. This Privacy Policy outlines how we collect, use, and safeguard your information.</p>

            <h4>1. Personal Information We Collect</h4>
            <ul>
                <li>Name, contact number, and email address</li>
                <li>CNIC or passport details</li>
                <li>Driving license information</li>
                <li>Billing and payment details</li>
                <li>Location and usage data (only when necessary)</li>
            </ul>

            <h4>2. How We Use Your Information</h4>
            <ul>
                <li>To confirm and manage your bookings</li>
                <li>To verify your identity and eligibility</li>
                <li>To process payments and send invoices</li>
                <li>To improve our services and customer experience</li>
                <li>To communicate with you regarding updates, offers, or changes</li>
            </ul>

            <h4>3. Data Protection</h4>
            <ul>
                <li>We implement strong security measures to protect your data from unauthorized access, loss, or misuse.</li>
                <li>All payment transactions are encrypted and handled securely.</li>
            </ul>

            <h4>4. Sharing of Data</h4>
            <ul>
                <li>We do not sell, rent, or share your personal data with third parties except when required by law or to fulfill your booking (e.g., with drivers).</li>
            </ul>

            <h4>5. Cookies</h4>
            <ul>
                <li>Our website may use cookies to enhance user experience and track usage patterns. You can choose to disable cookies in your browser settings.</li>
            </ul>

            <h4>6. Your Rights</h4>
            <ul>
                <li>You have the right to request access, correction, or deletion of your personal information.</li>
                <li>To do so, you may contact our support team via the contact form or email.</li>
            </ul>

            <h4>7. Changes to This Policy</h4>
            <p>We reserve the right to update this privacy policy at any time. Any changes will be posted on this page with the updated date.</p>

            <h4>8. Contact Us</h4>
            <p>If you have any questions or concerns about our privacy practices, please contact us at <strong>support@yourwebsite.com</strong>.</p>
        </div>

        <div class="col-lg-2 d-none d-lg-block"></div> <!-- Right space -->
    </div>
</div>
@endsection

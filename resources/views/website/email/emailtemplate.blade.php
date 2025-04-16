
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.Email Template') }} | {{ __('messages.Select and Rent') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .logo {
            width: 140px;
            margin-bottom: 20px;
        }
        h2 {
            color: #333;
            margin-bottom: 15px;
        }
        .content {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background: #f06115;
            color: #ffffff;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            transition: 0.3s ease;
        }
        .button:hover {
            background: #f06115;
        }
        .support-box {
            background: #f8f8f8;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
        }
        .support-box p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }
        .footer {
            margin-bottom: 2px;
            font-size: 14px;
            color: #888;
        }
        .social-icons a {
            display: inline-block;
            margin: 0 5px;
            text-decoration: none;
        }
        .social-icons img {
            width: 28px;
            height: auto;
            border-radius: 50%;
        }
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
            .button {
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ $logo }}" alt="Select and Rent Logo" class="logo">
        <h2>{{ __('messages.Welcome to Select and Rent') }}, {{ $user->name }}!</h2>
        <p class="content">{{ __('messages.Thank you for registering your company with us. Please click the link below to verify your email address and complete the registration process') }}:</p>
        <a href="{{ route('verification.verify', ['id' => $user->id, 'hash' => sha1($user->email)]) }}" class="button">
            {{ __('messages.Verify Your Email') }}
        </a>
        
        <div class="support-box">
            <p><strong>{{ __('messages.Need Help') }}?</strong></p>
            <p>{{ __('messages.Contact our support team at') }} <br> <strong>hello@selectandrent.com</strong></p>
        </div>

        <p class="footer">{{ __('messages.Stay connected with us') }}:</p>
        <div class="social-icons">
            <a href="#"><img src="{{ $facebook }}" alt="Facebook"></a>
            <a href="#"><img src="{{ $twitter }}" alt="Twitter"></a>
            <a href="#"><img src="{{ $instagram }}" alt="Instagram"></a>
            <a href="#"><img src="{{ $linkedin }}" alt="LinkedIn"></a>
        </div>
        <hr>
        <div class="footer">© 2025{{ __('messages.All Rights Reserved') }} </div>
    </div>
</body>
</html>

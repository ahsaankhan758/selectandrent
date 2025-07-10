<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Details</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <table width="100%" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <tr style="background-color: #007bff; color: white;">
            <td style="padding: 20px; text-align: center;">
                <h2>Welcome to {{ env('APP_NAME', 'Select & Rent') }}</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p>Dear {{ $user->name ?? 'Employee' }},</p>

                <p>Your account has been created. You can log in using the credentials below:</p>

                <table cellpadding="8" cellspacing="0" width="100%" style="border: 1px solid #ddd; border-radius: 6px; background-color: #f9f9f9;">
                    <tr>
                        <td><strong>Login URL:</strong></td>
                        <td><a href="{{ route('employeeLoginForm') ?? 'https://example.com/login' }}" target="_blank">{{ $confirmationLink ?? 'https://example.com/login' }}</a></td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{ $user->email ?? 'user@example.com' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Password:</strong></td>
                        <td>{{ $password ?? '********' }}</td>
                    </tr>
                </table>

                <!-- <p style="margin-top: 20px;">For your security, we recommend changing your password after your first login.</p> -->

                <p>Best regards,<br>
                The {{ env('APP_NAME', 'Select & Rent') }} Team</p>
            </td>
        </tr>
        <tr style="background-color: #f0f0f0; text-align: center; font-size: 12px;">
            <td style="padding: 15px;">
                &copy; {{ date('Y') }} {{ env('APP_NAME', 'Select & Rent') }}. All rights reserved.
            </td>
        </tr>
    </table>

</body>
</html>

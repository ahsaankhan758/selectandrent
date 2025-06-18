<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Cancelled Notification</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Hello {{ $booking->booking_items->first()?->vehicle?->users->name }},</h2>

    <p>We’d like to inform you that a customer has <strong>cancelled</strong> a booking for one of your vehicles.</p>

    <p><strong>Customer:</strong> {{ $booking->user->name }}</p>
    <p><strong>Booking Reference:</strong> {{ $booking->booking_reference }}</p>
    <p><strong>Cancel Reason:</strong> {{ $booking->notes }}</p>
    <p><strong>Vehicle:</strong> {{ optional($booking->booking_items->first()->vehicle)->lisence_plate ?? 'N/A' }}</p>

    <p>This is just a notification — no action is needed on your part.</p>

    <br>
    <p>Regards,<br><strong>Select & Rent Team</strong></p>
</body>
</html>

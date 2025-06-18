<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Cancelled</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Hello {{ $booking->user->name }},</h2>

    <p>Your Cancel Request of booking (Reference: <strong>{{ $booking->booking_reference }}</strong>) has been received. We will inform you once your Transaction ready For Refund. </p>

    <p><strong>Vehicle:</strong> {{ optional($booking->booking_items->first()->vehicle)->lisence_plate ?? 'N/A' }}</p>
    <p><strong>Booking Date:</strong> {{ $booking->created_at->format('F j, Y') }}</p>

    <p>If this was a mistake or you have any questions, feel free to contact our support team.</p>

    <br>
    <p>Thank you,<br><strong>Select & Rent Team</strong></p>
</body>
</html>

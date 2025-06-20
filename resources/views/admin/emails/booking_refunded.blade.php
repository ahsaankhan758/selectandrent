<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Refund Issued</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Hello {{ $booking->user->name }},</h2>

    <p>We are writing to inform you that the refund for your booking (Reference: <strong>{{ $booking->booking_reference }}</strong>) has been successfully processed.</p>

    <p><strong>Vehicle:</strong> {{ optional($booking->booking_items->first()->vehicle)->lisence_plate ?? 'N/A' }}</p>
    <p><strong>Refund Amount:</strong> {{ number_format($booking->total_price, 2) }} {{ $booking->currency ?? 'USD' }}</p>
    <p><strong>Refund Date:</strong> {{ now()->format('F j, Y') }}</p>

    <p>The amount should reflect in your account within 5–7 business days, depending on your payment provider.</p>

    <p>If you have any questions or concerns, please don't hesitate to reach out to our support team.</p>

    <br>
    <p>Thank you for choosing <strong>Select & Rent</strong>.</p>
    <p><strong>Best regards,</strong><br>
    The Select & Rent Team</p>
</body>
</html>

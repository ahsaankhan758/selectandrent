<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Customer Refund Notification</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333;">
    <h2>Hello {{ $booking->booking_items->first()->vehicle->company->name ?? 'Partner' }},</h2>

    <p>This is to inform you that a refund has been issued for the following booking placed through the Select & Rent platform.</p>

    <p><strong>Customer Name:</strong> {{ $booking->user->name }}</p>
    <p><strong>Booking Reference:</strong> {{ $booking->booking_reference }}</p>
    <p><strong>Vehicle:</strong> {{ optional($booking->booking_items->first()->vehicle)->lisence_plate ?? 'N/A' }}</p>
    <p><strong>Refunded Amount:</strong> {{ number_format($booking->total_price, 2) }} {{ $booking->currency ?? 'USD' }}</p>
    <p><strong>Refund Date:</strong> {{ now()->format('F j, Y') }}</p>

    <p>The refund has been processed due to a cancellation request from the customer. Please make sure your team is informed of this update.</p>

    <p>If you have any concerns or questions regarding this refund, feel free to reach out to our support team.</p>

    <br>
    <p>Thank you for your continued partnership,<br>
    <strong>Select & Rent Team</strong></p>
</body>
</html>

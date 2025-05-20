<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #f8f9fa;
            padding: 20px;
        }

        h2, h4 {
            color: #004085;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            padding: 20px;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        ul li {
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table thead {
            background-color: #e9ecef;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }

        th {
            color: #495057;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #666;
        }

        strong {
            color: #212529;
        }
    </style>
</head>
<body>

    <h2>Thank you for your booking!</h2>
    <p>Dear <strong>{{ $booking->first_name }} {{ $booking->last_name }}</strong>,</p>
    <p>We have received your booking. Here are the details:</p>

    <div class="card">
        <h4>Reference Number:</h4>
        <p><strong>{{ $booking->booking_reference }}</strong></p>
    </div>

    <div class="card">
        <h4>Customer Details:</h4>
        <ul>
            <li><strong>Name:</strong> {{ $booking->first_name }} {{ $booking->last_name }}</li>
            <li><strong>Email:</strong> {{ $booking->email }}</li>
            <li><strong>Phone:</strong> {{ $booking->phonenumber }}</li>
            <li><strong>City:</strong> {{ $booking->city }}</li>
            <li><strong>Country:</strong> {{ $booking->country }}</li>
            <li><strong>Postal Code:</strong> {{ $booking->postal_code }}</li>
            <li><strong>Billing Address:</strong> {{ $booking->billing_addresss }}</li>
        </ul>
    </div>

    <div class="card">
        <h4>Order Summary:</h4>
        <ul>
            <li><strong>Subtotal:</strong> {{ $currency }} {{ number_format($booking->subtotal, 2) }}</li>
            <li><strong>Tax:</strong> {{ $currency }} {{ number_format($booking->tax_amount, 2) }}</li>
            <li><strong>Total:</strong> <strong>{{ $currency }} {{ number_format($booking->total_price, 2) }}</strong></li>
        </ul>
    </div>

    <div class="card">
        <h4>Vehicle(s) Booked:</h4>
        <table>
            <thead>
                <tr>
                    <th>Vehicle</th>
                    <th>Pickup Location & Time</th>
                    <th>Drop-off Location & Time</th>
                    <th>Days</th>
                    <th>Rate/Day</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookingItems as $item)
                <tr>
                    <td>{{ $item->vehicle->carModel->name ?? 'N/A' }}</td>
                   
                    <td>
                        {{ $item->pickupLocation->name ?? $item->pickup_location }}<br>
                        {{ $item->pickup_datetime }}
                    </td>
                    <td>
                        {{ $item->dropoffLocation->name ?? $item->dropoff_location }}<br>
                        {{ $item->dropoff_datetime }}
                    </td>
                    <td>{{ $item->duration_days }}</td>
                    <td>{{ $currency }} {{ number_format($item->price_per_day, 2) }}</td>
                    <td>{{ $currency }} {{ number_format($item->total_price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <p>We will contact you soon with further updates.</p>

  <div class="footer">
    Regards,<br>
    <strong>{{ $bookingItems[0]->vehicle->company->name ?? 'N/A' }}</strong>
  </div>



</body>
</html>

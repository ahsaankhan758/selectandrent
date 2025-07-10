<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
<p>Hello {{ $booking->first_name }},</p>
<p>{{ $messageText }}</p>
<p>Picked Up From: {{ auth()->user()->name }}</p>
<p>Booking Reference: {{ $booking->booking_reference }}</p>

 <div class="card">
        <h4>Vehicle Booked</h4>
        <table>
            <thead>
                <tr>
                    <th>Vehicle</th>
                    <th>Pickup Location & Time</th>
                    <th>Actual Pickup</th>
                    <th>Drop-off Location & Time</th>
                    <th>Actual Dropoff</th>
                    <th>Days</th>
                    <th>Rate/Day</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookingItems as $item)
                <tr>
                    <td>{{ $item->vehicle->carModel->name ?? 'N/A' }}- {{ $item->vehicle->year ?? 'N/A' }}</td>
                    <td>
                        {{ $item->pickupLocation->area_name ?? $item->pickup_location }}<br>
                        {{ $item->pickup_datetime }}
                    </td>
                   <td>
                        @if($item->actual_pickup_datetime)
                            {{ $item->actual_pickup_datetime }}
                        @endif
                    </td>
                    <td>
                        {{ $item->dropoffLocation->area_name ?? $item->dropoff_location }}<br>
                        {{ $item->dropoff_datetime }}
                    </td>
                     <td>
                        @if($item->actual_dropoff_datetime)
                            {{ $item->actual_dropoff_datetime }}
                        @endif
                    </td>
                    <td>{{ $item->duration_days }}</td>
                    <td>{{ number_format($item->price_per_day, 2) }}</td>
                    <td>{{ number_format($item->total_price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<p>Thank you for using our service!</p>
</body>
</html>
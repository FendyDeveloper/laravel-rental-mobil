<!DOCTYPE html>
<html>
<head>
    <title>Transactions PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Transactions</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NIK</th>
                <th>License Plate</th>
                <th>Booking Date</th>
                <th>Pickup Date</th>
                <th>Return Date</th>
                <th>Driver</th>
                <th>Total</th>
                <th>Downpayment</th>
                <th>Balance Due</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id_transaction }}</td>
                    <td>{{ $transaction->nik }}</td>
                    <td>{{ $transaction->license_plate }}</td>
                    <td>{{ $transaction->booking_date }}</td>
                    <td>{{ $transaction->pickup_date }}</td>
                    <td>{{ $transaction->return_date ?? 'N/A' }}</td>
                    <td>{{ $transaction->driver ? 'Yes' : 'No' }}</td>
                    <td>Rp{{ $transaction->total }}</td>
                    <td>Rp{{ $transaction->downpayment }}</td>
                    <td>Rp{{ $transaction->balance_due }}</td>
                    <td>{{ ucfirst($transaction->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Order Summary</title>
</head>

<body>
    <h2>Order Summary - #{{ $order->id }}</h2>
    <p><strong>Customer:</strong> {{ $order->customer_name }} ({{ $order->customer_email }})</p>
    <p><strong>Date:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Unit Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong>{{ number_format($order->total, 2) }}</strong></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
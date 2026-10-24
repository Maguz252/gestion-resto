<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pedido #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            color: #2d3748;
        }

        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 5px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>RestoGest - Ticket de Pedido</h1>
        <p>Pedido #{{ $order->id }}</p>
    </div>

    <div class="info">
        <p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
        <p><strong>Cliente:</strong> {{ $order->customer->name }}</p>
        <p><strong>Atendido por:</strong> {{ $order->user->name }}</p>
        <p><strong>Estado:</strong> {{ $order->status }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unit.</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Bs. {{ $item->unit_price }}</td>
                    <td>Bs. {{ $item->subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Total: Bs. {{ $order->total }}
    </div>

</body>

</html>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .header p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Invoice {{ $order->id_checkout }}</h1>
            <p>Tanggal Pesan: {{ $order->tgl_pesan }}</p>
            <p>Status Pesanan: {{ $order->status_pesanan }}</p>
        </div>
        <div class="details">
            <p><strong>Nama:</strong> {{ $order->fname }}</p>
            <p><strong>Alamat:</strong> {{ $order->houseadd }}, {{ $order->apartment }}, {{ $order->city }}, {{ $order->province }}, {{ $order->zipcode }}</p>
            <p><strong>Telepon:</strong> {{ $order->phone }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $order->metode_pembayaran }}</p>
        </div>
        <h2>Detail Invoice</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->nama_barang }}</td>
                        <td>{{ $invoice->jumlah_barang }}</td>
                        <td>{{ number_format($invoice->total_harga, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total">
            <p>Total: {{ number_format($order->invoices->sum('total_harga'), 2) }}</p>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>

<head>
    <title>E-Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .ticket {
            border: 2px dashed #333;
            padding: 20px;
            margin: 20px 0;
        }

        .ticket-header {
            text-align: center;
            background: #f8f9fa;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h2>E-Ticket Pembelian Berhasil</h2>

    <div class="ticket">
        <div class="ticket-header">
            <h3>🎫 E-TICKET</h3>
            <p><strong>Order ID: {{ $ticket->order_id }}</strong></p>
        </div>

        <table width="100%">
            <tr>
                <td><strong>Nama:</strong></td>
                <td>{{ $ticket->nama }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $ticket->email }}</td>
            </tr>
            <tr>
                <td><strong>No. Telepon:</strong></td>
                <td>{{ $ticket->no_telp }}</td>
            </tr>
            <tr>
                <td><strong>Alamat:</strong></td>
                <td>{{ $ticket->alamat }}</td>
            </tr>
            <tr>
                <td><strong>Jumlah Tiket:</strong></td>
                <td>{{ $ticket->qty }}</td>
            </tr>
            <tr>
                <td><strong>Total Harga:</strong></td>
                <td>Rp {{ number_format($ticket->total_price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td><strong>Status:</strong></td>
                <td>{{ strtoupper($ticket->status) }}</td>
            </tr>
        </table>

        <div style="margin-top: 20px; padding: 15px; background: #e9ecef;">
            <p><strong>Penting:</strong> Simpan e-ticket ini sebagai bukti pembelian. Tunjukkan e-ticket ini saat masuk
                ke acara.</p>
        </div>
    </div>

    <p>Terima kasih telah menggunakan layanan kami!</p>
</body>

</html>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Berhasil</title>
    <style>
        body { font-family: Arial; background: #f8f8f8; margin: 0; }
        .container { width: 80%; margin: auto; padding: 40px 0; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,.08); text-align: center; }
        .success { color: #28a745; font-size: 48px; margin-bottom: 20px; }
        .btn { background: #007bff; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="success">✓</div>
        <h1>Pembayaran Berhasil!</h1>
        <p>Terima kasih, {{ auth()->user()->name }}. Pesanan Anda untuk <strong>{{ $order->product->title }}</strong> telah dikonfirmasi.</p>
        <p>Total pembayaran: Rp {{ number_format($order->total, 0, ',', '.') }}</p>
        <a href="{{ route('user.products') }}" class="btn">Kembali ke Daftar E-Book</a>
    </div>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <style>
        body { font-family: Arial; background: #f8f8f8; margin: 0; }
        .container { width: 80%; margin: auto; padding: 40px 0; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,.08); }
        h1 { margin-top: 0; }
        .detail { margin: 20px 0; }
        .btn { background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-size: 16px; text-decoration: none; display: inline-block; }
        .btn:hover { background: #218838; }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h1>Konfirmasi Pembayaran</h1>
        <div class="detail">
            <p><strong>Produk:</strong> {{ $order->product->title }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
        </div>

        <form action="{{ route('user.payment.process', $order->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn">Bayar Sekarang (Simulasi)</button>
        </form>
        <br>
        <a href="{{ route('user.products') }}" style="color: #111;">← Kembali ke Daftar</a>
    </div>
</div>
</body>
</html>
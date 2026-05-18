<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja | BukuKu</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #eef2f6 100%);
            color: #1a1a1a;
            min-height: 100vh;
        }

        /* Navbar Premium */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(15, 76, 129, 0.1);
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: 800;
            font-size: 1.5rem;
            background: linear-gradient(135deg, #0F4C81 0%, #2A6FA8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .username {
            font-size: 0.9rem;
            font-weight: 500;
            color: #4a4a4a;
            background: rgba(15, 76, 129, 0.08);
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
        }

        .logout-btn {
            border: 1.5px solid rgba(15, 76, 129, 0.3);
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            color: #0F4C81;
            text-decoration: none;
            transition: all 0.3s;
            background: transparent;
        }

        .logout-btn:hover {
            background: #0F4C81;
            color: white;
            border-color: #0F4C81;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(15, 76, 129, 0.2);
        }

        /* Container Utama */
        .main-container {
            max-width: 1200px;
            margin: 2.5rem auto;
            padding: 0 2rem;
        }

        /* Header Section */
        .page-header {
            background: white;
            border-radius: 32px;
            padding: 2rem 2.5rem;
            margin-bottom: 2.5rem;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.05),
                0 8px 24px rgba(15, 76, 129, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.5);
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(15,76,129,0.03) 0%, transparent 70%);
            animation: rotate 30s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .header-content {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-title h1 {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #0F4C81 0%, #2A6FA8 70%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.3rem;
            letter-spacing: -0.5px;
        }

        .header-subtitle {
            color: #666;
            font-size: 0.95rem;
        }

        .header-stats {
            background: rgba(15, 76, 129, 0.08);
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            color: #0F4C81;
        }

        /* Cart Card */
        .cart-card {
            background: white;
            border-radius: 32px;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(15, 76, 129, 0.1);
        }

        /* Table Styles */
        .cart-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 1rem;
        }

        .cart-table thead th {
            text-align: left;
            padding: 0.5rem 0.5rem 1rem 0.5rem;
            font-weight: 700;
            font-size: 0.85rem;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid rgba(15, 76, 129, 0.1);
        }

        .cart-table tbody tr {
            background: #f8fafd;
            border-radius: 20px;
            transition: all 0.3s;
        }

        .cart-table tbody tr:hover {
            background: #f0f4fa;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 76, 129, 0.1);
        }

        .cart-table td {
            padding: 1rem 0.5rem;
            font-size: 0.95rem;
        }

        /* Product Info */
        .product-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .product-image {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            object-fit: cover;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border: 2px solid white;
        }

        .product-details {
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-weight: 700;
            color: #1A2B3C;
            margin-bottom: 0.2rem;
            font-size: 1rem;
        }

        .product-id {
            font-size: 0.7rem;
            color: #999;
        }

        /* Price */
        .price {
            font-weight: 700;
            color: #0F4C81;
            white-space: nowrap;
        }

        /* Quantity Control */
        .qty-control {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: white;
            padding: 0.3rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(15, 76, 129, 0.1);
            width: fit-content;
        }

        .qty-btn {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            border: none;
            background: white;
            color: #0F4C81;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
        }

        .qty-btn:hover {
            background: #0F4C81;
            color: white;
            transform: scale(1.1);
        }

        .qty-number {
            min-width: 30px;
            text-align: center;
            font-weight: 600;
            color: #1A2B3C;
        }

        /* Subtotal */
        .subtotal {
            font-weight: 700;
            color: #0F4C81;
            font-size: 1rem;
        }

        /* Delete Button */
        .btn-delete {
            background: rgba(244, 67, 54, 0.1);
            border: none;
            color: #F44336;
            width: 36px;
            height: 36px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1.1rem;
        }

        .btn-delete:hover {
            background: #F44336;
            color: white;
            transform: scale(1.1);
            box-shadow: 0 6px 14px rgba(244, 67, 54, 0.3);
        }

        /* Total Section */
        .total-section {
            margin-top: 2.5rem;
            padding-top: 1.5rem;
            border-top: 2px solid rgba(15, 76, 129, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .total-info {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
        }

        .total-label {
            font-size: 0.9rem;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .total-price {
            font-size: 2rem;
            font-weight: 800;
            color: #0F4C81;
            line-height: 1;
        }

        .total-note {
            font-size: 0.8rem;
            color: #999;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.9rem 2rem;
            border-radius: 50px;
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
        }

        .btn-outline {
            background: white;
            color: #0F4C81;
            border: 2px solid rgba(15, 76, 129, 0.2);
        }

        .btn-outline:hover {
            border-color: #0F4C81;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(15, 76, 129, 0.1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #0F4C81, #1B5A9C);
            color: white;
            box-shadow: 0 8px 20px rgba(15, 76, 129, 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(15, 76, 129, 0.35);
        }

        .btn-primary:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 32px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .empty-illustration {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #f8fafd, #f0f4fa);
            border-radius: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 3rem;
            color: #0F4C81;
            opacity: 0.5;
        }

        .empty-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1A2B3C;
            margin-bottom: 0.5rem;
        }

        .empty-text {
            color: #666;
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 2rem;
            color: #999;
            font-size: 0.85rem;
            border-top: 1px solid rgba(15, 76, 129, 0.1);
            margin-top: 3rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .nav-container {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-right {
                width: 100%;
                justify-content: center;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
            }

            .cart-table {
                font-size: 0.85rem;
            }

            .product-info {
                flex-direction: column;
                text-align: center;
            }

            .qty-control {
                margin: 0 auto;
            }

            .total-section {
                flex-direction: column;
                text-align: center;
            }

            .action-buttons {
                width: 100%;
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-container">
        <a href="{{ route('user.products') }}" class="logo">BukuKu</a>
        <div class="nav-right">
            <span class="username">{{ auth()->user()->name ?? 'User' }}</span>
            <a href="#" class="logout-btn"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </div>
    </div>
</nav>

<div class="main-container">
    
    <!-- Header Section -->
    <div class="page-header">
        <div class="header-content">
            <div class="header-title">
                <h1>Keranjang Belanja</h1>
                <div class="header-subtitle">Periksa kembali pesanan Anda sebelum checkout</div>
            </div>
            @php $cart = session()->get('cart', []); @endphp
            <div class="header-stats">
                {{ count($cart) }} Item
            </div>
        </div>
    </div>

    @if(empty($cart))
        <!-- Empty State -->
        <div class="empty-state">
            <div class="empty-illustration">
                🛒
            </div>
            <div class="empty-title">Keranjang Kosong</div>
            <div class="empty-text">Anda belum menambahkan buku apapun ke keranjang</div>
            <a href="{{ route('user.products') }}" class="btn-primary btn">
                Lihat Koleksi Buku
            </a>
        </div>
    @else
        <!-- Cart Card -->
        <div class="cart-card">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php 
                            $subtotal = $item['price'] * $item['quantity']; 
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="{{ asset('storage/'.$item['image']) }}" 
                                         alt="{{ $item['title'] }}"
                                         class="product-image">
                                    <div class="product-details">
                                        <span class="product-title">{{ $item['title'] }}</span>
                                        <span class="product-id">ID: #{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="price">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <div class="qty-control">
                                    <form action="{{ route('user.cart.decrement', $id) }}" method="POST">
                                        @csrf
                                        <button class="qty-btn">−</button>
                                    </form>
                                    <span class="qty-number">{{ $item['quantity'] }}</span>
                                    <form action="{{ route('user.cart.increment', $id) }}" method="POST">
                                        @csrf
                                        <button class="qty-btn">+</button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <span class="subtotal">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </td>
                            <td>
                                <form action="{{ route('user.cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button class="btn-delete" title="Hapus">
                                        🗑
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Total Section -->
            <div class="total-section">
                <div class="total-info">
                    <span class="total-label">Total Belanja</span>
                    <span class="total-price">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    <span class="total-note">Sudah termasuk pajak</span>
                </div>
                <div class="action-buttons">
                    <a href="{{ route('user.products') }}" class="btn btn-outline">
                        Lanjut Belanja
                    </a>
                    <a href="{{ route('user.checkout.index') }}" class="btn btn-primary">
                        Checkout
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- Footer -->
    <div class="footer">
        © {{ date('Y') }} BukuKu. Semua hak dilindungi.
    </div>
</div>

</body>
</html>
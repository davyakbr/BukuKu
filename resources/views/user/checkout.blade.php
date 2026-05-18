<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | BukuKu</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-weight: 700;
            font-size: 1.4rem;
            color: #0F4C81;
            text-decoration: none;
            letter-spacing: -0.3px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .username {
            font-weight: 500;
            color: #475569;
            font-size: 0.95rem;
        }

        .logout-btn {
            background: transparent;
            border: 1px solid #e2e8f0;
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: 500;
            color: #64748b;
            text-decoration: none;
            transition: all 0.2s;
        }

        .logout-btn:hover {
            background: #0F4C81;
            border-color: #0F4C81;
            color: white;
        }

        /* Container */
        .container {
            max-width: 1000px;
            margin: 2.5rem auto;
            padding: 0 2rem;
        }

        /* Header */
        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            color: #0F4C81;
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .page-header p {
            color: #64748b;
            font-size: 0.95rem;
            margin-top: 0.3rem;
        }

        /* Layout Grid */
        .checkout-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 2rem;
        }

        /* Order Summary Card */
        .summary-card {
            background: white;
            border-radius: 24px;
            padding: 1.8rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
            border: 1px solid #e2e8f0;
            height: fit-content;
        }

        .summary-card h3 {
            color: #0F4C81;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .summary-items {
            margin-bottom: 1.5rem;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.8rem 0;
            border-bottom: 1px dashed #e2e8f0;
        }

        .item-info h4 {
            font-size: 0.95rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.2rem;
        }

        .item-info p {
            font-size: 0.8rem;
            color: #64748b;
        }

        .item-price {
            text-align: right;
        }

        .item-price .price {
            font-weight: 600;
            color: #0F4C81;
            font-size: 0.95rem;
        }

        .summary-total {
            background: #f8fafc;
            padding: 1.2rem;
            border-radius: 16px;
            margin-top: 1rem;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.95rem;
            color: #475569;
            margin-bottom: 0.5rem;
        }

        .grand-total {
            font-weight: 700;
            color: #0F4C81;
            font-size: 1.1rem;
            border-top: 1px solid #e2e8f0;
            padding-top: 0.8rem;
            margin-top: 0.5rem;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 24px;
            padding: 1.8rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
            border: 1px solid #e2e8f0;
        }

        .form-card h3 {
            color: #0F4C81;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .form-group {
            margin-bottom: 1.3rem;
        }

        label {
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
            color: #475569;
            margin-bottom: 0.4rem;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.2s;
            background: white;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #0F4C81;
            box-shadow: 0 0 0 3px rgba(15, 76, 129, 0.1);
        }

        /* Nomor Telepon (Opsional) */
        .optional-badge {
            font-size: 0.7rem;
            color: #94a3b8;
            font-weight: 400;
            margin-left: 0.3rem;
        }

        /* Alert */
        .alert {
            background: #fee2e2;
            color: #b91c1c;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border: 1px solid #fecaca;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .btn {
            flex: 1;
            padding: 0.9rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
            border: none;
            text-align: center;
            font-family: 'Inter', sans-serif;
        }

        .btn-outline {
            background: white;
            color: #0F4C81;
            border: 1px solid #e2e8f0;
        }

        .btn-outline:hover {
            background: #f8fafc;
            border-color: #0F4C81;
        }

        .btn-primary {
            background: #0F4C81;
            color: white;
        }

        .btn-primary:hover {
            background: #1e5a9c;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .checkout-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .container {
                padding: 0 1rem;
            }

            .navbar {
                padding: 1rem;
            }

            .nav-container {
                flex-direction: column;
                gap: 1rem;
            }

            .user-menu {
                width: 100%;
                justify-content: space-between;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('user.products') }}" class="logo">BukuKu</a>

            <div class="user-menu">
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

    <div class="container">
        
        <!-- Header -->
        <div class="page-header">
            <h1>Checkout</h1>
            <p>Lengkapi data diri untuk menyelesaikan pesanan</p>
        </div>

        @if(session('error'))
            <div class="alert">{{ session('error') }}</div>
        @endif

        <div class="checkout-grid">
            
            <!-- Order Summary -->
            <div class="summary-card">
                <h3>Ringkasan Pesanan</h3>
                
                <div class="summary-items">
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <div class="summary-item">
                            <div class="item-info">
                                <h4>{{ $item['title'] }}</h4>
                                <p>{{ $item['quantity'] }} x Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                            </div>
                            <div class="item-price">
                                <span class="price">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="summary-total">
                    <div class="total-row">
                        <span>Subtotal</span>
                        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <div class="total-row">
                        <span>Biaya Layanan</span>
                        <span>Rp 0</span>
                    </div>
                    <div class="total-row grand-total">
                        <span>Total</span>
                        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <!-- Form Checkout -->
            <div class="form-card">
                <h3>Data Pembeli</h3>

                <form action="{{ route('user.checkout.process') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="customer_name" value="{{ auth()->user()->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ auth()->user()->email }}" required>
                    </div>

                

                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <select name="payment_method" required>
                            <option value="transfer_bca">Transfer Bank BCA</option>
                            <option value="transfer_mandiri">Transfer Bank Mandiri</option>
                            <option value="transfer_bri">Transfer Bank BRI</option>
                            <option value="credit_card">Kartu Kredit</option>
                            <option value="e_wallet">E-Wallet</option>
                        </select>
                    </div>

                    <div class="action-buttons">
                        <a href="{{ route('user.cart.index') }}" class="btn btn-outline">
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Bayar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
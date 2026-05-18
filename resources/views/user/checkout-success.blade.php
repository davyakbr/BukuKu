<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran - {{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }} | BukuKu</title>
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
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
        }

        /* Background Pattern */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(15, 76, 129, 0.03) 0%, transparent 30%),
                radial-gradient(circle at 80% 70%, rgba(15, 76, 129, 0.03) 0%, transparent 30%);
            pointer-events: none;
        }

        /* Card Utama */
        .struk-card {
            max-width: 600px;
            width: 100%;
            background: white;
            border-radius: 32px;
            box-shadow: 0 30px 60px rgba(15, 76, 129, 0.15);
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
            position: relative;
            z-index: 1;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header */
        .struk-header {
            background: linear-gradient(135deg, #0F4C81 0%, #2A6FA8 100%);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .struk-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            right: 0;
            height: 20px;
            background: white;
            border-radius: 50% 50% 0 0;
        }

        .success-badge {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            color: white;
            padding: 10px 25px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .struk-header h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .order-id {
            font-size: 16px;
            background: rgba(255, 255, 255, 0.15);
            padding: 8px 20px;
            border-radius: 50px;
            display: inline-block;
            font-weight: 500;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Body */
        .struk-body {
            padding: 40px 30px;
            background: white;
        }

        /* Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
            background: linear-gradient(135deg, #f8fafd, #f0f4fa);
            padding: 20px;
            border-radius: 20px;
            border: 1px solid rgba(15, 76, 129, 0.1);
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-size: 11px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .info-value {
            font-size: 15px;
            font-weight: 600;
            color: #1A2B3C;
        }

        /* Items Section */
        .items-section {
            margin-bottom: 30px;
        }

        .items-header {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 2px solid #0F4C81;
            margin-bottom: 15px;
            font-weight: 700;
            color: #1A2B3C;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px dashed rgba(15, 76, 129, 0.2);
            transition: background 0.3s;
        }

        .item-row:hover {
            background: rgba(15, 76, 129, 0.02);
        }

        .item-info {
            flex: 2;
        }

        .item-name {
            font-weight: 700;
            color: #1A2B3C;
            margin-bottom: 4px;
            font-size: 15px;
        }

        .item-detail {
            font-size: 13px;
            color: #666;
        }

        .item-price {
            flex: 1;
            text-align: right;
            font-weight: 700;
            color: #0F4C81;
            font-size: 15px;
        }

        /* Total Section */
        .total-section {
            background: linear-gradient(135deg, #f8fafd, #f0f4fa);
            padding: 25px;
            border-radius: 20px;
            margin-top: 20px;
            border: 1px solid rgba(15, 76, 129, 0.1);
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 15px;
            color: #555;
        }

        .total-row.grand-total {
            font-size: 20px;
            font-weight: 800;
            color: #0F4C81;
            border-top: 2px solid #0F4C81;
            padding-top: 15px;
            margin-top: 15px;
        }

        .payment-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #4CAF50;
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            margin-top: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 10px rgba(76, 175, 80, 0.2);
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #f8fafd, #f0f4fa);
            padding: 30px;
            text-align: center;
            border-top: 1px solid rgba(15, 76, 129, 0.1);
        }

        .thank-you {
            font-size: 20px;
            color: #1A2B3C;
            margin-bottom: 8px;
            font-weight: 700;
        }

        .thank-you span {
            color: #0F4C81;
        }

        .footer p {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 160px;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .btn-print {
            background: linear-gradient(135deg, #0F4C81, #2A6FA8);
            color: white;
            box-shadow: 0 8px 20px rgba(15, 76, 129, 0.3);
        }

        .btn-print:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(15, 76, 129, 0.4);
        }

        .btn-back {
            background: white;
            color: #0F4C81;
            border: 2px solid rgba(15, 76, 129, 0.3);
        }

        .btn-back:hover {
            background: #0F4C81;
            color: white;
            border-color: #0F4C81;
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(15, 76, 129, 0.2);
        }

        /* Note */
        .footer-note {
            color: #999;
            font-size: 12px;
            margin-top: 20px;
        }

        /* Print styles */
        @media print {
            body {
                background: white;
                padding: 0;
            }
            
            .struk-card {
                box-shadow: none;
                max-width: 100%;
                border-radius: 0;
            }
            
            .struk-header {
                background: #f8fafd !important;
                color: #1A2B3C;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            .success-badge, .payment-status {
                background: #4CAF50 !important;
                color: white !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            .btn-print, .btn-back, .button-group {
                display: none;
            }
        }

        /* Responsive */
        @media (max-width: 480px) {
            .struk-body {
                padding: 30px 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .total-row.grand-total {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="struk-card">
        <!-- Header -->
        <div class="struk-header">
            <div class="success-badge">
                ✓ Pembayaran Berhasil
            </div>
            <h1>STRUK PEMBELIAN</h1>
            <div class="order-id">
                #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
            </div>
        </div>

        <!-- Body -->
        <div class="struk-body">
            <!-- Informasi Grid -->
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Tanggal</span>
                    <span class="info-value">{{ $order->created_at->format('d/m/Y') }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Waktu</span>
                    <span class="info-value">{{ $order->created_at->format('H:i') }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Nama Pelanggan</span>
                    <span class="info-value">{{ $order->customer_name }}</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Metode Pembayaran</span>
                    <span class="info-value">{{ $order->payment_method ?? 'Transfer Bank' }}</span>
                </div>
            </div>

            <!-- Daftar Produk -->
            <div class="items-section">
                <div class="items-header">
                    <span>Produk</span>
                    <span>Subtotal</span>
                </div>

                @foreach($order->items as $item)
                <div class="item-row">
                    <div class="item-info">
                        <div class="item-name">{{ $item->product->name }}</div>
                        <div class="item-detail">{{ $item->quantity }} × Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                    </div>
                    <div class="item-price">
                        Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Total -->
            <div class="total-section">
                <div class="total-row">
                    <span>Subtotal</span>
                    <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                </div>
                <div class="total-row">
                    <span>Biaya Layanan</span>
                    <span>Rp 0</span>
                </div>
                <div class="total-row grand-total">
                    <span>Total Pembayaran</span>
                    <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                </div>

                <div class="payment-status">
                    ✓ Status: LUNAS
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="thank-you">
                Terima kasih, <span>{{ $order->customer_name }}</span>
            </div>
            <p>Pesanan Anda akan segera diproses</p>
            
            <div class="button-group">
                <button onclick="window.print()" class="btn btn-print">
                    🖨️ Cetak Struk
                </button>
                
                <a href="{{ route('user.products') }}" class="btn btn-back">
                    ← Kembali Belanja
                </a>
            </div>

            <div class="footer-note">
                Simpan struk ini sebagai bukti pembayaran yang sah
            </div>
        </div>
    </div>
</body>
</html>
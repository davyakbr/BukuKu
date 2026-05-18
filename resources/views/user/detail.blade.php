<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->title }} | BukuKu</title>
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
            padding: 40px 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Background Pattern Subtle */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(15, 76, 129, 0.03) 0%, transparent 30%),
                radial-gradient(circle at 80% 70%, rgba(15, 76, 129, 0.03) 0%, transparent 30%),
                radial-gradient(circle at 40% 80%, rgba(15, 76, 129, 0.02) 0%, transparent 40%);
            pointer-events: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* Navbar Mini */
        .mini-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 1rem 2rem;
            border-radius: 60px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(15, 76, 129, 0.1);
        }

        .logo {
            font-weight: 800;
            font-size: 1.3rem;
            background: linear-gradient(135deg, #0F4C81 0%, #2A6FA8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-link {
            color: #0F4C81;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #1E5A9C;
        }

        .cart-badge {
            background: #0F4C81;
            color: white;
            padding: 0.2rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Back Button */
        .back-button {
            margin-bottom: 20px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #0F4C81;
            text-decoration: none;
            font-weight: 600;
            padding: 10px 20px;
            background: white;
            border-radius: 50px;
            transition: all 0.3s;
            border: 1px solid rgba(15, 76, 129, 0.2);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
        }

        .back-link:hover {
            background: #0F4C81;
            color: white;
            transform: translateX(-5px);
            border-color: #0F4C81;
        }

        /* Main Card */
        .detail-card {
            background: white;
            border-radius: 48px;
            box-shadow: 
                0 30px 60px rgba(15, 76, 129, 0.08),
                0 0 0 1px rgba(15, 76, 129, 0.05);
            padding: 50px;
            animation: slideUp 0.6s ease-out;
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

        /* Layout Grid */
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 50px;
            align-items: start;
        }

        /* Left Column - Image */
        .image-section {
            position: relative;
        }

        .image-wrapper {
            position: relative;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 
                0 25px 40px -15px rgba(15, 76, 129, 0.3),
                0 0 0 1px rgba(15, 76, 129, 0.1) inset;
            background: linear-gradient(135deg, #f8fafd, #f0f4fa);
            aspect-ratio: 3/4;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .image-wrapper:hover .product-image {
            transform: scale(1.05);
        }

        .image-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #0F4C81, #2A6FA8);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: 0 10px 20px rgba(15, 76, 129, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
            z-index: 2;
        }

        /* Right Column - Info */
        .info-section {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        /* Title */
        .title-wrapper {
            border-bottom: 2px solid rgba(15, 76, 129, 0.1);
            padding-bottom: 20px;
        }

        .category-chip {
            display: inline-block;
            background: rgba(15, 76, 129, 0.08);
            color: #0F4C81;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 15px;
            border: 1px solid rgba(15, 76, 129, 0.2);
        }

        h1 {
            font-size: 2.8rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 15px;
            color: #1A2B3C;
            letter-spacing: -0.5px;
        }

        .price {
            font-size: 2.2rem;
            font-weight: 800;
            color: #0F4C81;
            margin-bottom: 5px;
        }

        .product-id {
            font-size: 0.85rem;
            color: #999;
            letter-spacing: 0.5px;
        }

        /* Info Cards */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin: 10px 0;
        }

        .info-card {
            background: linear-gradient(135deg, #f8fafd, #f0f4fa);
            padding: 20px 15px;
            border-radius: 24px;
            text-align: center;
            border: 1px solid rgba(15, 76, 129, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(15, 76, 129, 0.1);
        }

        .info-icon {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #0F4C81;
        }

        .info-card .info-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #666;
            margin-bottom: 5px;
        }

        .info-card .info-value {
            font-weight: 700;
            color: #1A2B3C;
            font-size: 1rem;
        }

        /* Description */
        .description-section {
            background: linear-gradient(135deg, #f8fafd, #ffffff);
            padding: 30px;
            border-radius: 28px;
            border: 1px solid rgba(15, 76, 129, 0.1);
        }

        .description-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1A2B3C;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .description-title span {
            width: 4px;
            height: 20px;
            background: linear-gradient(135deg, #0F4C81, #2A6FA8);
            border-radius: 2px;
        }

        .description-content {
            line-height: 1.8;
            color: #555;
            font-size: 0.95rem;
        }

        /* Action Buttons */
        .action-section {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .btn {
            flex: 1;
            padding: 16px 28px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            letter-spacing: 0.3px;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid rgba(15, 76, 129, 0.3);
            color: #0F4C81;
        }

        .btn-outline:hover {
            background: #0F4C81;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(15, 76, 129, 0.2);
            border-color: #0F4C81;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0F4C81, #1B5A9C);
            color: white;
            box-shadow: 0 10px 25px rgba(15, 76, 129, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 35px rgba(15, 76, 129, 0.4);
        }

        /* Related Products Section */
        .related-section {
            margin-top: 60px;
        }

        .related-title {
            color: #1A2B3C;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
        }

        .related-card {
            background: white;
            border-radius: 24px;
            padding: 15px;
            text-decoration: none;
            transition: all 0.3s;
            border: 1px solid rgba(15, 76, 129, 0.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02);
            display: block;
        }

        .related-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 30px rgba(15, 76, 129, 0.15);
            border-color: rgba(15, 76, 129, 0.2);
        }

        .related-image {
            width: 100%;
            aspect-ratio: 3/4;
            object-fit: cover;
            border-radius: 16px;
            margin-bottom: 12px;
            background: #f8fafd;
        }

        .related-title-text {
            font-weight: 600;
            color: #1A2B3C;
            font-size: 0.9rem;
            margin-bottom: 5px;
            line-height: 1.4;
        }

        .related-price {
            font-weight: 700;
            color: #0F4C81;
            font-size: 0.9rem;
        }

        /* Floating Action Button (Mobile) */
        .floating-cart {
            display: none;
            position: fixed;
            bottom: 20px;
            left: 20px;
            right: 20px;
            background: linear-gradient(135deg, #0F4C81, #1B5A9C);
            color: white;
            padding: 16px;
            border-radius: 50px;
            text-align: center;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 10px 30px rgba(15, 76, 129, 0.4);
            z-index: 100;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Responsive */
        @media (max-width: 968px) {
            .detail-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            h1 {
                font-size: 2.2rem;
            }

            .price {
                font-size: 1.8rem;
            }

            .detail-card {
                padding: 30px;
            }

            .info-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 15px;
            }

            .mini-nav {
                display: none;
            }

            .detail-card {
                padding: 20px;
                border-radius: 32px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .action-section {
                display: none;
            }

            .floating-cart {
                display: block;
            }

            h1 {
                font-size: 1.8rem;
            }

            .related-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        
        <!-- Mini Navbar -->
        <div class="mini-nav">
            <a href="{{ route('user.products') }}" class="logo">BukuKu</a>
            <div class="nav-links">
                <a href="{{ route('user.cart.index') }}" class="nav-link">
                    Keranjang 
                    @php $cartCount = count(session()->get('cart', [])); @endphp
                    @if($cartCount > 0)
                        <span class="cart-badge">{{ $cartCount }}</span>
                    @endif
                </a>
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Keluar
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </div>
        </div>

        <!-- Back Button -->
        <div class="back-button">
            <a href="{{ url('/home') }}" class="back-link">
                <span style="font-size: 1.2rem;">←</span> 
                Kembali ke Daftar Buku
            </a>
        </div>

        <!-- Main Detail Card -->
        <div class="detail-card">
            <div class="detail-grid">
                
                <!-- Left Column - Image -->
                <div class="image-section">
                    <div class="image-wrapper">
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" 
                                 alt="{{ $product->title }}" 
                                 class="product-image">
                        @else
                            <div style="display: flex; align-items: center; justify-content: center; height: 100%; font-size: 5rem; color: #ccc;">
                                📘
                            </div>
                        @endif
                        <div class="image-badge">
                            Tersedia
                        </div>
                    </div>
                </div>

                <!-- Right Column - Info -->
                <div class="info-section">
                    
                    <!-- Title & Price -->
                    <div class="title-wrapper">
                        @if($product->category)
                            <span class="category-chip">{{ $product->category->name }}</span>
                        @endif
                        <h1>{{ $product->title }}</h1>
                        <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        
                    </div>

                    <!-- Info Cards -->
                    <div class="info-grid">
                        @if($product->publisher)
                        <div class="info-card">
                            <div class="info-icon">📚</div>
                            <div class="info-label">Penerbit</div>
                            <div class="info-value">{{ $product->publisher }}</div>
                        </div>
                        @endif

                        @if($product->publish_year)
                        <div class="info-card">
                            <div class="info-icon">📅</div>
                            <div class="info-label">Tahun Terbit</div>
                            <div class="info-value">{{ $product->publish_year }}</div>
                        </div>
                        @endif

                        <div class="info-card">
                            <div class="info-icon">📖</div>
                            <div class="info-label">Kategori</div>
                            <div class="info-value">{{ $product->category->name ?? 'Umum' }}</div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="description-section">
                        <div class="description-title">
                            <span></span>
                            Sinopsis
                        </div>
                        <div class="description-content">
                            {{ $product->description ?? 'Tidak ada deskripsi untuk buku ini.' }}
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-section">
                        <form action="{{ route('user.cart.add', $product->id) }}" method="POST" style="flex: 1;">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                <span>+</span> Tambah ke Keranjang
                            </button>
                        </form>
                        <a href="{{ route('user.products') }}" class="btn btn-outline">
                            Kembali
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Related Products Section (Jika Ada) -->
        @if(isset($relatedProducts) && $relatedProducts->count() > 0)
        <div class="related-section">
            <h2 class="related-title">Buku Lainnya</h2>
            <div class="related-grid">
                @foreach($relatedProducts as $related)
                <a href="{{ url('/product/'.$related->id) }}" class="related-card">
                    @if($related->image)
                        <img src="{{ asset('storage/'.$related->image) }}" 
                             alt="{{ $related->title }}" 
                             class="related-image">
                    @else
                        <div style="height: 100%; background: #f0f0f0; border-radius: 16px; margin-bottom: 12px; aspect-ratio: 3/4; display: flex; align-items: center; justify-content: center;">
                            <span style="font-size: 2rem; color: #ccc;">📘</span>
                        </div>
                    @endif
                    <div class="related-title-text">{{ Str::limit($related->title, 30) }}</div>
                    <div class="related-price">Rp {{ number_format($related->price, 0, ',', '.') }}</div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>

    <!-- Floating Cart Button for Mobile -->
    <form action="{{ route('user.cart.add', $product->id) }}" method="POST" class="floating-cart">
        @csrf
        <button type="submit" style="background: none; border: none; color: white; font-size: 1rem; font-weight: 700; width: 100%;">
            + Tambah ke Keranjang
        </button>
    </form>

</body>
</html>
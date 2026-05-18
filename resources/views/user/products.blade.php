    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar E-Book | BukuKu</title>
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

            .cart-link {
                position: relative;
                text-decoration: none;
                color: #0F4C81;
                font-size: 1.3rem;
                transition: transform 0.3s;
            }

            .cart-link:hover {
                transform: translateY(-2px);
            }

            .cart-badge {
                position: absolute;
                top: -8px;
                right: -10px;
                background: linear-gradient(135deg, #0F4C81, #2A6FA8);
                color: white;
                border-radius: 50px;
                width: 22px;
                height: 22px;
                font-size: 0.7rem;
                font-weight: 600;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 8px rgba(15, 76, 129, 0.3);
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
                max-width: 1400px;
                margin: 2.5rem auto;
                padding: 0 2rem;
            }

            /* Header Section */
            .page-header {
                background: white;
                border-radius: 32px;
                padding: 2.5rem;
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
                font-size: 2.5rem;
                font-weight: 800;
                background: linear-gradient(135deg, #0F4C81 0%, #2A6FA8 70%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin-bottom: 0.5rem;
                letter-spacing: -1px;
            }

            .header-subtitle {
                display: flex;
                align-items: center;
                gap: 8px;
                color: #666;
                font-size: 1rem;
            }

            .header-subtitle span {
                background: rgba(15, 76, 129, 0.1);
                padding: 0.3rem 1rem;
                border-radius: 50px;
                font-size: 0.85rem;
                font-weight: 600;
                color: #0F4C81;
            }

            .header-stats {
                display: flex;
                gap: 1.5rem;
            }

            .stat-item {
                text-align: right;
            }

            .stat-label {
                font-size: 0.8rem;
                color: #666;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .stat-number {
                font-size: 1.5rem;
                font-weight: 700;
                color: #0F4C81;
                line-height: 1.2;
            }

            /* Alert Success */
            .alert-modern {
                background: linear-gradient(135deg, #E8F5E9, #C8E6C9);
                border: none;
                border-radius: 20px;
                padding: 1.2rem 1.8rem;
                margin-bottom: 2rem;
                display: flex;
                align-items: center;
                gap: 12px;
                color: #2E7D32;
                font-weight: 500;
                box-shadow: 0 4px 12px rgba(46, 125, 50, 0.15);
                border-left: 5px solid #2E7D32;
            }

            /* Search & Filter Section */
            .filter-section {
                margin-bottom: 2.5rem;
            }

            .filter-wrapper {
                display: flex;
                gap: 15px;
                align-items: center;
                background: white;
                padding: 0.5rem;
                border-radius: 60px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                border: 1px solid rgba(15, 76, 129, 0.1);
                flex-wrap: wrap;
            }

            .search-box {
                flex: 2;
                position: relative;
                min-width: 250px;
            }

            .search-icon {
                position: absolute;
                left: 20px;
                top: 50%;
                transform: translateY(-50%);
                color: #999;
                font-size: 1.1rem;
            }

            .search-input {
                width: 100%;
                padding: 1rem 1rem 1rem 3rem;
                border: none;
                border-radius: 50px;
                font-size: 0.95rem;
                transition: all 0.3s;
                background: transparent;
                font-family: 'Plus Jakarta Sans', sans-serif;
            }

            .search-input:focus {
                outline: none;
            }

            .search-input::placeholder {
                color: #aaa;
            }

            .filter-group {
                flex: 1;
                display: flex;
                gap: 10px;
                min-width: 200px;
            }

            .filter-select {
                flex: 1;
                padding: 1rem 1.5rem;
                background: white;
                border: 2px solid rgba(15, 76, 129, 0.1);
                border-radius: 50px;
                font-weight: 600;
                color: #0F4C81;
                font-family: 'Plus Jakarta Sans', sans-serif;
                cursor: pointer;
                transition: all 0.3s;
                appearance: none;
                background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%230F4C81' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
                background-repeat: no-repeat;
                background-position: right 1rem center;
                background-size: 1rem;
            }

            .filter-select:hover {
                border-color: #0F4C81;
            }

            .filter-select:focus {
                outline: none;
                border-color: #0F4C81;
            }

            .reset-btn {
                padding: 1rem 1.5rem;
                background: white;
                border: 2px solid rgba(15, 76, 129, 0.1);
                border-radius: 50px;
                font-weight: 600;
                color: #666;
                font-family: 'Plus Jakarta Sans', sans-serif;
                cursor: pointer;
                transition: all 0.3s;
                white-space: nowrap;
            }

            .reset-btn:hover {
                border-color: #0F4C81;
                color: #0F4C81;
            }

            /* Active Filters */
            .active-filters {
                display: flex;
                gap: 10px;
                flex-wrap: wrap;
                margin-top: 15px;
            }

            .filter-tag {
                background: rgba(15, 76, 129, 0.1);
                color: #0F4C81;
                padding: 0.5rem 1rem;
                border-radius: 50px;
                font-size: 0.85rem;
                font-weight: 600;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }

            .filter-tag button {
                background: none;
                border: none;
                color: #0F4C81;
                cursor: pointer;
                font-size: 1.1rem;
                display: flex;
                align-items: center;
            }

            .filter-tag button:hover {
                opacity: 0.7;
            }

        .product-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr); /* 5 KOLOM */
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

            /* Pastikan semua card memiliki tinggi yang konsisten */
            .product-card {
                background: white;
                border-radius: 24px;
                overflow: hidden;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                border: 1px solid rgba(15, 76, 129, 0.1);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                display: flex;
                flex-direction: column;
                position: relative;
                height: 100%;
                width: 100%;
            }

            /* IMAGE WRAPPER - Ukuran tetap */
            .product-image-wrapper {
                background: linear-gradient(135deg, #f8fafd, #f0f4fa);
                aspect-ratio: 3/4;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 1rem;
                position: relative;
                overflow: hidden;
                width: 100%;
            }

            .product-image {
                max-width: 100%;
                max-height: 100%;
                width: auto;
                height: auto;
                object-fit: contain;
                transition: transform 0.5s;
            }

            /* INFO PRODUK - Flex column untuk merapikan */
            .product-info {
                padding: 1rem 1rem 0.5rem;
                flex: 1;
                display: flex;
                flex-direction: column;
            }

            .product-category {
                display: inline-block;
                background: rgba(15, 76, 129, 0.08);
                color: #0F4C81;
                padding: 0.15rem 0.8rem;
                border-radius: 50px;
                font-size: 0.65rem;
                font-weight: 600;
                margin-bottom: 0.5rem;
                letter-spacing: 0.3px;
                align-self: flex-start;
            }

            .product-title {
                font-size: 0.95rem;
                font-weight: 700;
                color: #1A2B3C;
                margin-bottom: 0.3rem;
                line-height: 1.3;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                min-height: 2.4rem;
            }

            .product-price {
                font-size: 1.1rem;
                font-weight: 800;
                color: #0F4C81;
                margin-top: auto;
            }

            /* ACTION BUTTONS */
            .product-actions {
                display: flex;
                gap: 0.5rem;
                padding: 0 1rem 1rem;
                margin-top: auto;
            }

            .btn {
                flex: 1;
                text-align: center;
                padding: 0.6rem 0;
                border-radius: 50px;
                font-size: 0.8rem;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.3s;
                cursor: pointer;
                border: none;
                font-family: 'Plus Jakarta Sans', sans-serif;
            }

            .btn-outline {
                background: transparent;
                color: #0F4C81;
                border: 2px solid rgba(15, 76, 129, 0.2);
            }

            .btn-outline:hover {
                background: #0F4C81;
                color: white;
                border-color: #0F4C81;
                transform: translateY(-2px);
                box-shadow: 0 8px 16px rgba(15, 76, 129, 0.15);
            }

            .btn-primary {
                background: linear-gradient(135deg, #0F4C81, #1B5A9C);
                color: white;
                border: none;
                box-shadow: 0 5px 12px rgba(15, 76, 129, 0.2);
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(15, 76, 129, 0.25);
            }

            /* Empty State */
            .empty-state-modern {
                text-align: center;
                padding: 4rem 2rem;
                grid-column: 1 / -1;
                background: white;
                border-radius: 32px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                animation: fadeIn 0.5s ease;
            }

            /* PAGINATION */
            .pagination-wrapper {
                margin-top: 3rem;
                display: flex;
                justify-content: center;
                width: 100%;
            }

            .pagination-premium {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                background: white;
                padding: 0.5rem;
                border-radius: 60px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                border: 1px solid rgba(15, 76, 129, 0.1);
                flex-wrap: wrap;
                justify-content: center;
            }

            .pagination-item {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-width: 45px;
                height: 45px;
                border-radius: 50px;
                font-weight: 600;
                color: #555;
                text-decoration: none;
                transition: all 0.3s;
                background: transparent;
                border: 1px solid transparent;
            }

            .pagination-item:hover {
                background: rgba(15, 76, 129, 0.08);
                color: #0F4C81;
                border-color: rgba(15, 76, 129, 0.2);
                transform: translateY(-2px);
            }

            .pagination-item.active {
                background: linear-gradient(135deg, #0F4C81, #2A6FA8);
                color: white;
                box-shadow: 0 8px 16px rgba(15, 76, 129, 0.2);
            }

            .pagination-item.prev-next {
                background: white;
                border: 1px solid rgba(15, 76, 129, 0.2);
                color: #0F4C81;
                padding: 0 1.2rem;
                min-width: auto;
            }

            .pagination-item.prev-next:hover {
                background: #0F4C81;
                color: white;   
                border-color: #0F4C81;
            }

            .pagination-item.disabled {
                opacity: 0.4;
                pointer-events: none;
                background: #f5f5f5;
                color: #999;
            }

            .pagination-dots {
                color: #999;
                font-weight: 600;
                padding: 0 0.5rem;
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
            @media (max-width: 1200px) {
                .product-grid {
                    grid-template-columns: repeat(4, 1fr);
                }
            }

            @media (max-width: 992px) {
                .product-grid {
                    grid-template-columns: repeat(3, 1fr);
                }
            }

            @media (max-width: 768px) {
                .navbar {
                    padding: 1rem;
                }

                .nav-container {
                    flex-direction: column;
                    gap: 1rem;
                }

                .header-content {
                    flex-direction: column;
                    text-align: center;
                }

                .header-stats {
                    justify-content: center;
                }

                .stat-item {
                    text-align: center;
                }

                .filter-wrapper {
                    flex-direction: column;
                    background: transparent;
                    box-shadow: none;
                    padding: 0;
                }

                .search-box, .filter-group {
                    width: 100%;
                }

                .filter-group {
                    flex-direction: column;
                }

                .product-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 1rem;
                }
            }

            @media (max-width: 480px) {
                .product-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body>

    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('user.products') }}" class="logo">BukuKu</a>
            <div class="nav-right">
                <a href="{{ route('user.cart.index') }}" class="cart-link">
                    🛒
                    @php 
                        $cartCount = count(session()->get('cart', [])); 
                    @endphp
                    @if($cartCount > 0)
                        <span class="cart-badge">{{ $cartCount }}</span>
                    @endif
                </a>
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
                    <h1>Daftar E-Book</h1>
                    <div class="header-subtitle">
                        
                    </div>
                </div>
                <div class="header-stats">
                    <div class="stat-item">
                        <div class="stat-label">Total Buku</div>
                        <div class="stat-number" id="totalBuku">{{ $products->total() }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Genre</div>
                        <div class="stat-number" id="totalGenre">{{ $categories->count() ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert-modern">
                ✓ {{ session('success') }}
            </div>
        @endif

        <!-- Search & Filter Section -->
        <div class="filter-section">
            <div class="filter-wrapper">
                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input type="text" class="search-input" placeholder="Cari judul buku..." id="searchInput">
                </div>
                <div class="filter-group">
                    <select class="filter-select" id="genreFilter">
                        <option value="">Semua Genre</option>
                        @foreach($categories ?? [] as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button class="reset-btn" id="resetFilter" title="Reset filter">
                        ⟲ Reset
                    </button>
                </div>
            </div>

            <!-- Active Filters Tags -->
            <div class="active-filters" id="activeFilters"></div>
        </div>

        <!-- Product Grid -->
        <div class="product-grid" id="productGrid">
            @forelse($products as $product)
                <div class="product-card" 
                    data-title="{{ strtolower($product->title) }}"
                    data-category="{{ strtolower($product->category->name ?? '') }}">
                    <div class="product-image-wrapper">
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" 
                                alt="{{ $product->title }}"
                                class="product-image">
                        @else
                            <div style="font-size: 3rem; color: #ccc;">📘</div>
                        @endif
                    </div>

                    <div class="product-info">
                        @if($product->category)
                            <span class="product-category">{{ $product->category->name }}</span>
                        @endif
                        <h3 class="product-title">{{ $product->title }}</h3>
                        
                        {{-- PERBAIKAN FORMAT HARGA --}}
                        <div class="product-price">
                            @if(is_numeric($product->price))
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            @else
                                Rp 0
                            @endif
                        </div>
                    </div>

                    <div class="product-actions">
                        <a href="{{ url('/product/'.$product->id) }}" class="btn btn-outline">
                            Detail
                        </a>
                        <form action="{{ route('user.cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                + Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty-state-modern" id="initialEmptyState">
                    <div class="empty-illustration">📚</div>
                    <div class="empty-title">Belum Ada Buku</div>
                    <div class="empty-text">Maaf, belum ada e-book yang tersedia saat ini.</div>
                </div>
            @endforelse
        </div>

        <!-- Pagination Premium -->
        @if(method_exists($products, 'links') && $products->lastPage() > 1)
            <div class="pagination-wrapper">
                <div class="pagination-premium">
                    @if ($products->onFirstPage())
                        <span class="pagination-item prev-next disabled">‹ Sebelumnya</span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}" class="pagination-item prev-next">‹ Sebelumnya</a>
                    @endif

                    @php
                        $start = max(1, $products->currentPage() - 2);
                        $end = min($products->lastPage(), $products->currentPage() + 2);
                        
                        if ($start > 1) {
                            echo '<a href="' . $products->url(1) . '" class="pagination-item">1</a>';
                            if ($start > 2) {
                                echo '<span class="pagination-dots">...</span>';
                            }
                        }
                        
                        for ($i = $start; $i <= $end; $i++) {
                            if ($i == $products->currentPage()) {
                                echo '<span class="pagination-item active">' . $i . '</span>';
                            } else {
                                echo '<a href="' . $products->url($i) . '" class="pagination-item">' . $i . '</a>';
                            }
                        }
                        
                        if ($end < $products->lastPage()) {
                            if ($end < $products->lastPage() - 1) {
                                echo '<span class="pagination-dots">...</span>';
                            }
                            echo '<a href="' . $products->url($products->lastPage()) . '" class="pagination-item">' . $products->lastPage() . '</a>';
                        }
                    @endphp

                    @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="pagination-item prev-next">Selanjutnya ›</a>
                    @else
                        <span class="pagination-item prev-next disabled">Selanjutnya ›</span>
                    @endif
                </div>
            </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            © {{ date('Y') }} BukuKu. Semua hak dilindungi.
        </div>
    </div>

    <!-- Search & Filter Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const genreFilter = document.getElementById('genreFilter');
            const resetBtn = document.getElementById('resetFilter');
            const productGrid = document.getElementById('productGrid');
            const pagination = document.querySelector('.pagination-wrapper');
            const activeFilters = document.getElementById('activeFilters');
            const totalBukuSpan = document.getElementById('totalBuku');

            // Dapatkan semua product cards
            let productCards = Array.from(document.querySelectorAll('.product-card:not(.empty-state-modern)'));
            
            // Fungsi untuk update active filters tag
            function updateActiveFilters() {
                const searchText = searchInput.value.trim();
                const genreText = genreFilter.value;
                let html = '';

                if (searchText) {
                    html += `<span class="filter-tag">
                        Pencarian: "${searchText}" 
                        <button onclick="clearSearch()">×</button>
                    </span>`;
                }

                if (genreText) {
                    const genreName = genreFilter.options[genreFilter.selectedIndex].text;
                    html += `<span class="filter-tag">
                        Genre: ${genreName} 
                        <button onclick="clearGenre()">×</button>
                    </span>`;
                }

                activeFilters.innerHTML = html;
            }

            // Fungsi untuk clear search
            window.clearSearch = function() {
                searchInput.value = '';
                filterProducts();
            };

            // Fungsi untuk clear genre
            window.clearGenre = function() {
                genreFilter.value = '';
                filterProducts();
            };

            // Fungsi untuk menampilkan empty state "Buku Tidak Ditemukan"
            function showEmptyState() {
                // Sembunyikan pagination
                if (pagination) pagination.style.display = 'none';
                
                // Hapus empty state lama jika ada
                const existingEmpty = productGrid.querySelector('.empty-state-modern');
                if (existingEmpty && existingEmpty.id !== 'initialEmptyState') {
                    existingEmpty.remove();
                }

                // Buat empty state baru
                const emptyState = document.createElement('div');
                emptyState.className = 'empty-state-modern';
                emptyState.id = 'dynamicEmptyState';
                emptyState.innerHTML = `
                    <div class="empty-illustration">🔍</div>
                    <div class="empty-title">Buku Tidak Ditemukan</div>
                    <div class="empty-text">Maaf, tidak ada buku yang sesuai dengan pencarian Anda.</div>
                    <div class="empty-suggestion">Coba gunakan kata kunci lain atau pilih genre yang berbeda</div>
                    <button class="btn-reset" onclick="resetAllFilters()">
                        <span>⟲</span> Reset Semua Filter
                    </button>
                `;
                
                productGrid.appendChild(emptyState);
            }

            // Fungsi untuk reset semua filter
            window.resetAllFilters = function() {
                searchInput.value = '';
                genreFilter.value = '';
                filterProducts();
            };

            // Fungsi untuk menyembunyikan empty state
            function hideEmptyState() {
                const emptyState = productGrid.querySelector('#dynamicEmptyState');
                if (emptyState) emptyState.remove();
                if (pagination) pagination.style.display = 'flex';
            }

            // Fungsi utama filter
            function filterProducts() {
                const searchText = searchInput.value.toLowerCase();
                const genreText = genreFilter.value.toLowerCase();
                
                // Update active filters
                updateActiveFilters();

                // Filter cards
                let visibleCount = 0;
                productCards.forEach(card => {
                    const title = card.dataset.title || '';
                    const category = card.dataset.category || '';
                    
                    const matchesSearch = searchText === '' || title.includes(searchText);
                    const matchesGenre = genreText === '' || category.includes(genreText);
                    
                    if (matchesSearch && matchesGenre) {
                        card.style.display = 'flex';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Update total buku yang terlihat
                if (totalBukuSpan) {
                    totalBukuSpan.textContent = visibleCount;
                }

                // Tampilkan empty state jika tidak ada yang cocok
                if (visibleCount === 0) {
                    showEmptyState();
                } else {
                    hideEmptyState();
                }
            }

            // Reset filter
            resetBtn.addEventListener('click', function() {
                searchInput.value = '';
                genreFilter.value = '';
                filterProducts();
            });

            // Event listeners
            searchInput.addEventListener('keyup', filterProducts);
            genreFilter.addEventListener('change', filterProducts);

            // Inisialisasi product cards
            function refreshProductCards() {
                productCards = Array.from(document.querySelectorAll('.product-card:not(.empty-state-modern)'));
            }

            refreshProductCards();
        });
    </script>

    </body>
    </html>
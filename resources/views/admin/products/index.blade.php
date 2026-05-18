@extends('admin.layout')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #eef2f6 100%);
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* Container Utama */
    .product-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Card Utama */
    .main-card {
        background: white;
        border-radius: 32px;
        padding: 2rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(15, 76, 129, 0.1);
    }

    /* Header Section */
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(15, 76, 129, 0.1);
    }

    .header-title h1 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #0F4C81;
        margin: 0;
    }

    /* Button Tambah */
    .btn-add {
        background: #0F4C81;
        color: white;
        padding: 0.7rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
        border: none;
    }

    .btn-add:hover {
        background: #0c3b63;
        transform: translateY(-2px);
        box-shadow: 0 8px 16px rgba(15, 76, 129, 0.2);
    }

    /* Alert Success */
    .alert-success {
        background: #e8f5e9;
        border-left: 4px solid #2e7d32;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        border-radius: 12px;
        color: #2e7d32;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: #f8fafd;
        padding: 1.5rem;
        border-radius: 20px;
        border: 1px solid rgba(15, 76, 129, 0.1);
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        background: white;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: #0F4C81;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.02);
    }

    .stat-content {
        flex: 1;
    }

    .stat-label {
        font-size: 0.8rem;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        margin-bottom: 4px;
    }

    .stat-value {
        font-size: 1.6rem;
        font-weight: 700;
        color: #0F4C81;
        line-height: 1.2;
    }

    /* Search Section */
    .search-section {
        margin-bottom: 1.5rem;
    }

    .search-wrapper {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .search-box {
        flex: 1;
        position: relative;
    }

    .search-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        font-size: 1rem;
    }

    .search-input {
        width: 100%;
        padding: 0.8rem 1rem 0.8rem 2.8rem;
        border: 1px solid rgba(15, 76, 129, 0.2);
        border-radius: 12px;
        font-size: 0.9rem;
        transition: all 0.2s;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .search-input:focus {
        outline: none;
        border-color: #0F4C81;
        box-shadow: 0 0 0 3px rgba(15, 76, 129, 0.1);
    }

    .btn-refresh {
        padding: 0.8rem 1.5rem;
        background: white;
        border: 1px solid rgba(15, 76, 129, 0.2);
        border-radius: 12px;
        font-weight: 500;
        color: #0F4C81;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
        cursor: pointer;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .btn-refresh:hover {
        background: #f0f7ff;
        border-color: #0F4C81;
    }

    /* Table Container */
    .table-container {
        background: white;
        border-radius: 20px;
        border: 1px solid rgba(15, 76, 129, 0.1);
        overflow-x: auto;
    }

    .product-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.9rem;
    }

    .product-table th {
        text-align: left;
        padding: 1rem;
        background: #f8fafd;
        font-weight: 600;
        color: #0F4C81;
        border-bottom: 1px solid rgba(15, 76, 129, 0.1);
        white-space: nowrap;
    }

    .product-table td {
        padding: 1rem;
        border-bottom: 1px solid #f0f0f0;
        vertical-align: middle;
    }

    .product-table tbody tr:hover {
        background: #fafcff;
    }

    /* Number Column */
    .number-column {
        font-weight: 600;
        color: #0F4C81;
        width: 50px;
    }

    /* Product Image */
    .product-image-cell {
        width: 70px;
    }

    .product-image-wrapper {
        width: 50px;
        height: 70px;
        border-radius: 8px;
        overflow: hidden;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #eee;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-image-placeholder {
        font-size: 1.5rem;
        color: #ccc;
    }

    /* Product Info */
    .product-title {
        font-weight: 600;
        color: #1A2B3C;
        font-size: 0.95rem;
    }

    /* Category Badge */
    .category-badge {
        background: #eef2f6;
        color: #0F4C81;
        padding: 0.3rem 1rem;
        border-radius: 30px;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-block;
        white-space: nowrap;
    }

    /* Price */
    .price-text {
        font-weight: 600;
        color: #0F4C81;
        font-size: 0.95rem;
        white-space: nowrap;
    }

    /* Action Buttons */
    .action-group {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 0.9rem;
        background: #f8fafd;
        color: #555;
    }

    .action-btn:hover {
        background: #0F4C81;
        color: white;
        transform: translateY(-2px);
    }

    .action-btn.delete {
        background: #fff1f0;
        color: #f44336;
    }

    .action-btn.delete:hover {
        background: #f44336;
        color: white;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem;
    }

    .empty-icon {
        font-size: 3rem;
        color: #ccc;
        margin-bottom: 1rem;
    }

    .empty-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #1A2B3C;
        margin-bottom: 0.5rem;
    }

    .empty-text {
        color: #999;
        margin-bottom: 1.5rem;
    }

    /* Pagination */
    .pagination-wrapper {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }

    .pagination {
        display: flex;
        gap: 5px;
        list-style: none;
    }

    .page-link {
        padding: 0.5rem 1rem;
        border: 1px solid rgba(15, 76, 129, 0.2);
        border-radius: 8px;
        color: #0F4C81;
        text-decoration: none;
        transition: all 0.2s;
        background: white;
    }

    .page-link:hover {
        background: #0F4C81;
        color: white;
        border-color: #0F4C81;
    }

    .active .page-link {
        background: #0F4C81;
        color: white;
        border-color: #0F4C81;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .main-card {
            padding: 1.5rem;
        }

        .header-section {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .btn-add {
            width: 100%;
            justify-content: center;
        }

        .search-wrapper {
            flex-direction: column;
        }

        .search-box {
            width: 100%;
        }

        .btn-refresh {
            width: 100%;
            justify-content: center;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .product-table {
            font-size: 0.85rem;
        }

        .action-group {
            flex-direction: column;
        }

        .action-btn {
            width: 100%;
        }
    }
</style>

<div class="product-container">
    <div class="main-card">
        
        <!-- Header -->
        <div class="header-section">
            <div class="header-title">
                <h1>Daftar Produk</h1>
            </div>
            <a class="btn-add" href="{{ route('products.create') }}">
                + Tambah Produk
            </a>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📊</div>
                <div class="stat-content">
                    <div class="stat-label">Total Produk</div>
                    <div class="stat-value">
                        {{ $products instanceof \Illuminate\Pagination\LengthAwarePaginator ? $products->total() : $products->count() }}
                    </div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">🏷️</div>
                <div class="stat-content">
                    <div class="stat-label">Genre</div>
                    <div class="stat-value">{{ \App\Models\Category::count() }}</div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">📦</div>
                <div class="stat-content">
                    <div class="stat-label">Stok</div>
                    <div class="stat-value">{{ $products instanceof \Illuminate\Pagination\LengthAwarePaginator ? $products->total() : $products->count() }}</div>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="search-section">
            <div class="search-wrapper">
                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input type="text" class="search-input" placeholder="Cari judul, kategori, atau harga..." id="searchInput">
                </div>
                <button class="btn-refresh" onclick="window.location.reload()">
                    ⟳ Refresh
                </button>
            </div>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <table class="product-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Genre</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <!-- No -->
                        <td class="number-column">
                            {{ $loop->iteration }}
                        </td>

                        <!-- Cover -->
                        <td class="product-image-cell">
                            <div class="product-image-wrapper">
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" class="product-image" alt="{{ $product->title }}">
                                @else
                                    <div class="product-image-placeholder">📘</div>
                                @endif
                            </div>
                        </td>

                        <!-- Judul -->
                        <td>
                            <span class="product-title">{{ $product->title }}</span>
                        </td>

                        <!-- Kategori -->
                        <td>
                            <span class="category-badge">
                                {{ $product->category->name ?? 'Tanpa Kategori' }}
                            </span>
                        </td>

                        <!-- Harga -->
                        <td>
                            <span class="price-text">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        </td>

                        <!-- Aksi -->
                        <td>
                            <div class="action-group">
                                <a class="action-btn" href="{{ route('products.show', $product->id) }}" title="Detail">
                                    👁️
                                </a>
                                <a class="action-btn" href="{{ route('products.edit', $product->id) }}" title="Edit">
                                    ✎
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="action-btn delete" type="submit" 
                                            onclick="return confirm('Yakin ingin menghapus produk ini?')" 
                                            title="Hapus">
                                        🗑
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <div class="empty-icon">📚</div>
                                <div class="empty-title">Belum Ada Produk</div>
                                <div class="empty-text">Mulai tambahkan produk pertama Anda</div>
                                <a href="{{ route('products.create') }}" class="btn-add" style="display: inline-flex;">
                                    + Tambah Produk
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if(method_exists($products, 'links'))
            <div class="pagination-wrapper">
                {{ $products->links() }}
            </div>
        @endif

    </div>
</div>

<!-- Search Functionality -->
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let searchText = this.value.toLowerCase();
        let tableRows = document.querySelectorAll('.product-table tbody tr');
        
        tableRows.forEach(row => {
            if (row.querySelector('.empty-state')) return;
            
            let title = row.querySelector('.product-title')?.textContent.toLowerCase() || '';
            let category = row.querySelector('.category-badge')?.textContent.toLowerCase() || '';
            let price = row.querySelector('.price-text')?.textContent.toLowerCase() || '';
            
            if (title.includes(searchText) || category.includes(searchText) || price.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
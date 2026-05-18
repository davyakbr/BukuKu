@extends('admin.layout')

@section('content')
<style>
    body {
        background: #f5f7fa;
        font-family: 'Inter', sans-serif;
    }

    .card {
        background: #ffffff;
        border-radius: 18px;
        padding: 2.5rem;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        border: 1px solid #eaeaea;
        max-width: 1000px;
        margin: 2rem auto;
    }

    h1 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 2rem;
        color: #0F4C81;
    }

    .product-wrapper {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 3rem;
        margin-bottom: 3rem;
    }

    .product-image {
        text-align: center;
    }

    .product-image img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 14px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .book-placeholder {
        font-size: 5rem;
    }

    .product-info h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .category-badge {
        display: inline-block;
        background: #e7f3ff;
        color: #0F4C81;
        padding: 0.4rem 1rem;
        border-radius: 30px;
        font-size: 0.8rem;
        margin-bottom: 1rem;
        font-weight: 500;
    }

    .price {
        font-size: 1.6rem;
        font-weight: 700;
        color: #0F4C81;
        margin-bottom: 1.5rem;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 150px 1fr;
        gap: 0.7rem 1rem;
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
    }

    .info-label {
        font-weight: 600;
        color: #555;
    }

    .info-value {
        color: #333;
    }

    .description-box {
        background: #f9fbfd;
        padding: 1.8rem;
        border-radius: 14px;
        border: 1px solid #eaeaea;
    }

    .description-box h3 {
        font-size: 1.1rem;
        margin-bottom: 1rem;
        font-weight: 600;
        color: #0F4C81;
    }

    .description-box p {
        line-height: 1.7;
        color: #444;
    }

    .btn-back {
        display: inline-block;
        margin-top: 2rem;
        padding: 0.7rem 1.8rem;
        border-radius: 8px;
        text-decoration: none;
        background: #0F4C81;
        color: white;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-back:hover {
        background: #09375f;
    }

    @media(max-width: 768px) {
        .product-wrapper {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="card">

    <h1>📚 Detail Produk</h1>

    <div class="product-wrapper">

        <div class="product-image">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->title }}">
            @else
                <div class="book-placeholder">📘</div>
            @endif
        </div>

        <div class="product-info">
            <h2>{{ $product->title }}</h2>

            <span class="category-badge">
                {{ $product->category->name ?? 'Tanpa Kategori' }}
            </span>

            <div class="price">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </div>

            <div class="info-grid">
                <span class="info-label">Penerbit</span>
                <span class="info-value">{{ $product->publisher ?? '-' }}</span>

                <span class="info-label">Tahun Terbit</span>
                <span class="info-value">{{ $product->publish_year ?? '-' }}</span>
            </div>
        </div>

    </div>

    <div class="description-box">
        <h3>📖 Deskripsi Buku</h3>
        <p>{{ $product->description ?? 'Tidak ada deskripsi tersedia.' }}</p>
    </div>

    <a href="{{ route('products.index') }}" class="btn-back">
        ← Kembali ke Daftar
    </a>

</div>

@endsection
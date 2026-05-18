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
    .category-container {
        max-width: 1200px;
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

    /* Stats Card */
    .stats-card {
        background: #f8fafd;
        border-radius: 20px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        border: 1px solid rgba(15, 76, 129, 0.1);
    }

    .stats-icon {
        width: 56px;
        height: 56px;
        background: white;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: #0F4C81;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.02);
    }

    .stats-info {
        flex: 1;
    }

    .stats-label {
        font-size: 0.85rem;
        color: #666;
        margin-bottom: 4px;
    }

    .stats-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: #0F4C81;
        line-height: 1.2;
    }

    /* Table Container */
    .table-container {
        background: white;
        border-radius: 20px;
        border: 1px solid rgba(15, 76, 129, 0.1);
        overflow-x: auto;
    }

    /* Table Styles */
    .category-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.95rem;
    }

    .category-table th {
        text-align: left;
        padding: 1rem;
        background: #f8fafd;
        font-weight: 600;
        color: #0F4C81;
        border-bottom: 1px solid rgba(15, 76, 129, 0.1);
    }

    .category-table td {
        padding: 1rem;
        border-bottom: 1px solid #f0f0f0;
        vertical-align: middle;
    }

    .category-table tbody tr:hover {
        background: #fafcff;
    }

    /* Number Column */
    .number-column {
        font-weight: 600;
        color: #0F4C81;
        width: 50px;
    }

    /* Category Name */
    .category-name {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .category-color {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: #0F4C81;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 1rem;
    }

    .category-info {
        display: flex;
        flex-direction: column;
    }

    .category-title {
        font-weight: 600;
        color: #1A2B3C;
        font-size: 1rem;
    }

    .category-meta {
        font-size: 0.75rem;
        color: #999;
        margin-top: 2px;
    }

    /* Action Buttons */
    .action-group {
        display: flex;
        gap: 6px;
        justify-content: flex-start;
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
        font-size: 1rem;
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

    /* Responsive */
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

        .category-table td {
            padding: 0.8rem;
        }

        .category-color {
            width: 32px;
            height: 32px;
            font-size: 0.9rem;
        }

        .action-group {
            flex-direction: column;
        }

        .action-btn {
            width: 100%;
            height: 34px;
        }
    }
</style>

<div class="category-container">
    <div class="main-card">
        
        <!-- Header -->
        <div class="header-section">
            <div class="header-title">
                <h1>Daftar Genre</h1>
            </div>
            <a class="btn-add" href="{{ route('categories.create') }}">
                + Tambah Genre
            </a>
        </div>

        <!-- Alert Success -->
        @if(session('success'))
            <div class="alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        <!-- Stats Card -->
        <div class="stats-card">
            <div class="stats-icon">
                📂
            </div>
            <div class="stats-info">
                <div class="stats-label">Total Genre</div>
                <div class="stats-value">{{ $categories->count() }}</div>
            </div>
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <table class="category-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Genre</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <!-- Nomor -->
                        <td class="number-column">
                            {{ $loop->iteration }}
                        </td>

                        <!-- Nama Kategori -->
                        <td>
                            <div class="category-name">
                                
                                    
                                </div>
                                <div class="category-info">
                                    <span class="category-title">{{ $category->name }}</span>
                                </div>
                            </div>
                        </td>

                        <!-- Aksi -->
                        <td>
                            <div class="action-group">
                                <a class="action-btn" href="{{ route('categories.edit', $category->id) }}" title="Edit">
                                    ✎
                                </a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="action-btn delete" type="submit" 
                                            onclick="return confirm('Yakin ingin menghapus genre ini?')" 
                                            title="Hapus">
                                        🗑
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            <div class="empty-state">
                                <div class="empty-icon">📂</div>
                                <div class="empty-title">Belum Ada Genre</div>
                                <div class="empty-text">Mulai dengan menambahkan genre pertama Anda</div>
                                <a href="{{ route('categories.create') }}" class="btn-add" style="display: inline-flex;">
                                    + Tambah Genre
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
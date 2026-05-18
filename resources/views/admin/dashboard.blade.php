@extends('admin.layout')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: #f8fafc;
        font-family: 'Inter', sans-serif;
    }

    /* Container Utama */
    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 24px;
    }

    /* Header */
    .dashboard-header {
        background: white;
        border-radius: 20px;
        padding: 24px 32px;
        margin-bottom: 24px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.02);
        border: 1px solid #eef2f6;
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
    }

    .header-title h1 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #0F4C81;
        margin: 0;
        letter-spacing: -0.3px;
    }

    .header-date {
        background: #f8fafc;
        padding: 10px 20px;
        border-radius: 40px;
        font-size: 0.9rem;
        font-weight: 500;
        color: #4a5568;
        border: 1px solid #e2e8f0;
    }

    .header-date span {
        margin: 0 8px;
    }

    /* Welcome Card */
    .welcome-card {
        background: linear-gradient(135deg, #0F4C81 0%, #1e5a9c 100%);
        border-radius: 20px;
        padding: 24px 32px;
        margin-bottom: 32px;
        color: white;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 8px 20px rgba(15,76,129,0.15);
    }

    .welcome-text h2 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .welcome-text p {
        font-size: 0.95rem;
        opacity: 0.9;
        display: flex;
        gap: 12px;
    }

    .welcome-badge {
        background: rgba(255,255,255,0.15);
        padding: 4px 12px;
        border-radius: 30px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 32px;
    }

    .stat-card {
        background: white;
        border-radius: 18px;
        padding: 24px;
        border: 1px solid #eef2f6;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.04);
        border-color: #d0e0f0;
    }

    .stat-icon {
        width: 64px;
        height: 64px;
        background: #f0f7ff;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #0F4C81;
    }

    .stat-content {
        flex: 1;
    }

    .stat-label {
        font-size: 0.8rem;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }

    .stat-value {
        font-size: 2.2rem;
        font-weight: 700;
        color: #0F4C81;
        line-height: 1.2;
        margin-bottom: 4px;
    }

    .stat-trend {
        font-size: 0.8rem;
        color: #10b981;
    }

    /* Quick Actions */
    .quick-actions-section {
        margin-bottom: 24px;
    }

    .section-header {
        margin-bottom: 16px;
    }

    .section-header h3 {
        font-size: 1.2rem;
        font-weight: 600;
        color: #1e293b;
    }

    .quick-actions-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .quick-action-card {
        background: white;
        border-radius: 18px;
        padding: 24px;
        text-decoration: none;
        border: 1px solid #eef2f6;
        transition: all 0.2s;
        display: block;
    }

    .quick-action-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.04);
        border-color: #d0e0f0;
    }

    .quick-action-icon {
        width: 48px;
        height: 48px;
        background: #f0f7ff;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: #0F4C81;
        margin-bottom: 16px;
    }

    .quick-action-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 8px;
    }

    .quick-action-desc {
        font-size: 0.9rem;
        color: #64748b;
        margin-bottom: 16px;
        line-height: 1.5;
    }

    .quick-action-meta {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #0F4C81;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .quick-action-meta i {
        font-size: 1.1rem;
        transition: transform 0.2s;
    }

    .quick-action-card:hover .quick-action-meta i {
        transform: translateX(4px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .dashboard-container {
            padding: 16px;
        }

        .dashboard-header {
            padding: 20px;
        }

        .header-content {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-date {
            width: 100%;
            text-align: center;
        }

        .welcome-card {
            flex-direction: column;
            text-align: center;
            padding: 20px;
        }

        .welcome-text p {
            justify-content: center;
        }

        .stats-grid,
        .quick-actions-grid {
            grid-template-columns: 1fr;
        }

        .stat-card {
            padding: 20px;
        }

        .stat-value {
            font-size: 1.8rem;
        }
    }
</style>

<div class="dashboard-container">
    
    <!-- Header -->
    <div class="dashboard-header">
        <div class="header-content">
            <div class="header-title">
                <h1>Dashboard</h1>
            </div>
            <div class="header-date">
                <span id="currentDate"></span>
                <span>•</span>
                <span id="currentTime"></span>
            </div>
        </div>
    </div>

    <!-- Welcome Card -->
    <div class="welcome-card">
        <div class="welcome-text">
            <h2>Selamat datang, {{ auth()->user()->name ?? 'Admin' }}</h2>
            <p>
                <span class="welcome-badge">Administrator</span>
                <span class="welcome-badge">{{ now()->format('l, d F Y') }}</span>
            </p>
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">📚</div>
            <div class="stat-content">
                <div class="stat-label">Total Buku</div>
                <div class="stat-value">{{ $productCount ?? 0 }}</div>
                <div class="stat-trend">Koleksi digital</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">📑</div>
            <div class="stat-content">
                <div class="stat-label">Total Genre</div>
                <div class="stat-value">{{ $categoryCount ?? 0 }}</div>
                <div class="stat-trend">{{ ($categoryCount ?? 0) > 0 ? 'Aktif' : 'Belum ada' }}</div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions-section">
        <div class="section-header">
            <h3>Akses Cepat</h3>
        </div>

        <div class="quick-actions-grid">
            <a href="{{ route('categories.index') }}" class="quick-action-card">
                <div class="quick-action-icon">📑</div>
                <div class="quick-action-title">Kelola Genre</div>
                <div class="quick-action-desc">
                    Tambah, edit, atau hapus genre buku
                </div>
                <div class="quick-action-meta">
                    <span>{{ $categoryCount ?? 0 }} Genre</span>
                    <i>→</i>
                </div>
            </a>

            <a href="{{ route('products.index') }}" class="quick-action-card">
                <div class="quick-action-icon">📚</div>
                <div class="quick-action-title">Kelola Buku</div>
                <div class="quick-action-desc">
                    Tambah, edit, atau hapus koleksi buku
                </div>
                <div class="quick-action-meta">
                    <span>{{ $productCount ?? 0 }} Buku</span>
                    <i>→</i>
                </div>
            </a>
        </div>
    </div>

</div>

<!-- Script Waktu -->
<script>
    function updateTime() {
        const now = new Date();
        const dateOptions = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        const timeOptions = { 
            hour: '2-digit', 
            minute: '2-digit', 
            second: '2-digit',
            hour12: false 
        };

        document.getElementById('currentDate').textContent = 
            now.toLocaleDateString('id-ID', dateOptions);
        document.getElementById('currentTime').textContent = 
            now.toLocaleTimeString('id-ID', timeOptions);
    }

    updateTime();
    setInterval(updateTime, 1000);
</script>
@endsection
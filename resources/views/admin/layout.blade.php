<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukuKu - Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fa;
            color: #1e1e1e;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            height: 100vh;
            background: #0F4C81; /* Biru khas */
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 15px rgba(0,0,0,0.08);
        }

        .sidebar h2 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 2.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .sidebar nav {
            flex: 1;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            padding: 0.8rem 1rem;
            border-radius: 10px;
            font-weight: 500;
            transition: 0.2s;
            margin-bottom: 0.5rem;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.15);
        }

        .sidebar a.active {
            background: #FFD500;
            color: #1e1e1e;
            font-weight: 600;
        }

        /* Logout */
        .logout {
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.2);
        }

        .logout button {
            width: 100%;
            padding: 0.8rem 1rem;
            border-radius: 10px;
            border: none;
            background: rgba(255,255,255,0.15);
            color: white;
            font-weight: 500;
            cursor: pointer;
            transition: 0.2s;
        }

        .logout button:hover {
            background: rgba(255,255,255,0.25);
        }

        /* ===== MAIN CONTENT ===== */
        .main {
            margin-left: 260px;
            padding: 2.5rem;
            min-height: 100vh;
            background: #f5f7fa;
        }

        /* Card Global */
        .card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            border: 1px solid #eaeaea;
        }

        /* Button Global */
        .btn {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
            border: none;
        }

        .btn-primary {
            background: #0F4C81;
            color: white;
        }

        .btn-primary:hover {
            background: #09375f;
        }

        .btn-outline {
            background: #FFD500;
            color: #1e1e1e;
        }

        .btn-outline:hover {
            background: #e6c200;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main {
                margin-left: 0;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2> BukuKu</h2>

    <nav>
        <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
            📊 Dashboard
        </a>

        <a href="/admin/categories" class="{{ request()->is('admin/categories*') ? 'active' : '' }}">
            📂 Genres
        </a>

        <a href="/admin/products" class="{{ request()->is('admin/products*') ? 'active' : '' }}">
            📚 Products
        </a>
    </nav>

    <div class="logout">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</div>

<div class="main">
    @yield('content')
</div>

</body>
</html>
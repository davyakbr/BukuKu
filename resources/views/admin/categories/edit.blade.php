@extends('admin.layout')

@section('content')
<style>
    body {
        background: #f5f7fa;
        font-family: 'Inter', sans-serif;
    }

    .card {
        background: #ffffff;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid #eaeaea;
        max-width: 550px;
        margin: 2rem auto;
    }

    h1 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 2rem;
        color: #0F4C81;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
        font-size: 0.95rem;
    }

    input[type="text"] {
        width: 100%;
        padding: 0.85rem 1rem;
        border: 1px solid #ddd;
        border-radius: 10px;
        font-size: 0.95rem;
        transition: 0.2s;
        background: #fff;
    }

    input:focus {
        outline: none;
        border-color: #0F4C81;
        box-shadow: 0 0 0 3px rgba(15, 76, 129, 0.1);
    }

    .button-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 2rem;
    }

    .btn-primary {
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
        background: #0F4C81;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background: #09375f;
    }

    .btn-secondary {
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        background: #FFD500;
        color: #1e1e1e;
        transition: 0.2s;
    }

    .btn-secondary:hover {
        background: #e6c200;
    }

    .alert-error {
        background: #fff5f5;
        border-left: 4px solid #d32f2f;
        padding: 1rem;
        margin-bottom: 2rem;
        border-radius: 6px;
        color: #b71c1c;
        font-weight: 500;
    }
</style>

<div class="card">
    <h1>✏️ Edit Genre</h1>

    @if($errors->any())
        <div class="alert-error">
            <ul style="margin: 0; padding-left: 1.2rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Category <span style="color:#d32f2f;">*</span></label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="button-group">
            <a href="{{ route('categories.index') }}" class="btn-secondary">
                ← Kembali
            </a>
            <button type="submit" class="btn-primary">
                Update
            </button>
        </div>
    </form>
</div>

@endsection
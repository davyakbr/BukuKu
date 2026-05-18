@extends('admin.layout')

@section('content')
<style>
    body {
        background: #f4f7fb;
        font-family: 'Inter', sans-serif;
    }

    .card {
        background: #ffffff;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.06);
        border: 1px solid #eaeaea;
        max-width: 1100px;
        margin: 2rem auto;
    }

    h1 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 2rem;
        color: #0F4C81;
    }

    .wrapper {
        display: grid;
        grid-template-columns: 320px 1fr;
        gap: 3rem;
    }

    .cover-box {
        background: #f8fbff;
        border: 1px solid #eef3f8;
        padding: 1.5rem;
        border-radius: 18px;
        text-align: center;
    }

    .cover-preview {
        width: 100%;
        height: 420px;
        border-radius: 12px;
        background: #eaeaea;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #999;
        font-size: 3rem;
        overflow: hidden;
        margin-bottom: 1rem;
    }

    .cover-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .form-group {
        margin-bottom: 1.4rem;
    }

    label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.4rem;
        color: #444;
        font-size: 0.9rem;
    }

    input[type="text"],
    input[type="number"],
    textarea,
    select {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #ddd;
        border-radius: 10px;
        font-size: 0.9rem;
        transition: 0.2s;
        background: #fff;
    }

    input:focus,
    textarea:focus,
    select:focus {
        outline: none;
        border-color: #0F4C81;
        box-shadow: 0 0 0 3px rgba(15, 76, 129, 0.1);
    }

    textarea {
        min-height: 120px;
        resize: vertical;
    }

    .btn-primary {
        padding: 0.7rem 1.8rem;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 600;
        background: #0F4C81;
        color: white;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-primary:hover {
        background: #09375f;
    }

    .btn-outline {
        padding: 0.7rem 1.5rem;
        border-radius: 8px;
        font-size: 0.85rem;
        text-decoration: none;
        border: 1px solid #ddd;
        color: #444;
        margin-right: 1rem;
        transition: 0.2s;
    }

    .btn-outline:hover {
        background: #f5f5f5;
    }

    .button-group {
        margin-top: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .alert-error {
        background: #fff5f5;
        border-left: 4px solid #d32f2f;
        padding: 1rem;
        margin-bottom: 2rem;
        border-radius: 8px;
        color: #b71c1c;
        font-weight: 500;
    }

    @media (max-width: 900px) {
        .wrapper {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="card">
    <h1>➕ Tambah Produk</h1>

    @if($errors->any())
        <div class="alert-error">
            <ul style="margin: 0; padding-left: 1.2rem;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="wrapper">

            <!-- Cover Preview -->
            <div class="cover-box">
                <div class="cover-preview" id="preview">
                    📘
                </div>

                <label>Upload Cover</label>
                <input type="file" name="image" accept="image/*" onchange="previewImage(event)">
                <small style="color:#777;">Format JPG/PNG. Maks 2MB.</small>
            </div>

            <!-- Form -->
            <div>

                <div class="form-group">
                    <label>Judul Ebook *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label>Prolog</label>
                    <textarea name="description">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Harga (Rp) *</label>
                    <input type="number" name="price" value="{{ old('price') }}" required>
                </div>

                <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="publisher" value="{{ old('publisher') }}">
                </div>

                <div class="form-group">
                    <label>Tahun Terbit</label>
                    <input type="number" name="publish_year" value="{{ old('publish_year') }}">
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="category_id">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="button-group">
                    <a href="{{ route('products.index') }}" class="btn-outline">Batal</a>
                    <button type="submit" class="btn-primary">Simpan Produk</button>
                </div>

            </div>
        </div>

    </form>
</div>

<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    preview.innerHTML = '';
    const img = document.createElement('img');
    img.src = URL.createObjectURL(event.target.files[0]);
    preview.appendChild(img);
}
</script>

@endsection
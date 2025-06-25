@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold text-center">📘 Tambah Buku Baru</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Buku</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                
                <div class="mb-3">
                    <label for="author" class="form-label">Penulis</label>
                    <input type="text" name="author" class="form-control" value="{{ old('author') }}" required>
                </div>
                 
<div class="mb-3">
    <label for="about" class="form-label">Tentang Buku</label>
    <textarea name="about" class="form-control" rows="4" required>{{ old('about') }}</textarea>
</div>


               
                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Gambar Buku</label>
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                </div>

                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Buku</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

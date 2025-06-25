@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white fw-bold">✏️ Edit Buku</div>

                <div class="card-body">
                    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                     
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Buku</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title', $book->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                   
                        <div class="mb-3">
                            <label for="author" class="form-label">Penulis</label>
                            <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" 
                                   value="{{ old('author', $book->author) }}" required>
                            @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="about" class="form-label">Deskripsi / Tentang Buku</label>
                            <textarea name="about" id="about" rows="4" class="form-control @error('about') is-invalid @enderror" required>{{ old('about', $book->about) }}</textarea>
                            @error('about')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    
                        <div class="mb-3">
                            <label class="form-label">Gambar Thumbnail (Opsional)</label>
                            @if($book->thumbnail)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $book->thumbnail) }}" alt="Thumbnail" class="img-thumbnail" width="150">
                                </div>
                            @endif
                            <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror">
                            @error('thumbnail')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                  
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('books.index') }}" class="btn btn-secondary">← Kembali</a>
                            <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

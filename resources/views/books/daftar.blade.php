@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center fw-bold">📚 Daftar Buku</h2>


    @guest
        <div class="alert alert-warning d-flex justify-content-between align-items-center">
            <span>
                Anda belum login. Silakan login atau registrasi untuk memberikan rating pada buku.
            </span>
            <div>
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">Register</a>
            </div>
        </div>
    @endguest

    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-5">
            <input type="text" name="author" class="form-control" placeholder="Cari berdasarkan penulis..." value="{{ request('author') }}">
        </div>
        <div class="col-md-3">
            <select name="rating" class="form-select">
                <option value="">-- Filter Rating --</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }} ⭐</option>
                @endfor
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('books.daftar') }}" class="btn btn-outline-secondary w-100">Reset</a>
        </div>
    </form>

    <div class="row">
        @forelse ($books as $book)
            <div class="col-md-3 mb-4">
                <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none text-dark">
                    <div class="card h-100 shadow-sm">
                        @if ($book->thumbnail)
                            <img src="{{ asset('storage/' . $book->thumbnail) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white text-center py-5">Tidak ada gambar</div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $book->title }}</h5>
                            <p class="mb-1 text-muted">Penulis: {{ $book->author }}</p>
                            <p class="mb-0">Rating:
                                <span class="text-warning">
                                    {{ str_repeat('⭐', round($book->ratings_avg_rating ?? 0)) }}
                                </span>
                                <small class="text-muted">({{ number_format($book->ratings_avg_rating ?? 0, 1) }})</small>
                            </p>
                            
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Tidak ada buku yang ditemukan.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $books->links() }}
    </div>
</div>
@endsection

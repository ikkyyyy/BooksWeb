@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold text-center">📚 Daftar Buku</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">+ Tambah Buku</a>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @forelse ($books as $book)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    @if ($book->thumbnail)
                        <img src="{{ asset('storage/' . $book->thumbnail) }}"
                             class="card-img-top"
                             style="height: 180px; object-fit: cover; max-width: 100%;"
                             alt="{{ $book->title }}">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=No+Image"
                             class="card-img-top"
                             style="height: 180px; object-fit: cover;"
                             alt="No image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-truncate">{{ $book->title }}</h5>
                        <p class="card-text text-muted mb-2">Penulis: {{ $book->author }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">Belum ada buku yang ditambahkan.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $books->links() }}
    </div>
</div>
@endsection

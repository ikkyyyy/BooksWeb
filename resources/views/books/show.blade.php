@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="row g-0">
            
            <div class="col-md-4">
                @if ($book->thumbnail)
                    <img src="{{ asset('storage/' . $book->thumbnail) }}" class="img-fluid rounded-start" alt="{{ $book->title }}">
                @else
                    <div class="bg-secondary text-white text-center py-5">
                        <p class="m-0">Tidak ada gambar</p>
                    </div>
                @endif
            </div>

           
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title fw-bold mb-3">{{ $book->title }}</h3>
                    <p class="mb-2"><strong>Penulis:</strong> {{ $book->author }}</p>
                    
@if ($book->about)
<p class="mb-3"><strong>Tentang Buku:</strong> {{ $book->about }}</p>
@endif


                    <p><strong>Rating Saat Ini:</strong> 
                        <span class="text-warning">{{ str_repeat('⭐', round($book->avg_rating ?? 0)) }}</span>
                        <small>({{ number_format($book->avg_rating ?? 0, 1) }})</small>
                    </p>

                   
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                
                    @auth
                        @if ($book->user_id !== auth()->id() && !$userHasRated)
                            <form method="POST" action="{{ route('books.rate', $book->id) }}" class="mt-4">
                                @csrf
                                <div class="mb-3 w-50">
                                    <label for="rating" class="form-label">Beri Rating (1-5)</label>
                                    <select name="rating" id="rating" class="form-select" required>
                                        <option value="">Pilih</option>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}">{{ $i }} ⭐</option>
                                        @endfor
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit">Kirim Rating</button>
                            </form>
                        @elseif ($book->user_id === auth()->id())
                            <div class="alert alert-warning mt-4">Kamu tidak bisa merating buku yang kamu buat sendiri.</div>
                        @else
                            <div class="alert alert-info mt-4">Kamu sudah memberikan rating untuk buku ini.</div>
                        @endif
                    @endauth

                    @guest
                        <div class="alert alert-info mt-4">
                            <a href="{{ route('login') }}" class="text-decoration-none">Login</a> untuk memberikan rating pada buku ini.
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

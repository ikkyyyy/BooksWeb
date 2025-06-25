@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

           
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h3 class="fw-bold text-primary mb-2">👋 Selamat Datang, {{ Auth::user()->name }}</h3>
                    <p class="mb-1">Email: <strong>{{ Auth::user()->email }}</strong></p>
                    <p>Status Verifikasi:
                        @if (Auth::user()->email_verified_at)
                            <span class="badge bg-success">Terverifikasi</span>
                        @else
                            <span class="badge bg-danger">Belum Verifikasi</span>
                        @endif
                    </p>
                    <p class="text-muted mb-0">Gunakan menu navigasi di atas untuk mengelola buku dan pengguna.</p>
                </div>
            </div>

          
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="card text-center border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title text-muted mb-2">📚 Total Buku</h5>
                            <h2 class="fw-bold text-primary">{{ $totalBooks }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-center border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title text-muted mb-2">👥 Total Pengguna</h5>
                            <h2 class="fw-bold text-primary">{{ $totalUsers }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold mb-3 text-secondary">⭐ Statistik Buku Berdasarkan Rating</h5>
                    <div class="row text-center g-3">
                        @foreach ($ratingCounts as $star => $count)
                            <div class="col-6 col-md-2">
                                <div class="border rounded p-3 shadow-sm bg-light">
                                    <div class="fw-bold text-warning fs-5">{{ $star }} ⭐</div>
                                    <div class="text-primary fs-6">{{ $count }} Buku</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

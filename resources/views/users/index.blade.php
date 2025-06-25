@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">📋 Daftar Pengguna</h2>
    </div>

    <form method="GET" action="{{ route('users.index') }}" class="row g-3 mb-4">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control" placeholder="Cari nama atau email..." value="{{ request('search') }}">
        </div>
        <div class="col-md-4">
            <select name="verified" class="form-select">
                <option value="">-- Semua Status Verifikasi --</option>
                <option value="1" {{ request('verified') == '1' ? 'selected' : '' }}>Terverifikasi</option>
                <option value="0" {{ request('verified') == '0' ? 'selected' : '' }}>Belum Terverifikasi</option>
            </select>
        </div>
        <div class="col-md-3 d-grid">
            <button type="submit" class="btn btn-primary">🔍 Filter</button>
        </div>
    </form>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->email_verified_at)
                                <span class="badge bg-success">Terverifikasi</span>
                            @else
                                <span class="badge bg-danger">Belum</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">Tidak ada pengguna ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $users->withQueryString()->links() }}
    </div>
</div>
@endsection

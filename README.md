rizky_fdtest

Aplikasi ini merupakan sistem manajemen dan eksplorasi buku berbasis web, dikembangkan sebagai bagian dari tes teknikal Fullstack Developer. Menggunakan Laravel (Blade), PostgreSQL, dan Laravel Breeze, aplikasi ini memiliki fitur lengkap: autentikasi, manajemen buku, rating, komentar, filter, statistik

✨ Fitur Utama

🔐 Autentikasi Pengguna
- Login, register, logout
- Verifikasi email (wajib sebelum akses dashboard)
- Reset kata sandi via email
- Ganti kata sandi dari profil
- Proteksi route dengan auth & verified

📊 Dashboard Interaktif
- Kartu total buku, pengguna terverifikasi & belum
- Pie chart statistik user (verifikasi)
- Bar chart jumlah buku per bulan

👥 Manajemen Pengguna
- Daftar pengguna (pencarian nama/email)
- Filter status verifikasi
- Tanggal bergabung & pagination responsif

📚 Halaman Buku Publik
- Daftar buku tanpa login
- Filter berdasarkan rating
- Pencarian judul, pagination dinamis
- Detail buku: deskripsi, cover, komentar, rating

🛠️ Buku Saya (CRUD)
- Tambah, edit, hapus buku oleh user
- Upload cover buku (image validation)
- Validasi lengkap di sisi server

⭐ Penilaian & Komentar
- Rating 1–5 dari user (1x per buku)
- Komentar pengguna (dihapus oleh pemilik)
- Hanya untuk user login & terverifikasi

✅ Testing
- Unit Test: validasi form, logika autentikasi
- Integration Test: rating, komentar, filter publik

📄 Library & Tools Pihak Ketiga
Laravel Breeze - Sistem auth & verifikasi email  
Mailtrap.io - Testing pengiriman email saat dev  

🌟 Fitur Tambahan
- Komentar pengguna pada detail buku
- Dashboard interaktif & informatif
- Validasi form & error handling
- Penggunaan middleware auth dan verified
- Unit & integration test untuk logic utama

👨‍💻 Developer

Nama: Muhammad Rizky Dwiansyah  
Role: Fullstack Developer (Laravel + PostgreSQL)  
Asal: Bogor  
Lulusan: SMK Wikrama Bogor, 2025  

⚙️ Teknologi

Framework: Laravel 10.x  
Frontend: Blade (Laravel Breeze)  
Database: PostgreSQL  
Auth: Laravel Breeze + Email Verification  
Charting: Chart.js  
Styling: Tailwind CSS  
Email Testing: Mailtrap.io  
Testing: PHPUnit  



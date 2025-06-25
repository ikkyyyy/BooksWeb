<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;




Route::get('/', [BookController::class, 'daftar'])->name('books.daftar');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index']);
// });

   
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/daftar', [BookController::class, 'daftar'])->name('books.daftar');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
    Route::middleware('auth')->post('/books/{book}/rate', [BookController::class, 'rate'])->name('books.rate');

    Route::resource('books', BookController::class);

    
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

   
   
});

require __DIR__.'/auth.php';



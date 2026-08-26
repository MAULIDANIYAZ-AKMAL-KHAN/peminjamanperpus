<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PeminjamanController as AdminPeminjamanController;
use App\Http\Controllers\User\KatalogController;
use Illuminate\Support\Facades\Route;

// Redirect Halaman Utama ke Login
Route::get('/', function () {
    return redirect()->route('login');
});

// Route Katalog & Peminjaman Mandiri Siswa
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [KatalogController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/pinjam', [KatalogController::class, 'store'])->name('user.pinjam');
    Route::patch('/dashboard/kembali/{peminjaman}', [KatalogController::class, 'updateStatus'])->name('user.kembali');
});

// Route Khusus Admin
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('/admin/buku', BukuController::class, ['as' => 'admin']);
    Route::resource('/admin/user', UserController::class, ['as' => 'admin']);
    Route::resource('/admin/peminjaman', AdminPeminjamanController::class, ['as' => 'admin']);
    Route::patch('/admin/peminjaman/{peminjaman}/kembali', [AdminPeminjamanController::class, 'updateStatus'])->name('admin.peminjaman.kembali');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
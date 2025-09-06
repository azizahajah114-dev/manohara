<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Kategori\KategoriController;
use App\Http\Controllers\Variasi\VariasiController;
use App\Http\Controllers\UserSewaController;
use App\Http\Controllers\UserUlasanController;
use App\Http\Controllers\Sewa\SewaController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Laporan\LaporanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\UserProdukController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Halaman user (frontend)
// Route::prefix('users')->group(function () {
//     // routes/web.php
//     // Route::get('/detail', function () {
//     //     return view('users.detail');
//     // });

//     // Route::get('/contact', function () {
//     //     return view('users.contact');
//     // });

//     // Route::get('/sewa', function () {
//     //     return view('users.sewa.sewa');
//     // });

//     // Route::get('/konfirmasi', function () {
//     //     return view('users.sewa.konfirmasi');
//     // });

//     // Route::get('/syarat', function () {
//     //     return view('users.syarat-ketentuan');
//     // });
// });

// ================== ROUTE ADMIN ==================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Manajemen Produk dan Variasi
    Route::get('/produk/manajement', [ProdukController::class, 'manajemen'])->name('produk.manajemen');
    // CRUD Produk untuk admin
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');      // daftar produk
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create'); // form tambah
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');        // simpan produk
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit'); // form edit
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');  // update produk
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy'); // hapus produk

    // CRUD Pengguna
    Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna.index');
    Route::get('/pengguna/{id}', [UserController::class, 'show'])->name('pengguna.detail');

    // kategori
    Route::get('/kategori', function () {
        return view('admin.kategori.index');
    })->name('kategori.index');

    // Route::get('/kategori/create', function () {
    //     return view('admin.kategori.create');
    // })->name('kategori.create');
    Route::resource('kategori', KategoriController::class)->names('kategori');

    // Variasi
    Route::get('/variasi', function () {
        return view('admin.variasi.index');
    })->name('variasi.index');
    
    Route::resource('variasi', VariasiController::class)->names('variasi');

    // Sewa
    Route::get('/sewa/index', [SewaController::class, 'index'])->name('sewa.index');
    //detail data sewa
    Route::get('/sewa/{id}/detail', [SewaController::class, 'showDetail'])->name('sewa.detail');
    Route::get('/sewa/konfirmasi', [SewaController::class, 'menungguKonfirmasi'])->name('sewa.menunggu');
    Route::put('/sewa/{id}/proses', [SewaController::class, 'prosesSewa'])->name('sewa.proses');
    Route::put('/sewa/{id}/disewa', [SewaController::class, 'setSewa'])->name('sewa.setSewa');
    Route::get('/sewa/pengembalian', [SewaController::class, 'prosesPengembalian'])->name('sewa.pengembalian');
    Route::put('/sewa/{id}/selesai', [SewaController::class, 'selesaiSewa'])->name('sewa.selesai');
    Route::put('/sewa/{id}/tolak', [SewaController::class, 'tolakSewa'])->name('sewa.tolak');

    //laporan
    Route::get('/laporan/index', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('laporan/pdf', [LaporanController::class, 'exportPdf'])->name('laporan.pdf');
});

// ================== ROUTE USER ==================
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/users/dashboard', function () {
        return view('users.dashboard_user');
    })->name('dashboard');

    //list of items
    Route::get('/product', [UserProdukController::class, 'index'])->name('users.product');
    Route::get('/detail/{id}', [UserProdukController::class, 'show'])->name('users.detail');

    //syarat-ketentuan
    Route::get('/syarat', function () {
        return view('users.syarat-ketentuan');
    })->name('syarat');

    //contact
    Route::get('/contact', function () {
        return view('users.contact');
    })->name('contact');

    //ulasan
    Route::post('/ulasan/{id_produk}', [UserUlasanController::class, 'store'])->name('ulasan.store');

    // Sewa
    Route::get('/sewa/{id}', [UserSewaController::class, 'create'])->name('sewa.sewa');
    Route::post('/sewa/{id}/konfirmasi', [UserSewaController::class, 'confirm'])->name('sewa.konfirmasi');
    Route::post('/sewa/{id}/store', [UserSewaController::class, 'store'])->name('sewa.store');
    //riwayat
    Route::get('/riwayat/index', [UserSewaController::class, 'riwayatSewa'])->name('users.riwayat.index');
    Route::get('/riwayat/{id}/detail', [UserSewaController::class, 'detailSewa'])->name('riwayat.detail');
    Route::post('/riwayat/{id}/upload-bukti-pembayaran', [UserSewaController::class, 'uploadBukti'])->name('riwayat.uploadBukti');
    //batalkan sewa
    Route::put('/riwayat/{id}/cancel', [UserSewaController::class, 'cancelSewa'])->name('riwayat.cancel');
    //upload bukti pengembalian
    Route::get('/riwayat/{id}/upload-bukti-pengembalian', [UserSewaController::class, 'showBuktiPengembalian'])->name('riwayat.pengembalian');
    Route::post('/riwayat/{id}/upload-bukti-pengembalian', [UserSewaController::class, 'uploadBuktiPengembalian'])->name('riwayat.uploadBuktiPengembalian');
});

// Dashboard umum (bisa login & verified)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard1');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

require __DIR__ . '/auth.php';

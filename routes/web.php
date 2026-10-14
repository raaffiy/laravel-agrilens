<?php

use App\Http\Controllers\AdminModulController;
use App\Http\Controllers\AgriLensController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - AgriLens (Praktikum Modul 3 PABW)
|--------------------------------------------------------------------------
| Seluruh halaman diakses menggunakan Named Routes sesuai ketentuan:
| - route('home')
| - route('module.index')
| - route('module.detail', ['id' => $id])
| - route('news.index')
| - route('news.detail', ['id' => $id])
| - route('quiz.index')
| - route('forum.index')
| - route('lens.ai')
| - route('auth.login')
*/

// 1. Beranda
Route::get('/', [AgriLensController::class, 'home'])->name('home');

// 2. Modul Edukasi Pertanian & Rincian Modul
Route::get('/module', [AgriLensController::class, 'modules'])->name('module.index');
Route::get('/module/{id}', [AgriLensController::class, 'moduleDetail'])->name('module.detail');

// 3. Berita Pertanian & Rincian Berita
Route::get('/news', [AgriLensController::class, 'news'])->name('news.index');
Route::get('/news/{id}', [AgriLensController::class, 'newsDetail'])->name('news.detail');

// 4. Kuis & Tantangan
Route::get('/quiz', [AgriLensController::class, 'quiz'])->name('quiz.index');

// 5. Forum Komunitas Diskusi
Route::get('/forum', [AgriLensController::class, 'forum'])->name('forum.index');

// 6. Lens AI (Deteksi Tanaman)
Route::get('/lens-ai', [AgriLensController::class, 'lensAi'])->name('lens.ai');

// 7. Login / Autentikasi
Route::get('/auth', [AgriLensController::class, 'login'])->name('auth.login');

// 8. Dashboard Utama (Akses Langsung Tanpa Sesi Login)

/*
|--------------------------------------------------------------------------
| Admin CRUD Management Routes (Tanpa Sesi Login)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminModulController::class, 'index'])->name('dashboard');
    Route::get('/modules/create', [AdminModulController::class, 'create'])->name('modules.create');
    Route::post('/modules', [AdminModulController::class, 'store'])->name('modules.store');
    Route::get('/modules/{id}/edit', [AdminModulController::class, 'edit'])->name('modules.edit');
    Route::put('/modules/{id}', [AdminModulController::class, 'update'])->name('modules.update');
    Route::delete('/modules/{id}', [AdminModulController::class, 'destroy'])->name('modules.destroy');
});

// Alias direct route /dashboard
Route::get('/dashboard', [AdminModulController::class, 'index'])->name('dashboard.index');

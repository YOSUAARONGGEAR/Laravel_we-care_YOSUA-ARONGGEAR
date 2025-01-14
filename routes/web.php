<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');
Route::resource('lapor', ReportController::class)->middleware('auth', 'role:user');
Route::get('/kegiatan', [DashboardController::class, 'indexKegiatan'])->name('kegiatan.index');
Route::get('/login', [DashboardController::class, 'login'])->name('login');
Route::post('/login', [DashboardController::class, 'loginPost'])->name('login.post');
Route::post('/register', [DashboardController::class, 'registerPost'])->name('register.post');
Route::get('/register', [DashboardController::class, 'register'])->name('register');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('dashboard.index');
})->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [KegiatanController::class, 'index'])->name('admins.index');
    Route::get('/admin/create', [KegiatanController::class, 'create'])->name('admins.create');
    Route::post('/admin/store', [KegiatanController::class, 'store'])->name('admins.store');
    Route::get('/admin/{id}', [KegiatanController::class, 'show'])->name('admins.show');
    Route::get('/admin/{id}/edit', [KegiatanController::class, 'edit'])->name('admins.edit');
    Route::put('/admin/{id}', [KegiatanController::class, 'update'])->name('admins.update');
    Route::delete('/admin/{id}', [KegiatanController::class, 'destroy'])->name('admins.destroy');
});

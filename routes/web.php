<?php

use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\HomeController;
use App\Livewire\Public\ProgramIndex;
use App\Livewire\Public\ServiceHub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Portal Publik (4 Halaman Utama Terpisah)
|--------------------------------------------------------------------------
| Berdasarkan arsitektur anti-bising pada preview.html & docs/prd.md:
| 1. GET /          → HomeController (Beranda)
| 2. GET /tentang   → AboutController (Profil, Sejarah, Mars, Bagan Bertingkat)
| 3. GET /kegiatan  → ProgramIndex (Kalender Proker Livewire)
| 4. GET /layanan   → ServiceHub (Student Hub Livewire: Pinjam, QR, Aspirasi, Aset)
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang', [AboutController::class, 'index'])->name('about');
Route::get('/kegiatan', ProgramIndex::class)->name('programs.index');
Route::get('/layanan', ServiceHub::class)->name('services.hub');

/*
|--------------------------------------------------------------------------
| Otentikasi Pengurus (Dual-Role: Superadmin & Admin)
|--------------------------------------------------------------------------
*/
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended(route('home'))->with('status', 'Berhasil masuk ke sistem.');
    }

    return back()->withErrors([
        'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
    ])->onlyInput('email');
})->name('login');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');

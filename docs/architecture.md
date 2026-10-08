# SYSTEM ARCHITECTURE & DEVELOPER KICKSTART GUIDE
## Web Profil & Sistem Manajemen Organisasi HMTS UNTAD
**Stack:** Laravel 11/12 · Livewire 3 · Alpine.js · Tailwind CSS · MySQL  
**Database Engine:** MySQL 8.0+ / MariaDB 10.11+ (Localhost)  
**Public Site Architecture:** 4 Halaman Utama Terpisah (Beranda, Tentang Kami, Kegiatan, Layanan)  
**Role Structure:** Simple Dual-Role (`superadmin` & `admin`) tanpa Enum / Spatie  
**Design Aesthetic:** Modern Architectural Civil Engineering · Streamlined Agency Precision · Non-Gimmick Minimalist  
**Reference Benchmark:** `docs/design.md` & `preview.html`  
**Palette:** Canvas `#0A0A0E` · **CTA Tombol Oranye Baja `#CC6600`** (Teks Putih) · **Aksen Sorotan Kuning Helm `#FFE500`** · Tipografi `#FFFFFF` & `#E4E4E7`  
**Infrastructure Principle:** Zero-Redis Monolith · Single VPS Budget-Friendly  
**Timezone:** Asia/Makassar (WITA - UTC+8)  
**Versi Dokumen:** 5.3 (Steel Orange CTA & High-Vis Yellow Accent Edition)  
**Tanggal Pembaruan:** 8 Oktober 2026  

---

## 1. Panduan Memulai Proyek Cepat (Developer Kickstart: 0 to Running)

### 1.1 Persyaratan Sistem
- **PHP:** 8.3 atau 8.4 (Ekstensi: `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `gd`, `curl`)
- **Composer:** 2.6+
- **Node.js & NPM:** Node 20 LTS atau 22 LTS, NPM 10+
- **Database:** MySQL 8.0+ atau MariaDB 10.11+ (Localhost)
- **Infrastruktur Memory:** Cukup single VPS murah (1–2 GB RAM), **tanpa perlu instalasi daemon Redis**.

### 1.2 Langkah Instalasi Ramping (Lean Dependencies)

```bash
# 1. Masuk ke root direktori repositori
cd hmts-web

# 2. Buat proyek Laravel baru
composer create-project laravel/laravel:^11.0 . --prefer-dist

# 3. Pasang paket Composer esensial (Bebas Spatie & Bebas PhpSpreadsheet)
composer require livewire/livewire:^3.5 \
    simplesoftwareio/simple-qrcode:^4.2 \
    barryvdh/laravel-dompdf:^3.0 \
    intervention/image-laravel:^1.3

# 4. Pasang auth starter kit (Breeze Blade)
composer require laravel/breeze --dev
php artisan breeze:install blade --no-interaction

# 5. Pasang dependensi frontend NPM
npm install -D @tailwindcss/forms @tailwindcss/typography
npm install @alpinejs/mask @alpinejs/collapse html5-qrcode

# 6. Duplikasi dan sesuaikan file lingkungan (.env)
cp .env.example .env
php artisan key:generate

# Konfigurasi Database MySQL & Driver Bawaan Tanpa Redis:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=hmts_db
# DB_USERNAME=root
# DB_PASSWORD=your_password
#
# CACHE_STORE=database
# QUEUE_CONNECTION=database
# SESSION_DRIVER=database

# 7. Hubungkan storage publik & buat direktori privat
php artisan storage:link
mkdir -p storage/app/private/receipts
mkdir -p storage/app/private/letters

# 8. Jalankan migrasi MySQL dan seeder awal
php artisan migrate --seed

# 9. Jalankan server pengembangan
php artisan serve
npm run dev
```

### 1.3 Konfigurasi Disk Storage Privat (`config/filesystems.php`)
```php
'disks' => [
    'public' => [
        'driver' => 'local',
        'root' => storage_path('app/public'),
        'url' => env('APP_URL').'/storage',
        'visibility' => 'public',
        'throw' => false,
    ],
    'private' => [
        'driver' => 'local',
        'root' => storage_path('app/private'),
        'visibility' => 'private',
        'throw' => true,
    ],
],
```

---

## 2. Arsitektur Routing & Pembagian 4 Halaman Publik

Sistem membagi portal publik menjadi **4 halaman terpisah yang bersih** untuk memastikan pengalaman pengguna yang fokus dan navigasi yang lapang:

```
Portal Publik:
├── 1. GET /          → HomeController::class          (Beranda: Hero, Profil Singkat, Kelebihan, 5 Pilar, Proker, Layanan Singkat, Peta Map)
├── 2. GET /tentang   → AboutController::class         (Tentang Kami, Visi Misi, Mars, Struktur)
├── 3. GET /kegiatan  → ProgramIndex::class (Livewire) (Kalender Proker, Detail TOR, Daftar Tim)
└── 4. GET /layanan   → ServiceHub::class (Livewire)   (Hub Pinjam Alat, QR, Aspirasi, Aset)

Command Center Internal (/app):
└── 5. GET /app/*     → Dashboard / Livewire Modul     (Khusus Superadmin & Admin)
```

### 2.1 Definisi Routing (`routes/web.php`)
```php
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\AboutController;
use App\Livewire\Public\ProgramIndex;
use App\Livewire\Public\ServiceHub;

// --- PORTAL PUBLIK (4 HALAMAN UTAMA) ---
Route::get('/', HomeController::class)->name('home');
Route::get('/tentang', AboutController::class)->name('about');
Route::get('/kegiatan', ProgramIndex::class)->name('programs.index');
Route::get('/layanan', ServiceHub::class)->name('services.hub');

// --- OTENTIKASI & COMMAND CENTER INTERNAL (/APP) ---
Route::middleware(['auth'])->prefix('app')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('app.dashboard');
    // Modul M1 - M12 khusus Superadmin & Admin...
});
```

---

## 3. Ikhtisar Arsitektur Sistem: Zero-Redis Modern Monolith

```
                      [ Pengunjung Publik ]         [ Admin & Superadmin ]
                                │                              │
                (Portal Publik: 4 Halaman)             (Dashboard /app)
               [ / , /tentang, /kegiatan, /layanan ]           │
                                │                              │
                                └───┐                      ┌───┘
                                    ▼                      ▼
                     ┌──────────────────────────────────────────────┐
                     │          Nginx Web Server / Reverse Proxy    │
                     │          (SSL Let's Encrypt, Gzip, Security) │
                     └──────────────────────┬───────────────────────┘
                                            │
                                            ▼
                     ┌──────────────────────────────────────────────┐
                     │             PHP 8.3+ (PHP-FPM)               │
                     │  ┌────────────────────────────────────────┐  │
                     │  │            Laravel 11/12 Engine        │  │
                     │  ├───────────────────┬────────────────────┤  │
                     │  │ Blade Views       │ Livewire 3 Engine  │  │
                     │  │ (4 Public Pages)  │ (/app & Services)  │  │
                     │  ├───────────────────┴────────────────────┤  │
                     │  │ Middlewares (Auth, ActivePeriodScope,  │  │
                     │  │  Role Gate, Throttle, Native Honeypot) │  │
                     │  ├────────────────────────────────────────┤  │
                     │  │ Eloquent ORM + Action Classes          │  │
                     │  └───────────────────┬────────────────────┘  │
                     └──────────────────────┼───────────────────────┘
                                            │
                     ┌──────────────────────┴───────────────────────┐
                     ▼                                              ▼
            ┌──────────────────────────────────┐          ┌──────────────────────┐
            │         MySQL 8.0+ Database      │          │ Storage Disks        │
            │ ├─ Tabel Bisnis (Members, Cash)  │          │ ├─ Public (Foto/Logo)│
            │ ├─ Tabel Cache (QR Token 30s)    │          │ └─ Private (Nota/PDF)│
            │ ├─ Tabel Jobs (Queue Background) │          └──────────────────────┘
            │ └─ Tabel Sessions                │
            └──────────────────────────────────┘
```

---

## 4. Skema Basis Data & Model Autentikasi Pengguna

### 4.1 Skema Tabel `users` Sederhana (Tanpa Enum)
```sql
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'admin', -- 'superadmin' atau 'admin'
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

### 4.2 Otorisasi Native pada Model `User` (`app/Models/User.php`)
```php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    public function isSuperAdmin(): bool
    {
        return $this->role === 'superadmin';
    }

    public function isAdmin(): bool
    {
        return in_array($this->role, ['admin', 'superadmin']);
    }
}
```

---

## 5. Pola Desain Perangkat Lunak Inti

### 5.1 Multi-Tenancy Temporal: `ActivePeriodScope`
```php
namespace App\Models\Scopes;

use App\Models\Period;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Session;

class ActivePeriodScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $periodId = Session::get('selected_period_id', function () {
            return cache()->remember('active_period_id', 3600, function () {
                return Period::where('is_active', true)->value('id');
            });
        });

        if ($periodId) {
            $builder->where($model->getTable() . '.period_id', $periodId);
        }
    }
}
```

### 5.2 Immutable Financial Ledger dengan Otorisasi Superadmin: `VoidCashTransactionAction`
```php
namespace App\Actions\Cash;

use App\Models\CashTransaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;

class VoidCashTransactionAction
{
    public function execute(CashTransaction $transaction, string $reason, User $voidedBy): CashTransaction
    {
        if (!$voidedBy->isSuperAdmin()) {
            throw new AuthorizationException('Hanya Superadmin yang memiliki otoritas pembatalan transaksi kas.');
        }

        if ($transaction->status === 'voided') {
            throw ValidationException::withMessages([
                'transaction' => 'Transaksi ini sudah pernah dibatalkan (void).'
            ]);
        }

        return DB::transaction(function () use ($transaction, $reason, $voidedBy) {
            $transaction->update([
                'status' => 'voided',
                'void_reason' => $reason,
                'voided_by_user_id' => $voidedBy->id,
                'voided_at' => now(),
            ]);

            $account = $transaction->cashAccount;
            if ($transaction->type === 'masuk') {
                $account->decrement('current_balance', $transaction->amount);
            } else {
                $account->increment('current_balance', $transaction->amount);
            }

            return $transaction;
        });
    }
}
```

### 5.3 Anti-Bentrok Jadwal Peminjaman Alat: `CheckBorrowingConflictAction`
```php
namespace App\Actions\Inventory;

use App\Models\Inventory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CheckBorrowingConflictAction
{
    public function isAvailable(Inventory $inventory, int $requestedQty, Carbon $start, Carbon $end, ?int $excludeBorrowingId = null): bool
    {
        $reservedQty = DB::table('borrowing_items')
            ->join('borrowings', 'borrowings.id', '=', 'borrowing_items.borrowing_id')
            ->where('borrowing_items.inventory_id', $inventory->id)
            ->whereIn('borrowings.status', ['disetujui', 'sedang_dipinjam'])
            ->when($excludeBorrowingId, fn($q) => $q->where('borrowings.id', '!=', $excludeBorrowingId))
            ->where(function ($q) use ($start, $end) {
                $q->where('borrowings.start_time', '<', $end)
                  ->where('borrowings.expected_return_time', '>', $start);
            })
            ->sum('borrowing_items.qty');

        return ($inventory->total_qty - $reservedQty) >= $requestedQty;
    }
}
```

### 5.4 Ekspor Rekap Data Hemat RAM (*Native Streamed CSV*)
```php
namespace App\Actions\Export;

use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\CashTransaction;

class ExportCashTransactionsCsvAction
{
    public function execute(): StreamedResponse
    {
        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Tanggal', 'Akun Kas', 'Tipe', 'Keterangan', 'Nominal', 'Status']);

            CashTransaction::with('cashAccount')
                ->orderBy('created_at')
                ->chunk(200, function ($transactions) use ($handle) {
                    foreach ($transactions as $t) {
                        fputcsv($handle, [
                            $t->created_at->format('Y-m-d H:i'),
                            $t->cashAccount->name,
                            $t->type,
                            $t->description,
                            $t->amount,
                            $t->status,
                        ]);
                    }
                });

            fclose($handle);
        }, 'rekap-kas-hmts-' . date('Y-m-d') . '.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }
}
```

---

## 6. Standar UI/UX Frontend & Desain Multi-Halaman

Mengacu pada [`docs/design.md`](file:///C:/Users/hp/Desktop/hmts-web/docs/design.md) dan prototipe [`preview.html`](file:///C:/Users/hp/Desktop/hmts-web/preview.html):
- **Floating Island Navbar:** Navbar kapsul mengambang 4 menu (`BERANDA`, `TENTANG KAMI`, `KEGIATAN`, `LAYANAN`) + tombol `LOGIN PENGURUS ↗`.
- **Halaman 1 (Beranda):** Hero monumental dengan panah sirkular (`→`), pintasan layanan cepat, teaser 5 pilar peminatan, teaser proker, dan banner akreditasi.
- **Halaman 2 (Tentang Kami):** Narasi sejarah sejak 1994, filosofi logo segitiga truss, visi & 3 pilar misi kabinet, lirik & pemutar audio Mars HMTS FT-UNTAD, serta struktur kepengurusan lengkap (BPH & 5 Departemen).
- **Halaman 3 (Kegiatan):** Kalender timeline tahunan, filter kategori proker, kartu detail kompetisi Civil Expo/BIM/Desa, unduh berkas TOR, dan pendaftaran.
- **Halaman 4 (Layanan):** Hub 4 tab (Peminjaman Alat Lab M7/M8 anti-bentrok, Scan Presensi QR M2, Kotak Aspirasi & Lacak Tiket M11, dan Bank Aset M12).

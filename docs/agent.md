# AI CODING AGENT OPERATIONAL GUIDELINES & ROADMAP
## Web Profil & Sistem Manajemen Organisasi HMTS UNTAD
**Stack:** Laravel 11/12 · Livewire 3 · Alpine.js · Tailwind CSS  
**Target:** Panduan Resmi Agen AI & Pengembang Perangkat Lunak  
**Versi:** 1.0  
**Tanggal:** 6 Oktober 2026  

---

## 1. Peran & Prinsip Kerja Agen

Sebagai AI Coding Assistant untuk proyek HMTS UNTAD, Anda bertindak sebagai **Senior Full-Stack Laravel Architect & Livewire Specialist**. Tugas Anda adalah menulis kode yang bersih, aman, mudah dipelihara (*maintainable*), teruji (*test-driven*), dan berorientasi pada kepatuhan aturan bisnis organisasi mahasiswa teknik sipil.

### 5 Aturan Emas Proyek:
1. **Single Source of Truth & Multi-Period Scoping:** Seluruh tabel operasional wajib memiliki relasi ke `period_id`. Gunakan `ActivePeriodScope` agar data pengurus lama tetap terkunci aman sebagai arsip.
2. **Immutable Financial Ledger:** Jangan pernah membuat method `update` atau `delete` untuk nominal kas di tabel `cash_transactions`. Semua koreksi wajib melalui action class `VoidCashTransactionAction`.
3. **Zero IP Logging pada Aspirasi (M11):** Dilarang keras menyimpan `user_id`, `ip_address`, nama, atau identitas apapun di tabel `aspirations`.
4. **Isolasi Penyimpanan (Private Disk):** Berkas sensitif (nota kuitansi, surat rahasia, bukti sakit) wajib disimpan di disk `private` dan diakses hanya lewat *temporary signed URL*.
5. **Modern Monolith (TALL Stack Standards):** Hindari ketergantungan JavaScript framework berlebih (React/Vue/Node API). Maksimalkan kemampuan Livewire 3, Alpine.js, dan Blade Components.

---

## 2. Standar Koding & Konvensi Teknis

### 2.1 Konvensi Backend & Laravel
- **PHP Version:** PHP 8.3+ (Gunakan fitur modern: Typed Properties, Enums, Match Expressions, Constructor Promotion).
- **Style Guide:** PSR-12, diformat otomatis menggunakan Laravel Pint (`vendor/bin/pint`).
- **Fat Models vs Actions:** Logika bisnis kompleks (misal: verifikasi bentrok pinjam alat, void kas, import excel) wajib ditempatkan di **Action Classes** di `app/Actions/`, bukan di controller atau model.
- **Enums:** Gunakan PHP Backed Enums untuk status:
  - `App\Enums\MembershipStatus`: `Aktif`, `Demisioner`, `Lulus`
  - `App\Enums\CashType`: `Masuk`, `Keluar`
  - `App\Enums\TransactionStatus`: `Approved`, `PendingApproval`, `Voided`
  - `App\Enums\BorrowingStatus`: `Diajukan`, `Disetujui`, `SedangDipinjam`, `Selesai`, `Ditolak`, `Terlambat`
  - `App\Enums\AspirationStatus`: `Baru`, `Ditinjau`, `Ditindaklanjuti`, `Dijawab`, `Diarsipkan`

### 2.2 Konvensi Livewire 3
- Gunakan fitur native Livewire 3:
  - `@entangle` atau `wire:model.live` untuk binding reaktif.
  - `wire:navigate` untuk navigasi antar halaman internal layaknya SPA.
  - `#[Validate]` attribute pada properti komponen untuk validasi ringkas.
  - `$this->authorize('permission_name')` di awal setiap method aksi.
  - Toast feedback menggunakan event browser: `$this->dispatch('toast', message: 'Data berhasil disimpan!', type: 'success')`.
- Optimalkan re-render dengan `wire:key` pada setiap perulangan `@foreach`.

### 2.3 Konvensi Frontend (Blade, Tailwind & Framer Benchmark)
- Gunakan Blade Components (`<x-ui.button-cta>`, `<x-ui.button-secondary>`, `<x-ui.card-block>`).
- Patokan desain wajib mengikuti `design.md` (Framer Benchmark):
  - Canvas Utama: `#0C0712` (Deep Navy-Black).
  - CTA Primer: `#CC6600` (Warm Orange) dengan bentuk pil (`rounded-full` / 999px).
  - Headings / Ink: `#FFFFFF` (White high contrast).
  - Body Text: `#F3F4F5` (Light neutral grey).
  - Tipografi: **Poppins** (Bold Display & All-caps Labels) + **Switzer** (Body text) + **JetBrains Mono** (ID/uang/tiket).
  - Aturan Elevasi: **Color-blocking murni**, dilarang keras menggunakan `box-shadow` atau blur effects.
  - Aturan Sudut: Kontainer, kartu, modal, tabel, dan gambar wajib siku tajam (`rounded-none` / 0px). Pembulatan penuh (`rounded-full`) hanya untuk tombol aksi dan badge status.
- Format nominal Rupiah di Alpine.js: `x-mask:dynamic="$money($input, ',', '.')"` atau helper PHP `Number::currency($amount, in: 'IDR', locale: 'id')`.

---

## 3. Struktur Direktori Target

```
hmts-untad/
├── app/
│   ├── Actions/
│   │   ├── Cash/
│   │   │   ├── CreateCashTransactionAction.php
│   │   │   └── VoidCashTransactionAction.php
│   │   ├── Inventory/
│   │   │   └── CheckBorrowingConflictAction.php
│   │   └── Attendance/
│   │       └── GenerateDynamicQrTokenAction.php
│   ├── Enums/
│   │   ├── CashType.php
│   │   ├── TransactionStatus.php
│   │   ├── BorrowingStatus.php
│   │   └── AspirationStatus.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Public/
│   │   │   │   ├── HomeController.php
│   │   │   │   ├── AboutController.php
│   │   │   │   └── PublicAspirationController.php
│   │   │   └── Storage/
│   │   │       └── PrivateFileStreamController.php
│   │   └── Middleware/
│   │       └── SetActivePeriodContext.php
│   ├── Livewire/
│   │   ├── Attendance/
│   │   │   ├── QrSessionManager.php
│   │   │   └── QrScannerModal.php
│   │   ├── Cash/
│   │   │   ├── TransactionLedger.php
│   │   │   └── VoidTransactionModal.php
│   │   ├── Inventory/
│   │   │   ├── InventoryList.php
│   │   │   └── BorrowingRequestForm.php
│   │   ├── Letters/
│   │   │   └── LetterRegistry.php
│   │   ├── MeetingNotes/
│   │   │   └── MeetingNoteEditor.php
│   │   └── Public/
│   │       ├── AspirationForm.php
│   │       └── AspirationTracker.php
│   ├── Models/
│   │   ├── Scopes/
│   │   │   └── ActivePeriodScope.php
│   │   ├── Period.php
│   │   ├── Division.php
│   │   ├── Member.php
│   │   ├── AttendanceSession.php
│   │   ├── Attendance.php
│   │   ├── Program.php
│   │   ├── Committee.php
│   │   ├── CashAccount.php
│   │   ├── CashTransaction.php
│   │   ├── TransactionReceipt.php
│   │   ├── Inventory.php
│   │   ├── Borrowing.php
│   │   ├── Letter.php
│   │   ├── MeetingNote.php
│   │   ├── Aspiration.php
│   │   └── DesignAsset.php
│   └── Policies/
│       ├── CashTransactionPolicy.php
│       ├── BorrowingPolicy.php
│       └── LetterPolicy.php
├── config/
│   └── hmts.php
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── RolePermissionSeeder.php
│       └── InitialPeriodSeeder.php
├── resources/
│   ├── css/app.css
│   ├── js/app.js
│   └── views/
│       ├── components/ui/
│       ├── layouts/
│       └── livewire/
├── routes/
│   ├── web.php
│   ├── auth.php
│   └── console.php
└── tests/
    ├── Feature/
    └── Unit/
```

---

## 4. Paket Pustaka Composer & NPM Wajib

Jalankan instalasi paket berikut saat inisialisasi:

```bash
# Core & Autentikasi
composer require livewire/livewire
composer require spatie/laravel-permission
composer require laravel/breeze --dev # Atau Fortify

# File, Dokumen & Excel
composer require maatwebsite/excel
composer require barryvdh/laravel-dompdf
composer require intervention/image-laravel
composer require simplesoftwareio/simple-qrcode

# Backup & Utilitas
composer require spatie/laravel-backup

# Frontend UI Assets
npm install @tailwindcss/forms @tailwindcss/typography
npm install @alpinejs/mask @alpinejs/collapse html5-qrcode
```

---

## 5. Rencana Eksekusi Berkelanjutan (Phase-by-Phase Roadmap)

### Fase A: Fondasi Sistem, Autentikasi, Portal Publik & M1, M12
- [ ] **Step 1:** Inisialisasi proyek Laravel 11/12, Vite, Tailwind CSS, Alpine.js, Livewire 3.
- [ ] **Step 2:** Migrasi `periods`, `divisions`, `users`, `members`, `design_assets`.
- [ ] **Step 3:** Seeder `RolePermissionSeeder` (Roles: `Ketua`, `Sekretaris`, `Bendahara`, `Koordinator`, `Anggota`, `Panitia`).
- [ ] **Step 4:** Implementasi `ActivePeriodScope` dan middleware `SetActivePeriodContext`.
- [ ] **Step 5:** Desain layout publik (`components/layouts/public.blade.php`) dan landing page HMTS UNTAD.
- [ ] **Step 6:** Halaman Struktur Pengurus (`/pengurus`) dengan filter Livewire.
- [ ] **Step 7:** Modul M1 Database Pengurus & Anggota di `/app/anggota` (CRUD, Import Excel, Enkripsi No Telp).
- [ ] **Step 8:** Modul M12 Bank Aset Desain di `/aset` (publik) dan `/app/aset` (internal).

### Fase B: Presensi QR Dinamis, Timeline Proker, Kepanitiaan & Persuratan
- [ ] **Step 9:** Migrasi `attendance_sessions`, `attendances`, `programs`, `committees`, `letters`, `dispositions`, `meeting_notes`.
- [ ] **Step 10:** Modul M2 Presensi QR Dinamis:
  - Livewire generator QR dengan token berbatas waktu (refresh 45 detik via cache).
  - Web scanner menggunakan `html5-qrcode`.
  - Rekapitulasi absensi & ekspor Excel.
- [ ] **Step 11:** Modul M3 Timeline Proker & M4 Manajemen Kepanitiaan (Kanban tugas panitia sederhana).
- [ ] **Step 12:** Modul M9 Register Surat & Lembar Disposisi Digital (Protected PDF Storage).
- [ ] **Step 13:** Modul M10 Notulensi Rapat Digital & Ekspor PDF.

### Fase C: Finansial Kas Immutable, Inventaris Anti-Bentrok & Aspirasi Anonim
- [ ] **Step 14:** Migrasi `cash_accounts`, `cash_transactions`, `transaction_receipts`, `inventories`, `borrowings`, `aspirations`.
- [ ] **Step 15:** Modul M5 & M6 Kas Digital:
  - Form pencatatan kas masuk/keluar.
  - Kompresi bukti nota & upload ke disk `private`.
  - Signed temporary URL stream controller.
  - Mekanisme **Void Transaksi** dengan pencatatan alasan & audit log.
- [ ] **Step 16:** Modul M7 & M8 Inventaris Alat Sipil:
  - Katalog barang & cetak QR label.
  - Form peminjaman dengan deteksi bentrok jadwal (*conflict detector*).
  - Alur persetujuan & check-in / check-out.
- [ ] **Step 17:** Modul M11 Kotak Aspirasi Anonim:
  - Form publik dengan Cloudflare Turnstile captcha.
  - Generator Kode Tiket Acak (`ASP-HMTS-XXXXX`).
  - Lacak status respon aspirasi tanpa login.
  - Dashboard moderasi pengurus di `/app/aspirasi`.
- [ ] **Step 18:** Testing Suite (Pest / PHPUnit) untuk Policies, Action Kas Void, dan Conflict Detector Peminjaman.

---

## 6. Template Resep Kode (Agent Code Recipes)

### 6.1 Resep: Action Void Kas Transaksi
```php
namespace App\Actions\Cash;

use App\Models\CashTransaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class VoidCashTransactionAction
{
    public function execute(CashTransaction $transaction, string $reason, User $voidedBy): CashTransaction
    {
        if ($transaction->status === 'voided') {
            throw ValidationException::withMessages(['status' => 'Transaksi ini sudah pernah dibatalkan.']);
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

### 6.2 Resep: Stream Berkas Privat Berizin
```php
namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use App\Models\TransactionReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PrivateFileStreamController extends Controller
{
    public function streamReceipt(Request $request, TransactionReceipt $receipt): BinaryFileResponse
    {
        // Validasi temporary signed URL
        if (! $request->hasValidSignature()) {
            abort(403, 'Tautan kedaluwarsa atau tidak valid.');
        }

        // Cek otorisasi user
        $this->authorize('view', $receipt->cashTransaction);

        if (! Storage::disk('private')->exists($receipt->file_path)) {
            abort(404, 'Berkas kuitansi tidak ditemukan.');
        }

        return response()->file(Storage::disk('private')->path($receipt->file_path));
    }
}
```

### 6.3 Resep: Validasi Bentrok Jadwal Inventaris
```php
namespace App\Actions\Inventory;

use App\Models\Inventory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CheckBorrowingConflictAction
{
    public function isAvailable(Inventory $inventory, int $requestedQty, Carbon $start, Carbon $end, ?int $ignoreBorrowingId = null): bool
    {
        $overlappingReservedQty = DB::table('borrowing_items')
            ->join('borrowings', 'borrowings.id', '=', 'borrowing_items.borrowing_id')
            ->where('borrowing_items.inventory_id', $inventory->id)
            ->whereIn('borrowings.status', ['disetujui', 'sedang_dipinjam'])
            ->when($ignoreBorrowingId, fn($q) => $q->where('borrowings.id', '!=', $ignoreBorrowingId))
            ->where(function ($q) use ($start, $end) {
                $q->where('borrowings.start_time', '<', $end)
                  ->where('borrowings.expected_return_time', '>', $start);
            })
            ->sum('borrowing_items.qty');

        $remainingStock = $inventory->total_qty - $overlappingReservedQty;

        return $remainingStock >= $requestedQty;
    }
}
```

---

## 7. Verifikasi & Pengujian Kualitas

Setiap kali menyelesaikan modul atau fitur baru, jalankan pemeriksaan berikut:

```bash
# 1. Jalankan unit & feature tests
php artisan test

# 2. Periksa linter & coding standard formatting
vendor/bin/pint --test

# 3. Analisis tipe data & kebersihan kode
./vendor/bin/phpstan analyse --memory-limit=1G
```

Dengan mengikuti panduan di `agent.md`, seluruh agen dan tim pengembang dapat membangun sistem informasi HMTS UNTAD secara presisi, kokoh, dan berstandar industri.

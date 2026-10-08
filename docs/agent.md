# AI CODING AGENT OPERATIONAL GUIDELINES & ROADMAP
## Web Profil & Sistem Manajemen Organisasi HMTS UNTAD
**Stack:** Laravel 11/12 · Livewire 3 · Alpine.js · Tailwind CSS  
**Design System:** Industrial Civil Engineering & Heavy Construction · Tactical Telemetry  
**Color Benchmark:** Latar `#0C0712` · **CTA Kuning `#FFE500`** · **Pendukung Oranye `#CC6600`**  
**Target:** Panduan Resmi Agen AI & Pengembang Perangkat Lunak  
**Versi:** 3.0 (Civil Construction Edition)  
**Tanggal Pembaruan:** 7 Oktober 2026  

---

## 1. Peran & Prinsip Kerja Agen

Sebagai AI Coding Assistant untuk proyek HMTS UNTAD, Anda bertindak sebagai **Senior Full-Stack Laravel Architect & Livewire Specialist**. Tugas Anda adalah menulis kode yang bersih, aman, mudah dipelihara (*maintainable*), teruji, dan berorientasi pada kepatuhan aturan bisnis organisasi mahasiswa teknik sipil tanpa *over-engineering*.

### 5 Aturan Emas Proyek:
1. **Single Source of Truth & Multi-Period Scoping:** Seluruh tabel operasional wajib memiliki relasi ke `period_id`. Gunakan `ActivePeriodScope` agar data pengurus lama tetap terkunci aman sebagai arsip.
2. **Immutable Financial Ledger:** Jangan pernah membuat method `update` atau `delete` untuk nominal kas di tabel `cash_transactions`. Semua koreksi wajib melalui action class `VoidCashTransactionAction`.
3. **Zero Identity Logging pada Aspirasi (M11):** Dilarang keras menyimpan `user_id`, `ip_address`, nama, atau identitas apapun di tabel `aspirations`.
4. **Isolasi Penyimpanan (Private Disk):** Berkas sensitif (nota kuitansi, surat rahasia, bukti sakit) wajib disimpan di disk `private` dan diakses hanya lewat *temporary signed URL*.
5. **Modern Monolith (TALL Stack Standards):** Maksimalkan kemampuan Livewire 3, Alpine.js, dan Blade Components. Hindari penambahan JavaScript runtime/framework sekunder yang tidak diperlukan.

---

## 2. Standar Koding & Konvensi Frontend

### 2.1 Konvensi Visual: Heavy Civil Construction Aesthetic
- **Latar Belakang Kanvas:** `#0C0712` (Baja struktural pekat / Obsidian) dengan CAD blueprint grid halus.
- **Warna Aksen Kunci (CTA Primer):** **Kuning Konstruksi `#FFE500`** dengan teks kontras hitam pekat `#000000`. Digunakan khusus untuk tombol aksi utama, indikator fokus, dan penanda penting.
- **Warna Pendukung:** **Oranye Baja `#CC6600`** (warna cat primer baja struktural) untuk garis aksen, border penampang modul, overline tags, dan status perhatian.
- **Elemen Gambar Kerja Konstruksi:**
  - Markah penomoran stempel teknik: `[ STA 0+000 ]`, `BM-UNTAD-01`, `ELEV +24.50m`.
  - Garis aksen bahaya (*hazard stripe*).
  - Tanda silang (*crosshairs* `+`) pada sudut-sudut kontainer teknik.
- **Lapisan Kaca Gelap (Structural Tempered Glass):**
  - Panel & Kartu: `bg-brand-surface/80 backdrop-blur-md border border-white/10 rounded-lg shadow-[0_8px_30px_-4px_rgba(0,0,0,0.55)]`
  - Input Field: `bg-black/50 backdrop-blur-md border border-white/15 focus:border-brand-yellow text-white rounded-lg`
- **Tipografi:**
  - Headings / Labels: **Poppins** (Bold/ExtraBold)
  - Data Teknis / Uang / Kode Tiket / Stationing: **JetBrains Mono**
  - Paragraf Bacaan: **Inter**

---

## 3. Struktur Direktori Proyek

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
├── config/
│   └── hmts.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/app.css
│   ├── js/app.js
│   └── views/
│       ├── components/ui/
│       │   ├── button-cta.blade.php
│       │   ├── button-secondary.blade.php
│       │   ├── glass-card.blade.php
│       │   ├── input.blade.php
│       │   └── status-pill.blade.php
│       ├── layouts/
│       │   ├── app.blade.php
│       │   └── public.blade.php
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

```bash
# Core & Autentikasi
composer require livewire/livewire
composer require spatie/laravel-permission
composer require laravel/breeze --dev

# Dokumen, Gambar & QR
composer require maatwebsite/excel
composer require barryvdh/laravel-dompdf
composer require intervention/image-laravel
composer require simplesoftwareio/simple-qrcode

# Frontend UI Assets
npm install -D @tailwindcss/forms @tailwindcss/typography
npm install @alpinejs/mask @alpinejs/collapse html5-qrcode
```

---

## 5. Resep Kode Utama (Action Recipes)

### 5.1 Resep: Action Void Kas Transaksi
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

### 5.2 Resep: Stream Berkas Privat Berizin
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
        if (! $request->hasValidSignature()) {
            abort(403, 'Tautan kedaluwarsa atau tidak valid.');
        }

        $this->authorize('view', $receipt->cashTransaction);

        if (! Storage::disk('private')->exists($receipt->file_path)) {
            abort(404, 'Berkas kuitansi tidak ditemukan.');
        }

        return response()->file(Storage::disk('private')->path($receipt->file_path));
    }
}
```

---

## 6. Verifikasi & Pengujian Kualitas

```bash
# 1. Jalankan unit & feature tests
php artisan test

# 2. Periksa linter & coding standard formatting
vendor/bin/pint --test
```

# AI CODING AGENT OPERATIONAL GUIDELINES & ROADMAP
## Web Profil & Sistem Manajemen Organisasi HMTS UNTAD
**Stack:** Laravel 11/12 · Livewire 3 · Alpine.js · Tailwind CSS · MySQL  
**Database Engine:** MySQL 8.0+ / MariaDB 10.11+  
**Role Structure:** Simple Dual-Role (`superadmin` & `admin`) tanpa Enum / Spatie  
**Design System:** Modern Architectural Civil Engineering · Streamlined Agency Precision · Non-Gimmick Minimalist  
**Color Benchmark:** Latar `#0A0A0E` · **CTA Kuning `#FFE500`** · **Pendukung Oranye `#CC6600`**  
**Infrastructure Principle:** Zero-Redis Monolith · Single VPS Budget-Friendly  
**Target:** Panduan Resmi Agen AI & Pengembang Perangkat Lunak  
**Versi:** 5.1 (Streamlined Civil Edition)  
**Tanggal Pembaruan:** 8 Oktober 2026  

---

## 1. Peran & Prinsip Kerja Agen

Sebagai AI Coding Assistant untuk proyek HMTS UNTAD, Anda bertindak sebagai **Senior Full-Stack Laravel Architect & Livewire Specialist**. Tugas Anda adalah menulis kode yang bersih, aman, mudah dipelihara (*maintainable*), teruji, dan berorientasi pada kepatuhan aturan bisnis organisasi mahasiswa teknik sipil tanpa *over-engineering*.

### 6 Aturan Emas Proyek:
1. **Single Source of Truth & Multi-Period Scoping:** Seluruh tabel operasional wajib memiliki relasi ke `period_id`. Gunakan `ActivePeriodScope` agar data pengurus lama tetap terkunci aman sebagai arsip.
2. **Simple Dual-Role Model (Tanpa Spatie & Tanpa Enum):** Gunakan kolom string `role` (`'superadmin'` / `'admin'`) pada model `User`. Tidak perlu paket Spatie Permission maupun file Enum terpisah. Otorisasi dilakukan via method native model `isSuperAdmin()` dan `isAdmin()`.
3. **Immutable Financial Ledger:** Jangan pernah membuat method `update` atau `delete` untuk nominal kas di tabel `cash_transactions`. Semua koreksi wajib melalui action class `VoidCashTransactionAction` yang hanya boleh dieksekusi oleh `superadmin`.
4. **Zero Identity Logging pada Aspirasi (M11):** Dilarang keras menyimpan `user_id`, `ip_address`, nama, atau identitas apapun di tabel `aspirations`.
5. **Isolasi Penyimpanan (Private Disk):** Berkas sensitif (nota kuitansi, surat rahasia, bukti sakit) wajib disimpan di disk `private` (`storage/app/private`) dan diakses hanya lewat *temporary signed URL*.
6. **Zero-Redis & Zero-Bloat Monolith:** Manfaatkan cache, session, dan queue bawaan database MySQL (`CACHE_STORE=database`, `QUEUE_CONNECTION=database`). Gunakan *Native Streamed CSV* untuk ekspor data (tanpa `maatwebsite/excel`).

---

## 2. Standar Koding & Konvensi Frontend

### 2.1 Konvensi Visual: Modern Civil Engineering Aesthetic (Sesuai `docs/design.md`)
- **Latar Belakang Kanvas:** `#0A0A0E` (Baja struktural pekat / Obsidian Slate) dengan blueprint grid halus.
- **Warna Aksen Kunci (CTA Primer):** **Kuning Konstruksi `#FFE500`** dengan teks kontras hitam pekat `#000000`. Digunakan khusus untuk tombol aksi utama berkapsul (`rounded-full`), indikator kartu aktif, dan penanda penting.
- **Warna Pendukung:** **Oranye Baja `#CC6600`** untuk garis aksen, border pendukung, dan overline tags.
- **Komponen Kunci:**
  - *Floating Island Navbar* berkapsul melengkung penuh (`rounded-full`) dengan efek *backdrop-blur*.
  - *Framed Hero Container* (`rounded-[2rem]`) berlatar foto nyata infrastruktur dan lencana panah sirkular (`→`).
  - *Floating Quick Bar* formulir layanan & aspirasi mengambang di dasar hero.
  - Grid 5 kartu keahlian sipil (dengan status kartu aktif kuning untuk geoteknik).
  - Grid 4 kartu program kerja dengan foto thumbnail di bagian atas.
  - Alur SOP operasional 5 langkah bernomor (`01` s/d `05`).
  - Kotak sorotan akuntabilitas dengan angka metrik 99.2% dan kisi foto civitas.
- **Tipografi:**
  - Headings / Labels: **Poppins** (Bold/Black)
  - Data Teknis / Uang / Kode Tiket / Stationing: **JetBrains Mono**
  - Paragraf Bacaan & UI: **Inter**

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
│   │   ├── Attendance/
│   │   │   └── GenerateDynamicQrTokenAction.php
│   │   └── Export/
│   │       ├── ExportCashTransactionsCsvAction.php
│   │       └── ExportMembersCsvAction.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Public/
│   │   │   │   ├── HomeController.php
│   │   │   │   ├── AboutController.php
│   │   │   │   └── PublicAspirationController.php
│   │   │   └── Storage/
│   │   │       └── PrivateFileStreamController.php
│   │   └── Middleware/
│   │       ├── SetActivePeriodContext.php
│   │       └── EnsureSuperAdmin.php
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
│   │   ├── User.php
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
│       └── InventoryPolicy.php
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
│       │   ├── clean-card.blade.php
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

## 4. Paket Pustaka Composer & NPM Wajib (Lean)

```bash
# Core & Autentikasi
composer require livewire/livewire
composer require laravel/breeze --dev

# Dokumen, Gambar & QR
composer require barryvdh/laravel-dompdf
composer require intervention/image-laravel
composer require simplesoftwareio/simple-qrcode

# Frontend UI Assets
npm install -D @tailwindcss/forms @tailwindcss/typography
npm install @alpinejs/mask @alpinejs/collapse html5-qrcode
```

---

## 5. Resep Kode Utama (Action Recipes)

### 5.1 Resep: Action Void Kas Transaksi (Otorisasi Superadmin)
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

### 5.2 Resep: Ekspor Data Streamed CSV Hemat RAM
```php
namespace App\Actions\Export;

use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Member;

class ExportMembersCsvAction
{
    public function execute(): StreamedResponse
    {
        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['NIM', 'Nama Lengkap', 'Peminatan', 'Divisi', 'Status']);

            Member::with('division')
                ->orderBy('nim')
                ->chunk(200, function ($members) use ($handle) {
                    foreach ($members as $m) {
                        fputcsv($handle, [
                            $m->nim,
                            $m->name,
                            $m->specialization,
                            $m->division?->name ?? '-',
                            $m->status,
                        ]);
                    }
                });

            fclose($handle);
        }, 'data-anggota-hmts-' . date('Y-m-d') . '.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }
}
```

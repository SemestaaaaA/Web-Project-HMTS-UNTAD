# HMTS UNTAD Web Platform & Organization Management System
> Web Profil Resmi & Sistem Manajemen Terpadu Himpunan Mahasiswa Teknik Sipil Universitas Tadulako

**Tech Stack:** Laravel 11/12 · Livewire 3 · Alpine.js · Tailwind CSS · MySQL  
**Database Engine:** MySQL 8.0+ / MariaDB 10.11+  
**Public Architecture:** 4 Halaman Utama Terpisah (`/`, `/tentang`, `/kegiatan`, `/layanan`)  
**Role Structure:** Simple Dual-Role (`superadmin` & `admin`) tanpa Enum / Spatie  
**Aesthetic:** Modern Architectural Civil Engineering · Streamlined Agency Precision · Non-Gimmick Minimalist  
**Infrastructure Principle:** Zero-Redis Monolith · Single VPS Budget-Friendly  
**Timezone:** Asia/Makassar (WITA - UTC+8)  
**Versi:** 5.2 (Multi-Page Public Portal Edition)  

---

## ⚡ Quickstart (0 to Running in 3 Minutes)

```bash
# 1. Instalasi dependensi (Ramping tanpa Spatie & PhpSpreadsheet)
composer install
npm install

# 2. Lingkungan & Storage
cp .env.example .env
php artisan key:generate
php artisan storage:link

# Konfigurasi database MySQL dan driver bawaan tanpa Redis:
# DB_CONNECTION=mysql
# CACHE_STORE=database
# QUEUE_CONNECTION=database
# SESSION_DRIVER=database

# 3. Migrasi MySQL (termasuk cache, jobs, session) & Seeder Awal
php artisan migrate --seed

# 4. Jalankan Server Dev
php artisan serve
npm run dev
```

---

## 🎨 Color Palette & Construction Design System

| Peran | Nilai Hex / Token | Keterangan |
| :--- | :--- | :--- |
| **Canvas Primary** | `#0A0A0E` | Latar utama kanvas gelap struktural (Obsidian Slate) |
| **Surface Dark** | `#121217` | Latar kartu standar & bar navigasi |
| **Surface Elevated** | `#181820` | Latar kartu aktif & bar formulir cepat |
| **CTA Yellow (Utama)**| `#FFE500` | **Aksen CTA primer** & status aktif (High-Vis Safety Yellow) |
| **Steel Orange (Pendukung)**| `#CC6600` | **Warna pendukung** (Primer cat baja, overline penanda) |
| **Ink White** | `#FFFFFF` | Headings & teks kontras tinggi (Poppins / Inter) |
| **Body Muted** | `#E4E4E7` | Isi paragraf & data teks teknis (Inter / Switzer) |

---

## 📚 Dokumentasi Proyek (@docs)

Seluruh spesifikasi dan panduan arsitektur terdokumentasi lengkap di folder `docs/`:

1. **[Product Requirements Document (docs/prd.md)](docs/prd.md)**  
   Arsitektur 4 halaman portal publik (`/`, `/tentang`, `/kegiatan`, `/layanan`), matriks hak akses 2 level (`superadmin` & `admin`), 12 modul operasional (M1–M12), MySQL terpusat, Zero-Redis Monolith, dan roadmap rilis.
2. **[UI/UX Design & Component System (docs/design.md)](docs/design.md)**  
   Pedoman desain modern civil engineering, floating island navbar 4 menu, framed hero, dan prototipe preview.html multi-halaman.
3. **[System Architecture & Developer Kickstart (docs/architecture.md)](docs/architecture.md)**  
   Setup developer cepat, skema routing 4 halaman publik, skema database MySQL, model User role sederhana, justifikasi arsitektur tanpa Redis, ActivePeriodScope, dan immutable cash ledger.
4. **[AI Coding Agent Guidelines (docs/agent.md)](docs/agent.md)**  
   Aturan koding agen, resep Action Classes (termasuk streamed CSV export), otorisasi Superadmin, dan standar TALL Stack.

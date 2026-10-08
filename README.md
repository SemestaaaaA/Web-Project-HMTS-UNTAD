# HMTS UNTAD Web Platform & Organization Management System
> Web Profil Resmi & Sistem Manajemen Terpadu Himpunan Mahasiswa Teknik Sipil Universitas Tadulako

**Tech Stack:** Laravel 11/12 · Livewire 3 · Alpine.js · Tailwind CSS  
**Aesthetic:** Industrial Civil Engineering & Heavy Construction · Tactical Telemetry · Dark Structural Semi-Glass  
**Timezone:** Asia/Makassar (WITA - UTC+8)

---

## ⚡ Quickstart (0 to Running in 3 Minutes)

```bash
# 1. Instalasi dependensi
composer install
npm install

# 2. Lingkungan & Storage
cp .env.example .env
php artisan key:generate
php artisan storage:link

# 3. Migrasi & Seeder Awal
php artisan migrate --seed

# 4. Jalankan Server Dev
php artisan serve
npm run dev
```

---

## 🎨 Color Palette & Construction Design System

| Peran | Nilai Hex / Token | Keterangan |
| :--- | :--- | :--- |
| **Canvas Primary** | `#0C0712` | Latar utama baja struktural gelap (Obsidian Slate) |
| **CTA Yellow (Utama)**| `#FFE500` | **Aksen CTA primer** (High-Vis Safety Yellow / Caterpillar) |
| **Steel Orange (Pendukung)**| `#CC6600` | **Warna pendukung** (Primer cat baja, border aksen teknik) |
| **Ink White** | `#FFFFFF` | Headings & angka pengukuran kontras tinggi (Poppins) |
| **Body Muted** | `#F3F4F5` | Isi paragraf & data teks teknis (Inter / Switzer) |
| **Blueprint Cyan** | `#00BFFF` | Aksen garis CAD, markah elevasi, telemetry survey |
| **Structural Glass** | `rgba(21, 14, 32, 0.82)`| Panel kaca tempered gelap tebal dengan `backdrop-blur-md` |

---

## 📚 Dokumentasi Proyek (@docs)

Seluruh spesifikasi dan panduan arsitektur terdokumentasi lengkap di folder `docs/`:

1. **[Product Requirements Document (docs/prd.md)](docs/prd.md)**  
   Objektif, matriks RBAC, 12 modul operasional (M1–M12), portal publik bertema konstruksi, dan roadmap rilis.
2. **[UI/UX Design & Component System (docs/design.md)](docs/design.md)**  
   Pedoman heavy civil engineering, hazard stripes, drafting crosshairs, token Tailwind, dan komponen Blade UI resmi.
3. **[System Architecture & Developer Kickstart (docs/architecture.md)](docs/architecture.md)**  
   Setup developer cepat, skema database, ActivePeriodScope, immutable cash ledger, dan deployment VPS.
4. **[AI Coding Agent Guidelines (docs/agent.md)](docs/agent.md)**  
   Aturan koding agen, resep Action Classes, konvensi Livewire 3, dan prosedur testing.

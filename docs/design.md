# UI/UX DESIGN & COMPONENT SYSTEM DOCUMENT
## Web Profil & Sistem Manajemen Organisasi HMTS UNTAD
**Design Benchmark:** [hmtstadulako.framer.website](https://hmtstadulako.framer.website/)  
**Stack Frontend:** Tailwind CSS · Livewire 3 · Alpine.js · Blade Components  
**Prinsip Desain:** Bold Dark Canvas · High Contrast · Color-Blocking Elevation · Pill Buttons · Sharp Containers  
**Versi:** 2.0 (Patokan Resmi Framer Design System)  
**Tanggal:** 6 Oktober 2026  

---

## 1. Filosofi & Karakter Visual

Desain HMTS FT-UNTAD merefleksikan **semangat mahasiswa teknik sipil yang berani, solid, dan berorientasi masa depan (bold, youthful, technical innovation)**.

Berdasarkan patokan resmi dari `hmtstadulako.framer.website`:
- **Kanvas Utama Gelap Mendalam (`#0C0712`):** Latar belakang deep navy-black yang kokoh dan berwibawa, bukan hitam polos (`#000000`).
- **Kontras Tipografi Ekstrem:** Judul putih bersih (`#FFFFFF`) berbobot tebal (*bold/heavy*) dengan font **Poppins**, berpadu dengan teks paragraf humanist **Switzer** yang ramah dan mudah dibaca (`#F3F4F5`).
- **Aksen Aksi Oranye Hangat (`#CC6600`):** Tombol Call-to-Action (CTA) interaktif berwarna oranye menyala berbentuk pil (*pill-shaped* `rounded-full` / 999px).
- **Aksen Maskot & Grafis (Kuning & Sian):** Kuning energik (`#FFFF00`) dan sian elektrik (`#00BFFF`) khusus elemen ilustrasi/maskot dan garis geometris, tidak untuk teks biasa.
- **Filosofi Tanpa Bayangan (Zero Drop-Shadows / Color-Blocking):** Kedalaman antarmuka diperoleh murni dari **perbedaan blok warna (color-blocking)**, opasitas terukur (`43%` dan `96%`), dan kontras visual, **bukan** dari efek blur atau `box-shadow`.
- **Ketegasan Geometris (Sharp vs Pill Rule):** Kontainer, kartu, gambar, dan tabel berujung siku tajam (`rounded-none` / 0px). Pembulatan penuh (`rounded-full` / 999px) **hanya** dikhususkan bagi tombol aksi interaktif dan pill badges.

---

## 2. Design Tokens & Pemetaan Tailwind CSS

### 2.1 Palet Warna Resmi (Color Palette)

| Token Nama | Hex Code | Peran Semantik | Tailwind Custom Utility |
| :--- | :--- | :--- | :--- |
| **Canvas Primary** | `#0C0712` | Latar utama kanvas gelap, footer, dan background navigasi | `bg-brand-canvas` / `#0C0712` |
| **CTA Orange** | `#CC6600` | Tombol primer, highlight aksi penting, status perhatian | `bg-brand-orange` / `text-brand-orange` |
| **Ink White** | `#FFFFFF` | Headings, hero titles, teks kontras tinggi pada background gelap | `text-brand-ink` |
| **Body Muted** | `#F3F4F5` | Paragraf, sub-judul, teks pendukung sekunder | `text-brand-body` |
| **Web Link** | `#0000EE` | Hyperlink teks standar, status navigasi aktif | `text-brand-link` |
| **Neutral Utility** | `#000000` | Border halus, aksen divider, teks di atas tombol oranye | `bg-black` / `text-black` |
| **Mascot Yellow** | `#FFFF00` | Aksen grafis, maskot, badge verifikasi istimewa | `text-yellow-400` / `#FFFF00` |
| **Mascot Cyan** | `#00BFFF` | Aksen grafis keteknikan, garis grid blueprint | `text-cyan-400` / `#00BFFF` |

#### Warna Tambahan untuk Sistem Operasional (/app):
Untuk mendukung status transaksional (kas, presensi, surat) tanpa merusak estetika color-blocking:
- **Success (Kas Masuk, Hadir):** `#10B981` (Emerald) — Blok latar `#064E3B` atau teks `#34D399`
- **Warning (Pending, Izin):** `#F59E0B` (Amber) — Blok latar `#78350F` atau teks `#FBBF24`
- **Danger (Kas Keluar, Void, Alpa):** `#EF4444` (Rose) — Blok latar `#7F1D1D` atau teks `#F87171`

```javascript
// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      colors: {
        brand: {
          canvas: '#0C0712',
          surface: '#150E20',       // Color-block permukaan lapis 2
          surfaceLight: '#1E152D',  // Color-block permukaan lapis 3 (hover)
          orange: '#CC6600',        // CTA resmi Framer
          ink: '#FFFFFF',           // Headings
          body: '#F3F4F5',          // Copy text
          link: '#0000EE',
          yellow: '#FFFF00',        // Mascot accent
          cyan: '#00BFFF',          // Technical accent
        }
      },
      borderRadius: {
        'none': '0px',
        'pill': '999px',
      },
      boxShadow: {
        'none': 'none',             // Menegaskan tidak ada drop shadow
      }
    }
  }
}
```

---

### 2.2 Hirarki Tipografi Resmi

Mengikuti patokan ekstraksi Framer, tipografi menggunakan kombinasi **Poppins** untuk display/label dan **Switzer** untuk konten bacaan (dengan fallback **Inter**):

| Token Tipografi | Font Family | Size | Weight | Line Height | Keterangan & Penggunaan |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **`display-lg`** | Poppins | `60px` | 700 (Bold) | 1.1 | Hero headline utama desktop |
| **`display-md`** | Poppins | `51px` | 700 (Bold) | 1.1 | Judul bagian halaman utama |
| **`heading-sm`** | Switzer | `26px` | 600 (Semibold) | 1.2 | Sub-judul bagian / divisi proker |
| **`heading-xs`** | Switzer | `18px` | 700 (Bold) | 1.45 | Judul kartu, sub-seksi modul |
| **`body-xl`** | Switzer | `21px` | 500 (Medium) | 1.45 | Paragraf pembuka / lead statement |
| **`body-lg`** | Switzer | `18px` | 400 (Regular) | 1.45 | Teks bacaan featured |
| **`body-md`** | Switzer | `16px` | 400 (Regular) | 1.45 | Standar teks aplikasi & tabel |
| **`body-md-tight`** | Switzer | `16px` | 400 (Regular) | 1.2 | Teks ringkas / list item |
| **`body-sm`** | Poppins | `13px` | 700 (Bold) | 1.2 | Label seksi ALL-CAPS (e.g. `DIVISI RISET`) |
| **`caption-sm`** | Poppins | `11px` | 700 (Bold) | 1.2 | Tag kategori, metadata tanggal |
| **`caption-xs`** | Poppins | `10px` | 700 (Bold) | 1.2 | Badge status, pill overline kecil |
| **`mono-data`** | JetBrains Mono | `13-15px` | 500 / 700 | 1.3 | Nomor surat, ID alat, tiket aspirasi, kas |

---

### 2.3 Skala Spasi (Spacing Scale 8px Base)

- **`xxs` (8px):** Jarak ikon dan label teks inline.
- **`xs` (12px):** Padding vertikal badge, gap internal tombol kecil.
- **`sm` (16px):** Padding horizontal tombol primer (`8px 16px`), jarak form field.
- **`md` (24px):** Padding bar navigasi, padding internal card.
- **`lg` (32px):** Jarak antar grup elemen dalam satu seksi.
- **`xl` (40px):** Padding vertikal footer (`40px 0px`).
- **`xxl` (48px):** Pemisah antar komponen utama.
- **`xxxl` (56px):** Spasi antar blok konten besar.
- **`section` (64px):** Standar jarak antar bagian halaman (*section divider*).
- **`band` (112px):** Jarak transisi hero section dan pemisah pita konten masif.

---

### 2.4 Aturan Elevasi & Efek (Color-Blocking Strategy)

1. **TIDAK ADA `box-shadow`:** Dilarang menggunakan bayangan `shadow-sm`, `shadow-md`, atau `shadow-xl`. Kedalaman diciptakan melalui pergeseran warna latar:
   - Level 0 (Latar Halaman): `#0C0712` (Canvas gelap murni)
   - Level 1 (Kontainer / Card / Panel): `#150E20` (Surface raised gelap bernuansa ungu-navy halus)
   - Level 2 (Hover / Active State): `#1E152D` (Surface highlight)
2. **Aturan Opasitas Terukur:**
   - **`43%` (`opacity-40` / `0.43`):** Digunakan untuk teks non-aktif, divider garis halus, atau backdrop modal overlay.
   - **`96%` (`opacity-95` / `0.96`):** Digunakan untuk permukaan semi-transparan navigasi yang melayang (*sticky header*).
3. **Z-Index System:**
   - Konten Dasar: `z-index: 1`
   - Sticky Header & Overlays: `z-index: 2`
   - Dropdown Menu & Popovers: `z-index: 10`
   - Toasts & Notifikasi Kritis: `z-index: 2147483647` (Stacking tertinggi absolut)

---

## 3. Komponen Antarmuka Kunci (TALL Stack Implementation)

### 3.1 Tombol Utama (Primary CTA Button)
Sesuai spesifikasi pengukuran Framer:
- **Bentuk:** Pil sempurna (`rounded-full` / 999px)
- **Background:** `#CC6600` (Warm Orange)
- **Teks:** `#000000` (Hitam kontras tinggi), ukuran `12px`, tanpa bold berlebih
- **Padding:** `8px 16px` (Tinggi presisi ~32.8px)
- **Border & Shadow:** `none`

```html
<!-- resources/views/components/ui/button-cta.blade.php -->
<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'inline-flex items-center justify-center rounded-full bg-brand-orange px-4 py-2 text-xs font-normal text-black transition-all hover:bg-[#E67300] active:scale-95 focus:outline-none focus:ring-2 focus:ring-brand-orange focus:ring-offset-2 focus:ring-offset-brand-canvas'
]) }}>
    {{ $slot }}
</button>
```

### 3.2 Tombol Sekunder / Outline (Secondary Pill)
```html
<!-- resources/views/components/ui/button-secondary.blade.php -->
<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'inline-flex items-center justify-center rounded-full border border-white/20 bg-transparent px-4 py-2 text-xs font-normal text-brand-ink transition-all hover:bg-white/10 active:scale-95 focus:outline-none'
]) }}>
    {{ $slot }}
</button>
```

### 3.3 Kontainer & Kartu (Sharp Container Rule)
Sesuai aturan Framer: sudut kartu **selalu siku (0px)**, tanpa radius, dengan latar belakang color-blocked:

```html
<!-- resources/views/components/ui/card-block.blade.php -->
<div {{ $attributes->merge([
    'class' => 'rounded-none bg-[#150E20] border-l-2 border-brand-orange p-6 text-brand-body transition-colors hover:bg-[#1E152D]'
]) }}>
    {{ $slot }}
</div>
```

### 3.4 Label Seksi & Overline (All-Caps Poppins)
Mengikuti karakteristik `"DIVISI RISET DAN TEKNOLOGI"` pada Framer:
```html
<span class="font-['Poppins'] text-[13px] font-bold uppercase tracking-wider text-brand-orange">
    {{ $label }}
</span>
```

---

## 4. Rincian Layout Dua Zona

### 4.1 Zona Publik (Sesuai Framer Web Experience)

#### A. Header Navigasi Publik:
- Latar transparan (`bg-transparent`) dengan opsi backdrop blur ringan atau solid `#0C0712` saat di-scroll.
- Padding vertikal `24px 0px`.
- Teks link `12px` font sans-serif warna putih (`#FFFFFF`) dengan efek hover menuju `#CC6600`.
- Sisi kanan: Tombol CTA Oranye Berbentuk Pil: **"Masuk Sistem"** atau **"Hubungi Kami"**.

#### B. Hero Section:
- Latar belakang kanvas `#0C0712` dengan grafis geometris bergaris sian (`#00BFFF`) dan elemen kuning maskot (`#FFFF00`).
- Headline menggunakan Poppins Bold `60px` (`display-lg`):  
  *"HIMPUNAN MAHASISWA TEKNIK SIPIL"*  
  *"UNIVERSITAS TADULAKO"*
- Sub-copy menggunakan Switzer Medium `21px` (`body-xl`) warna `#F3F4F5`.
- Tombol aksi ganda:
  - Tombol 1: Pil Oranye (`#CC6600`) -> "Jelajahi Organisasi"
  - Tombol 2: Pil Outline Putih -> "Kirim Aspirasi Anonim"

#### C. Struktur Organisasi & Proker (Color-Blocked Grid):
- Tata letak menggunakan kartu bersudut tajam (`rounded-none`).
- Setiap divisi memiliki kartu berlatar `#150E20` dengan overline Poppins Bold `13px` warna oranye.
- Foto pengurus berformat *sharp ratio* (rasio 1:1 atau 3:4 tanpa border-radius) memberikan nuansa teknis arsitektural yang tegas.

#### D. Kotak Aspirasi Anonim:
- Form berlatar `#150E20` dengan sudut siku (`rounded-none`).
- Input teks dan textarea menggunakan background gelap transparan dengan border `border-white/20` fokus ke `border-brand-orange`.
- Tombol kirim menggunakan tombol pil oranye `#CC6600`.
- Tampilan tiket hasil kirim: Kotak monospace dengan teks kuning `#FFFF00` kontras tinggi.

#### E. Footer Publik:
- Sesuai spesifikasi Framer: Background `#0C0712`, padding vertikal `40px 0px`.
- Teks legal dan tautan kampus ukuran `12px` font regular.

---

### 4.2 Zona Internal (`/app`) — Dark Engineering Command Center

Agar terintegrasi harmonis dengan portal publik, dashboard internal mengadopsi tema **Dark Command Center** yang selaras:

#### A. Sidebar & Layout Internal:
- **Latar Sidebar:** Deep Navy-Black (`#0C0712`).
- **Latar Konten Aplikasi:** `#09050E` (Varian kanvas gelap sedikit lebih pekat).
- **Indikator Menu Aktif:** Aksen vertikal oranye `#CC6600` di sisi kiri menu, teks putih tegas.
- **Top Bar:** Penanda **Periode Kepengurusan Aktif** berbentuk pill badge (`rounded-full bg-brand-orange/20 text-brand-orange border border-brand-orange/40 text-xs px-3 py-1 font-mono`).

#### B. Panel Data Kas & Buku Besar (`/app/kas`):
- Kontainer buku kas menggunakan blok `#150E20` dengan garis pemisah tipis `border-white/10`.
- Angka saldo kas menggunakan font monospace `JetBrains Mono` ukuran `26px` warna putih tebal.
- Status Transaksi:
  - Masuk: Pill hijau `rounded-full bg-emerald-950 text-emerald-400 border border-emerald-800 text-[11px] px-2.5 py-0.5`
  - Keluar: Pill merah `rounded-full bg-rose-950 text-rose-400 border border-rose-800 text-[11px] px-2.5 py-0.5`
  - Void: Teks tercoret (*strikethrough*) dengan badge merah tegas dan alasan tooltip.

#### C. Sesi Presensi QR Dinamis (`/app/absensi`):
- QR Code ditampilkan dengan latar putih bersih berkontras tajam di tengah kontainer gelap `#150E20`.
- Indikator timer hitung mundur: Garis horizontal oranye `#CC6600` yang menyusut mulus tanpa drop shadow.

---

## 5. Responsivitas & Standar Layar (Framer Breakpoint Matrix)

Sistem merespons viewport berdasarkan data pengukuran resmi:

| Breakpoint | Lebar Viewport | Max Kontainer Konten | Strategi Tata Letak |
| :--- | :--- | :--- | :--- |
| **Mobile** | `375px` | `289px` | Single-column terpusat; judul display mengecil ke `25px`; tombol pil 100% lebar |
| **Tablet** | `768px` | `672px` | Single-column konsisten; jarak padding seksi `32px` |
| **Small Desktop** | `1024px` | `848px` | Judul display membesar ke ~`51px`; margin horizontal simetris |
| **Standard Desktop** | `1280px` | `1024px` | Konten bernafas lega; navigasi horizontal penuh |
| **Large Desktop** | `1440px` | `1288px` | Skala penuh `display-lg` (`60px`); padding seksi `64px` s/d `112px` |

### Touch Targets & Aksesibilitas Mobile:
- Tombol pil primer memiliki tinggi minimum `32.8px` (desktop) dan diperlebar menjadi minimum `42px` di mobile agar nyaman ditekan ibu jari.
- Jarak antar tautan inline minimal `8px` untuk mencegah salah sentuh.
- Kontras warna teks putih `#FFFFFF` di atas kanvas `#0C0712` mencapai rasio **19.8:1** (jauh melampaui standar WCAG AAA 7:1).

---

## 6. Do's and Don'ts Desain (Patokan Ketat)

### DO (Wajib Diterapkan):
1. **Gunakan Color-Blocking untuk Kedalaman:** Pisahkan level kartu dan form hanya dengan variasi warna `#0C0712`, `#150E20`, dan `#1E152D`.
2. **Pill-Shape Khusus Elemen Aksi:** Tombol, filter pills, dan badges status wajib menggunakan `rounded-full` (999px).
3. **Sharp Corners untuk Kontainer & Gambar:** Foto anggota, banner proker, dialog box, dan kartu informasi wajib `rounded-none` (0px).
4. **Warna Oranye `#CC6600` Khusus Aksi Kunci:** Jadikan warna oranye sebagai pemanggil perhatian utama bagi pengguna.
5. **Kombinasikan Poppins Bold & Switzer:** Jaga konsistensi tipografi sesuai tabel hierarki.

### DON'T (Dilarang Keras):
1. **Dilarang Menambahkan Drop Shadows:** Jangan gunakan kelas Tailwind `shadow-sm`, `shadow-md`, `shadow-lg`, atau `shadow-2xl`.
2. **Dilarang Menggunakan Filter Blur:** Jangan gunakan efek frosted glass `backdrop-blur` berlebih yang merusak ketegasan geometris.
3. **Dilarang Menggunakan Rounded Corners pada Kontainer:** Jangan beri `rounded-lg` atau `rounded-xl` pada kontainer card atau modal—tetap gunakan `rounded-none`.
4. **Dilarang Mengubah Warna Link:** Tautan standar tetap menggunakan aksen biru web `#0000EE` atau teks putih terang, bukan oranye. Oranye hanya untuk aksi tombol.
5. **Dilarang Menggunakan Font Serif:** Seluruh sistem berbasis Sans-Serif geometris dan Humanist.

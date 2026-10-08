# UI/UX DESIGN & COMPONENT SYSTEM
## Web Profil & Sistem Manajemen Organisasi HMTS UNTAD

**Design Aesthetic:** Modern Architectural Civil Engineering · Streamlined Agency Precision · Anti-Slop Minimalist  
**Reference Benchmark:** `preview.html` & `docs/design/new/new.png`  
**Stack Frontend:** Tailwind CSS · Livewire 3 · Alpine.js · Blade Components  
**Color System:** Canvas `#0A0A0E` (Obsidian) · **CTA Tombol Oranye Baja `#CC6600`** (Hover: `#E67300`, Teks: `#FFFFFF`) · **Aksen Sorotan Kuning Helm `#FFE500`** · Tipografi `#FFFFFF` & `#E4E4E7`  
**Lighting System:** Ambient Glow Lighting System (Fixed Diffused Light Orbs) — *Bebas Pola Grid Kotak-Kotak*  
**Versi Dokumen:** 6.0 (Final Paten — Anti-Slop & Ambient Glow Edition)  
**Tanggal Pembaruan:** 9 Oktober 2026  

---

## 1. Filosofi Desain: Simpel, Bersih, Berwibawa & Bebas "AI Slop"

Berdasarkan prototipe paten pada `preview.html`, antarmuka HMTS FT-UNTAD mengusung standar visual modern arsitektural yang **berbobot, lapang (*macro-whitespace*), manusiawi, dan bebas dari distorsi elemen AI generik (*anti-slop*)**.

### Prinsip Inti Desain:
1. **Bebas Pola Grid Kaku (*No Blueprint Grid*):**
   - Latar belakang kisi-kisi kotak (*blueprint grid*) dihilangkan sepenuhnya.
   - Menggunakan **Ambient Glow Lighting System**: gradasi radial terfiksasi (`background-attachment: fixed`) yang memancarkan pendaran hangat Oranye Baja (`#CC6600`) dan Kuning Keselamatan (`#FFE500`) dengan dispersi kabur tinggi (*high blur* 140px–160px). Menghadirkan atmosfer pencahayaan arsitektural yang elegan di atas kanvas Obsidian pekat.
2. **Bebas Jargon & Telemetri Semu (*Anti-AI Slop*):**
   - **Dilarang mencantumkan kode internal PRD** (seperti `Modul M7 & M8`, `Modul M2 Mandiri`, `PRD M11`, `PRD RBAC`) pada antarmuka publik yang diakses mahasiswa/pengunjung.
   - **Dilarang menggunakan awalan slash berulang** (`// KONSENTRASI`, `// TITIK PUSAT`, `// ZERO-IDENTITY`). Judul harus bersih, natural, dan berwibawa.
   - **Dilarang menggunakan status telemetri kaku** seperti `STATUS KABINET: AKTIF & SOLID` atau `COMMAND CENTER (/APP)` pada halaman publik.
3. **Ikonografi Vektor Presisi (*No Toy Emojis*):**
   - Menghapus seluruh emoji berwarna di dalam boks (seperti 📐, 🌐, 💻, 🚜, 🛠, 📷, ✉).
   - Menggunakan ikon garis SVG monokrom berpresisi tinggi (`stroke-width: 1.5`, `stroke="currentColor"`).
4. **Tipografi & Narasi Realistis:**
   - Menghilangkan kutipan buatan puitis yang kaku pada kartu pengurus BPH; menampilkan identitas resmi secara profesional (Nama Lengkap, Jabatan, NIM, Angkatan).
   - Teks *value-proposition* hero di bawah 25 kata: padat, jelas, dan langsung mengarahkan ke tindakan.

---

## 2. Token Desain Resmi

| Token | Nilai Hex / RGB | Peran & Penggunaan | Utility Tailwind |
| :--- | :--- | :--- | :--- |
| **Canvas Primary** | `#0A0A0E` | Kanvas gelap obsidian struktural dengan ambient glow | `bg-[#0A0A0E]` / `.ambient-canvas` |
| **Surface Dark** | `#121217` | Latar kartu standar & bar navigasi | `bg-[#121217]` |
| **Surface Elevated** | `#181820` / `#15151e` | Latar kartu aktif & bar input formulir | `bg-[#181820]` |
| **Steel Orange (CTA Utama)**| `#CC6600` | Tombol CTA primer, tombol submit, tombol navigasi aktif | `bg-[#CC6600]`, `text-white` |
| **Steel Orange Hover** | `#E67300` | State hover tombol primer oranye | `hover:bg-[#E67300]` |
| **Yellow Highlight (Aksen Teks)**| `#FFE500` | Sorotan kata headline, lencana panah `(→)`, metrik, border kartu prioritas | `text-[#FFE500]`, `bg-[#FFE500]` |
| **Text Primary** | `#FFFFFF` | Judul seksi, teks tombol oranye, headline utama | `text-white` |
| **Text Body Muted** | `#E4E4E7` / `#A1A1AA` | Paragraf deskripsi dan data sekunder | `text-zinc-300` / `text-zinc-400` |
| **Border Subtle** | `rgba(255, 255, 255, 0.08)` | Pembatas kartu halus & rapi | `border-white/10` |
| **Border Active Yellow** | `#FFE500` | Border penegas pada kartu aktif geoteknik | `border-[#FFE500]` |

---

## 3. Sistem Pencahayaan Ambien (Ambient Glow Lighting)

Menggantikan pola kotak-kotak dengan atmosfer pencahayaan terpadu:

```css
/* Ambient Glow Canvas */
.ambient-canvas {
  background-color: #0A0A0E;
  background-image:
    radial-gradient(ellipse 900px 500px at 50% 0%, rgba(204, 102, 0, 0.16), transparent 70%),
    radial-gradient(circle 700px at 85% 25%, rgba(255, 229, 0, 0.07), transparent 60%),
    radial-gradient(circle 600px at 15% 45%, rgba(204, 102, 0, 0.08), transparent 65%),
    radial-gradient(circle 800px at 70% 75%, rgba(204, 102, 0, 0.07), transparent 65%),
    radial-gradient(circle 600px at 25% 95%, rgba(255, 229, 0, 0.05), transparent 60%);
  background-attachment: fixed;
}
```

Orbe cahaya tetap (*fixed backdrop diffusion*):
- **Top Cone Glow:** Lingkaran 750px di atas tengah kanvas bergradasi `#CC6600/15` dengan `blur-[140px]`.
- **Upper Right Accent:** Lingkaran 450px di kanan atas bergradasi `#FFE500/10` dengan `blur-[150px]`.
- **Mid Left Warmth:** Lingkaran 550px di kiri tengah bergradasi `#CC6600/10` dengan `blur-[160px]`.
- **Bottom Subtle Glow:** Lingkaran 500px di kanan bawah bergradasi `#FFE500/06` dengan `blur-[160px]`.

---

## 4. Tipografi

| Klasifikasi | Font Family | Bobot | Peran & Penggunaan |
| :--- | :--- | :--- | :--- |
| **Display Headings** | Poppins | 700 - 900 (Bold/Black) | Judul utama seksi & hero headline ("KOKOH, INOVATIF...") |
| **Body & UI Elements**| Inter | 400 (Reg), 500 (Med), 600 (Semi) | Teks paragraf bacaan, tombol navigasi, formulir |
| **Technical Telemetry**| JetBrains Mono | 500 - 600 (Med/Bold) | Jam operasional, kode tiket pelacakan, koordinat peta |

---

## 5. Komponen Kunci (Berdasarkan `preview.html`)

### 5.1 Floating Island Navbar
Navbar kapsul mengambang dengan sudut membulat penuh (`rounded-full`), efek *backdrop-blur*, logo resmi HMTS FT-UNTAD (`docs/hmts.png`), dan status navigasi aktif:
```html
<header class="bg-[#121217]/95 backdrop-blur-md border border-white/10 rounded-full px-4 sm:px-6 py-2.5 shadow-2xl flex items-center justify-between gap-4">
  <!-- Brand Identitas dengan Logo Resmi -->
  <a href="#home" class="flex items-center gap-3">
    <img src="docs/hmts.png" alt="HMTS FT-UNTAD" class="w-9 h-9 object-contain drop-shadow">
    <div>
      <span class="font-display font-bold text-sm tracking-tight text-white uppercase block leading-none">HMTS FT-UNTAD</span>
      <span class="font-mono text-[10px] text-zinc-400">Teknik Sipil • Univ. Tadulako</span>
    </div>
  </a>

  <!-- 4 Menu Navigasi Utama -->
  <nav class="hidden md:flex items-center gap-1 text-xs font-medium">
    <button class="px-4 py-2 rounded-full bg-brand-orange text-white font-bold transition-all shadow-md">Beranda</button>
    <button class="px-4 py-2 rounded-full text-zinc-300 hover:text-white hover:bg-white/5 transition-colors">Tentang Kami</button>
    <button class="px-4 py-2 rounded-full text-zinc-300 hover:text-white hover:bg-white/5 transition-colors">Kegiatan</button>
    <button class="px-4 py-2 rounded-full text-zinc-300 hover:text-white hover:bg-white/5 transition-colors">Layanan</button>
  </nav>

  <!-- Tombol Login Pengurus -->
  <button class="inline-flex items-center gap-2 bg-brand-orange hover:bg-brand-orangeHover text-white px-4 sm:px-5 py-2 rounded-full text-xs font-mono font-bold uppercase tracking-wider transition-all shadow-lg shadow-brand-orange/20">
    <span>Login Pengurus</span>
    <span class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center text-[11px]">↗</span>
  </button>
</header>
```

### 5.2 Framed Hero Container & Quick Access Strip
Hero dibungkus dalam kontainer lengkung `rounded-[2rem] sm:rounded-[2.5rem]` dengan foto infrastruktur riil, tata letak dua kolom (kiri: headline & deskripsi, kanan: lambang resmi HMTS FT-UNTAD besar), serta bar jalan pintas layanan di dasarnya:
```html
<div class="relative rounded-[2rem] sm:rounded-[2.5rem] border border-white/10 overflow-hidden bg-[#101017] min-h-[520px] p-6 sm:p-10 lg:p-12 flex flex-col justify-between">
  <!-- Grid 2 Kolom: Headline & Lambang Besar -->
  <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center pt-4">
    <div class="lg:col-span-8">
      <h1 class="font-display font-black text-3xl sm:text-5xl lg:text-6xl text-white leading-[1.08] tracking-tight uppercase mb-4">
        Himpunan Mahasiswa <br>
        <span class="text-brand-yellow">Teknik Sipil</span>
      </h1>
      <!-- Tagar Resmi HMTS FT-UNTAD -->
      <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-brand-yellow/10 border border-brand-yellow/30 text-brand-yellow font-mono text-xs font-bold tracking-wider mb-6">
        <span>#WeAreTheChampions</span>
      </div>
      <p class="text-zinc-300 text-sm sm:text-base leading-relaxed max-w-xl mb-8">
        Pusat informasi resmi kegiatan akademik, riset kebencanaan, advokasi kemahasiswaan, dan layanan penunjang civitas Teknik Sipil Fakultas Teknik Universitas Tadulako.
      </p>
      ...
    </div>
    <!-- Lambang Resmi Besar (Tanpa Kotak Pembungkus & Tanpa Teks) -->
    <div class="lg:col-span-4 flex justify-center lg:justify-end">
      <div class="relative flex items-center justify-center">
        <div class="absolute -inset-6 rounded-full bg-gradient-to-tr from-brand-orange/25 to-brand-yellow/20 blur-3xl opacity-75"></div>
        <img src="docs/hmts.png" alt="Lambang Resmi HMTS FT-UNTAD" class="relative w-44 h-44 sm:w-56 sm:h-56 lg:w-64 lg:h-64 object-contain drop-shadow-[0_25px_35px_rgba(0,0,0,0.85)]">
      </div>
    </div>
  </div>

  <!-- Quick Access Strip di Dasar Hero -->
  <div class="relative z-10 pt-8 mt-8 border-t border-white/10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4">
    <div class="flex flex-wrap items-center gap-3 text-xs font-mono text-zinc-400">
      <span class="text-brand-yellow font-semibold">HMTS FT-UNTAD</span>
      <span class="text-white/20">•</span>
      <span>Periode 2026/2027</span>
      <span class="text-white/20">•</span>
      <span class="text-brand-yellow font-bold">#WeAreTheChampions</span>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 w-full lg:w-auto">
      <button class="px-3.5 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-mono text-zinc-300">Pinjam Alat Lab →</button>
      <button class="px-3.5 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-mono text-zinc-300">Presensi QR →</button>
      <button class="px-3.5 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-mono text-zinc-300">Kotak Aspirasi →</button>
      <button class="px-3.5 py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-mono text-zinc-300">Bank Aset →</button>
    </div>
  </div>
</div>
```

### 5.3 Kartu Bidang Keahlian 5 Kolom
Barisan 5 pilar keilmuan sipil dengan sudut melengkung halus `rounded-2xl` dan kartu geoteknik aktif beraksen border kuning bersinar:
1. **Rekayasa Struktur:** Gedung tahan gempa, jembatan baja bentang panjang, beton bertulang SNI.
2. **Geoteknik & Tanah (Highlight):** Penyelidikan tanah, pondasi dalam, mitigasi likuefaksi Palu (`clean-card-active`).
3. **Manajemen Konstruksi:** Estimasi RAB, kurva S, BIM, keselamatan kerja K3.
4. **Sumber Daya Air:** Pengendalian banjir DAS Palu, bendungan, sistem drainase perkotaan.
5. **Rekayasa Transportasi:** Geometrik jalan raya, perkerasan aspal, mobilitas wilayah.

### 5.4 Struktur Bagan Bertingkat (Tiered Organizational Chart)
Struktur kepengurusan HMTS FT-UNTAD Periode 2026/2027 ditampilkan dalam **bagan hierarkis bertingkat (3-Tier)** dengan mempertahankan estetika kartu `clean-card`, garis penghubung struktural (*connector stems*), serta tanpa label nama kabinet:
- **Tier 1 (Puncak Kepemimpinan):**
  - **Ketua (Ketua Umum)** — Kartu menonjol di tengah atas dengan lencana `PIMPINAN UMUM`, border kuning halus, dan stem vertikal penghubung ke bawah.
- **Tier 2 (Pimpinan Harian - 4 Card Row):**
  - **Ketua 1** (Bidang Internal)
  - **Ketua 2** (Bidang Eksternal)
  - **Sekretaris Umum** (Administrasi & Kesekretariatan)
  - **Bendahara Umum** (Keuangan & Kebendaharaan)
  - Dihubungkan dengan garis horizontal dan percabangan vertikal rapi.
- **Tier 3 (Divisi Pelaksana - 8 Divisi Grid 4 Kolom):**
  - 8 Divisi resmi: **Divisi Ristek**, **Divisi Infokom**, **Divisi Penalaran**, **Divisi FKMTSI**, **Divisi Hublua (Hubungan Luar & Alumni)**, **Divisi Bursa**, **Divisi Advokasi**, **Divisi Kaderisasi**.
  - Masing-masing kartu memuat: Ikon garis SVG monokrom, kode singkatan teknis monospaced, nama divisi, peran koordinator & staf, serta deskripsi tugas operasional ringkas.

### 5.5 Hub Layanan Mandiri Terintegrasi
Empat modul layanan dengan ikon SVG monokrom berpresisi tinggi:
1. **Peminjaman Alat Lab:** Katalog instrumen ukur (Total Station, Theodolite, Waterpass, Hammer Test) dan form online anti-bentrok jadwal.
2. **Presensi Mandiri QR:** Pemindai QR kamera dan token 6-digit.
3. **Kotak Aspirasi Anonim:** Formulir terlindungi tanpa pencatatan identitas dan pelacak tiket acak (`ASP-2026-XXXX`).
4. **Bank Aset & Repositori:** Unduhan terbuka Logo Kit (ZIP), Blueprint CAD (DWG), Paper Jurnal (PDF), dan Modul Praktikum (PDF).

---

## 6. Kepatuhan Fungsional Multi-Halaman (Sesuai `preview.html`)

Arsitektur 4 halaman portal publik memisahkan konten secara proporsional:
- **`/` (Beranda):** Etalase utama, metrik 640+ mahasiswa & 32 tahun kiprah, 5 pilar keilmuan, sorotan 3 proker terdekat, hub layanan ringkas, dan peta sekretariat kampus.
- **`/tentang` (Tentang Kami):** Kilas balik sejarah 1994, filosofi lambang resmi (`docs/hmts.png`), visi & 3 pilar misi organisasi, Mars HMTS FT-UNTAD (lirik & audio player), serta bagan bertingkat struktur kepengurusan (Ketua, 4 Pimpinan Harian, 8 Divisi Pelaksana Periode 2026/2027).
- **`/kegiatan` (Kegiatan & Proker):** Kalender 28 program kerja, filter kategori interaktif, detail Civil Expo & Bridge Design, Workshop BIM, Sipil Bangun Desa, serta unduh TOR.
- **`/layanan` (Layanan Mahasiswa):** 4 tab layanan mandiri interaktif (Pinjam Alat, Presensi QR, Kotak Aspirasi, Bank Aset).
- **Modal Interaktif:** Modal Formulir Peminjaman Alat (`borrowModal`) dan Modal Login Pengurus (`adminLoginModal`) yang terintegrasi.

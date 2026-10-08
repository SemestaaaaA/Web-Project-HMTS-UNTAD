# UI/UX DESIGN & COMPONENT SYSTEM
## Web Profil & Sistem Manajemen Organisasi HMTS UNTAD
**Design Aesthetic:** Modern Architectural Civil Engineering · Streamlined Agency Precision · Non-Gimmick Minimalist  
**Reference Benchmark:** `docs/design/new/new.png`  
**Stack Frontend:** Tailwind CSS · Livewire 3 · Alpine.js · Blade Components  
**Color Benchmark:** Canvas `#0A0A0E` · **CTA Tombol Oranye Baja `#CC6600`** (Hover: `#E67300`, Teks: `#FFFFFF`) · **Aksen Sorotan Kuning Helm `#FFE500`** · Tipografi `#FFFFFF` & `#E4E4E7`  
**Versi Dokumen:** 5.1 (Steel Orange CTA & High-Vis Yellow Accent Edition)  
**Tanggal Pembaruan:** 8 Oktober 2026  

---

## 1. Filosofi Desain: Simpel, Bersih & Berwibawa (Anti-Ramai)

Berdasarkan pembaruan visual resmi (`docs/design/new/new.png`), antarmuka HMTS FT-UNTAD bertransformasi menjadi **antarmuka arsitektural yang lebih simpel, lapang (*macro-whitespace*), modern, dan bebas distraksi elemen dekoratif yang berlebihan (*anti-slop*)**.

### Prinsip Inti Redesain:
1. **Bebas Distraksi & Tidak Terlalu Ramai:**
   - Menghilangkan taburan teks telemetri semu (seperti koordinat GPS berulang, stempel CAD berlebihan di setiap sudut, dan label teknis berlapis) yang membuat visual terasa sesak.
   - Memberi ruang napas vertikal yang lega (`py-20` hingga `py-24`) antar-seksi.
2. **Adopsi Tata Letak Modern (Sesuai `new.png`):**
   - **Floating Island Navigation:** Navbar kapsul mengambang (*pill navbar*) dengan sudut melengkung penuh (`rounded-full`), efek *backdrop-blur*, dan tombol aksi primer berkapsul oranye baja (`#CC6600`) dengan teks putih.
   - **Framed Hero Container:** Hero dibungkus dalam kontainer berbingkai dengan sudut melengkung halus (`rounded-[2rem]` / `rounded-[2.5rem]`), berlatar belakang foto nyata lapangan teknik sipil dengan kontras tajam.
   - **Inline Headline Badge:** Judul utama monumental memuat aksen lencana panah sirkular (`→`) dan sorotan kata kunci kuning `#FFE500`.
   - **Grid 5 Kartu Keahlian Sipil:** Barisan 5 pilar keilmuan (Struktur, Geoteknik, MK, Hidro, Transportasi) dengan ikon sirkular atas dan status kartu aktif dengan *border* kuning bersinar.
   - **Grid Program Unggulan:** Kartu visual dengan foto riil di bagian atas, lencana nomor sirkular di sudut gambar, dan tombol aksi oranye baja.
   - **Pusat Layanan & Map Terpadu:** Akses cepat peminjaman alat lab, presensi mandiri, kotak aspirasi, dan lokasi map sekretariat kampus.
3. **Harmonisasi Palet Warna Resmi HMTS:**
   - **Kanvas Gelap Struktural:** `#0A0A0E` (Obsidian Slate).
   - **Permukaan Kartu:** `#121217` & `#181820`.
   - **Oranye Baja (CTA Utama / Tombol Aksi):** `#CC6600` (Hover: `#E67300`). Memberi karakter kokoh, industrial, dan grounded. Teks di dalam tombol selalu **Putih Tebal (`#FFFFFF`)** demi kontras tajam.
   - **Kuning Helm Proyek (Aksen Sorotan & Pendukung Teks):** `#FFE500`. Digunakan secara presisi untuk menyorot kata penting headline, tag overline `//`, indikator status, angka metrik capaian `640+`, dan border kartu prioritas.
   - **Teks Tinta Putih & Muted:** `#FFFFFF` dan `#E4E4E7`.

---

## 2. Token Desain Resmi

| Token | Nilai Hex / RGB | Peran & Penggunaan | Utility Tailwind |
| :--- | :--- | :--- | :--- |
| **Canvas Primary** | `#0A0A0E` | Latar utama kanvas gelap struktural | `bg-[#0A0A0E]` |
| **Surface Dark** | `#121217` | Latar kartu standar & bar navigasi | `bg-[#121217]` |
| **Surface Elevated** | `#181820` | Latar formulir & kartu aktif | `bg-[#181820]` |
| **Steel Orange (CTA Utama)**| `#CC6600` | Tombol CTA primer, tombol submit, tombol navigasi aktif | `bg-[#CC6600]`, `text-white` |
| **Steel Orange Hover** | `#E67300` | State hover tombol primer oranye | `hover:bg-[#E67300]` |
| **Yellow Highlight (Aksen Teks)**| `#FFE500` | Sorotan kata headline, overline `//`, angka capaian, icon | `text-[#FFE500]`, `bg-[#FFE500]` |
| **Text Primary** | `#FFFFFF` | Judul, teks di dalam tombol oranye, headline | `text-white` |
| **Text Body Muted** | `#E4E4E7` / `#A1A1AA` | Paragraf deskripsi dan data sekunder | `text-zinc-300` / `text-zinc-400` |
| **Border Hairline** | `rgba(255, 255, 255, 0.08)` | Pembatas kartu rapi dan halus | `border-white/10` |
| **Border Active Yellow** | `#FFE500` | Border penegas pada kartu aktif geoteknik | `border-[#FFE500]` |

---

## 3. Tipografi

| Klasifikasi | Font Family | Bobot | Peran & Penggunaan |
| :--- | :--- | :--- | :--- |
| **Display Headings** | Poppins | 800 - 900 (Black) | Judul utama seksi & hero headline ("KOKOH, INOVATIF...") |
| **Body & UI Elements**| Inter | 400 (Reg), 500 (Med), 600 (Semi) | Teks paragraf, tombol navigasi, formulir |
| **Technical Telemetry**| JetBrains Mono | 600 - 700 (Bold) | Kode tiket, tag overline `+`, nomor langkah `01` s/d `05` |

---

## 4. Komponen Kunci (Berdasarkan `docs/design/new/new.png`)

### 4.1 Floating Island Navbar
```html
<header class="bg-[#121217]/90 backdrop-blur-md border border-white/10 rounded-full px-6 py-2.5 shadow-2xl flex items-center justify-between">
    <!-- Brand -->
    <a href="#" class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-full bg-[#FFE500] text-black font-black flex items-center justify-center text-xs">TS</div>
        <span class="font-black text-sm text-white">HMTS UNTAD</span>
    </a>
    <!-- Links -->
    <nav class="hidden lg:flex items-center gap-1 font-mono text-xs">
        <a href="#beranda" class="px-4 py-2 rounded-full bg-[#CC6600] text-white font-bold">Beranda</a>
        <a href="#tentang" class="px-4 py-2 rounded-full text-zinc-300 hover:text-white">Tentang Kami</a>
        <a href="#kegiatan" class="px-4 py-2 rounded-full text-zinc-300 hover:text-white">Kegiatan</a>
        <a href="#layanan" class="px-4 py-2 rounded-full text-zinc-300 hover:text-white">Layanan</a>
    </nav>
    <!-- CTA Button Oranye Baja -->
    <button class="inline-flex items-center gap-2 bg-[#CC6600] hover:bg-[#E67300] text-white px-5 py-2 rounded-full text-xs font-mono font-bold uppercase transition-all shadow-lg shadow-[#CC6600]/20">
        <span>LOGIN PENGURUS</span>
        <span class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center text-[11px]">↗</span>
    </button>
</header>
```

### 4.2 Floating Quick Form Bar
Terletak di dasar enclosure hero:
- Input kapsul (*pill inputs*) untuk Nama/NIM, WhatsApp, Kategori Layanan, dan Pesan Ringkas.
- Tombol aksi kuning berkapsul (*pill submit*) dengan icon trailing circle.
- Terhubung langsung dengan modul Aspirasi Mahasiswa (PRD M11) dan Peminjaman Alat (PRD M8).

### 4.3 Kartu Bidang Keahlian 5 Kolom
- Sudut melengkung halus `rounded-2xl`.
- Ikon sirkular penanda nomor di bagian atas.
- Kartu prioritas geoteknik disorot dengan `border: 1.5px solid #FFE500` dan bayangan lembut kuning.

---

## 5. Kepatuhan Spesifikasi PRD (M1 – M12)

Seluruh informasi esensial dalam PRD tetap dipertahankan secara utuh dan fungsional:
1. **Master Database & Keahlian (M1):** 5 Konsentrasi keilmuan (Struktur, Geoteknik, MK, Hidro, Transportasi).
2. **Presensi QR Dinamis (M2):** Indikator sesi aktif dan token dinamis 30 detik pada modal Command Center `/app`.
3. **Timeline Proker & Kepanitiaan (M3, M4):** Flagship Civil Expo, Civil Workshop BIM, Sipil Bangun Desa, Inovasi Beton.
4. **Kas Digital Permanen (M5, M6):** Buku kas *immutable* dengan transaksi disetujui (*Approved*) dan pembatalan resmi (*Voided*).
5. **Inventaris Alat Sipil Anti-Bentrok (M7, M8):** Status ketersediaan Total Station dan Theodolite tanpa bentrok jadwal.
6. **Surat & Disposisi (M9):** Disposisi digital terintegrasi pada alur operasional.
7. **Kotak Aspirasi Anonim (M11):** Perlindungan *zero-identity logging* dengan generator kode tiket acak pelacakan.
8. **Bank Aset & Repositori Riset (M12):** Unduh dokumen paper, spek 3D, dan modul praktikum.

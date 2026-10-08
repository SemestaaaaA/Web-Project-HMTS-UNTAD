# UI/UX DESIGN & COMPONENT SYSTEM
## Web Profil & Sistem Manajemen Organisasi HMTS UNTAD
**Design Aesthetic:** Modern Architectural Civil Engineering · Streamlined Agency Precision · Non-Gimmick Minimalist  
**Reference Benchmark:** `docs/design/new/new.png`  
**Stack Frontend:** Tailwind CSS · Livewire 3 · Alpine.js · Blade Components  
**Color Benchmark:** Canvas `#0A0A0E` · **CTA & Highlight Kuning `#FFE500`** · **Aksen Pendukung Oranye Baja `#CC6600`** · Tipografi `#FFFFFF` & `#E4E4E7`  
**Versi Dokumen:** 5.0 (Streamlined Civil Edition)  
**Tanggal Pembaruan:** 8 Oktober 2026  

---

## 1. Filosofi Desain: Simpel, Bersih & Berwibawa (Anti-Ramai)

Berdasarkan pembaruan visual resmi (`docs/design/new/new.png`), antarmuka HMTS FT-UNTAD bertransformasi menjadi **antarmuka arsitektural yang lebih simpel, lapang (*macro-whitespace*), modern, dan bebas distraksi elemen dekoratif yang berlebihan (*anti-slop*)**.

### Prinsip Inti Redesain:
1. **Bebas Distraksi & Tidak Terlalu Ramai:**
   - Menghilangkan taburan teks telemetri semu (seperti koordinat GPS berulang, stempel CAD berlebihan di setiap sudut, dan label teknis berlapis) yang membuat visual terasa sesak.
   - Memberi ruang napas vertikal yang lega (`py-20` hingga `py-24`) antar-seksi.
2. **Adopsi Tata Letak Modern (Sesuai `new.png`):**
   - **Floating Island Navigation:** Navbar kapsul mengambang (*pill navbar*) dengan sudut melengkung penuh (`rounded-full`), efek *backdrop-blur*, dan tombol aksi primer berkapsul kuning.
   - **Framed Hero Container:** Hero dibungkus dalam kontainer berbingkai dengan sudut melengkung halus (`rounded-[2rem]` / `rounded-[2.5rem]`), berlatar belakang foto nyata lapangan teknik sipil dengan kontras tajam.
   - **Inline Headline Badge:** Judul utama monumental memuat aksen lencana panah sirkular (`→`) di antara teks penegasan.
   - **Floating Quick Layanan & Aspirasi Bar:** Bar formulir cepat mengambang di dasar hero (*schedule / lead capture bar*), memuat input berkapsul rapi dan tombol kirim kuning.
   - **Grid 5 Kartu Keahlian Sipil:** Barisan 5 pilar keilmuan (Struktur, Geoteknik, MK, Hidro, Transportasi) dengan ikon sirkular atas dan status kartu aktif dengan *border* kuning bersinar.
   - **Grid 4 Kartu Program Unggulan:** Kartu visual dengan foto riil di bagian atas, lencana nomor sirkular di sudut gambar, dan tautan aksi kuning.
   - **Alur 5 Langkah Terstruktur:** Visualisasi SOP operasional organisasi dengan 5 kartu bernomor (`01` s/d `05`).
   - **Focal Success Box & Akuntabilitas:** Blok tengah sorotan performa kabinet (metrik 99.2%, akreditasi LAM-Teknik Unggul, tombol portal `/app`, dan kisi foto civitas sipil).
3. **Konsistensi Palet Warna Resmi HMTS:**
   - **Kanvas Gelap Struktural:** `#0A0A0E` (Obsidian Slate).
   - **Permukaan Kartu:** `#121217` & `#181820`.
   - **Kuning Helm Proyek (Primer CTA & Status Aktif):** `#FFE500` (hover: `#E6CF00`).
   - **Oranye Baja (Aksen Pendukung):** `#CC6600`.
   - **Teks Tinta Putih & Muted:** `#FFFFFF` dan `#E4E4E7`.

---

## 2. Token Desain Resmi

| Token | Nilai Hex / RGB | Peran & Penggunaan | Utility Tailwind |
| :--- | :--- | :--- | :--- |
| **Canvas Primary** | `#0A0A0E` | Latar utama kanvas gelap struktural | `bg-[#0A0A0E]` |
| **Surface Dark** | `#121217` | Latar kartu standar & bar navigasi | `bg-[#121217]` |
| **Surface Elevated** | `#181820` | Latar bar formulir & kartu aktif | `bg-[#181820]` |
| **Yellow Accent (Utama)** | `#FFE500` | Tombol CTA primer, tab aktif, border aktif | `bg-[#FFE500]`, `text-[#FFE500]` |
| **Yellow Hover** | `#E6CF00` | State hover tombol primer | `hover:bg-[#E6CF00]` |
| **Steel Orange (Pendukung)**| `#CC6600` | Penanda kategori pendukung & overline | `text-[#CC6600]`, `border-[#CC6600]` |
| **Text Primary** | `#FFFFFF` | Judul, angka metrik utama, teks headline | `text-white` |
| **Text Body Muted** | `#E4E4E7` / `#A1A1AA` | Paragraf deskripsi dan data sekunder | `text-zinc-300` / `text-zinc-400` |
| **Border Hairline** | `rgba(255, 255, 255, 0.08)` | Pembatas kartu rapi dan halus | `border-white/10` |
| **Border Active Yellow** | `#FFE500` | Border penegas pada kartu aktif | `border-[#FFE500]` |

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
        <a href="#beranda" class="px-4 py-2 rounded-full bg-[#FFE500] text-black font-bold">Beranda</a>
        <a href="#keahlian" class="px-4 py-2 rounded-full text-zinc-300 hover:text-white">Keahlian</a>
        <a href="#proker" class="px-4 py-2 rounded-full text-zinc-300 hover:text-white">Proker</a>
    </nav>
    <!-- CTA Button-in-Button -->
    <button class="inline-flex items-center gap-2 bg-[#FFE500] text-black px-5 py-2 rounded-full text-xs font-mono font-bold uppercase">
        <span>PORTAL / LOGIN</span>
        <span class="w-5 h-5 rounded-full bg-black/15 flex items-center justify-center">↗</span>
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

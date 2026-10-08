# PRODUCT REQUIREMENTS DOCUMENT (PRD)
## Web Profil & Sistem Manajemen Organisasi HMTS UNTAD
**Stack:** Laravel 11/12 · Livewire 3 · Alpine.js · Tailwind CSS · MySQL  
**Database Engine:** MySQL 8.0+ / MariaDB 10.11+  
**Design Aesthetic:** Modern Architectural Civil Engineering · Anti-Slop Minimalist · Ambient Glow Lighting  
**Public Site Architecture:** 4 Halaman Utama Terpisah (Beranda, Tentang Kami, Kegiatan, Layanan)  
**Color Palette:** Canvas `#0A0A0E` · **CTA Tombol Oranye Baja `#CC6600`** (Teks Putih) · **Aksen Sorotan Kuning Helm `#FFE500`** · Tipografi `#FFFFFF` & `#E4E4E7`  
**Background System:** Ambient Glow Lighting System (Fixed Diffused Light Orbs) — *Bebas Pola Grid Kotak-Kotak*  
**Infrastructure Principle:** Zero-Redis Monolith · Single VPS Budget-Friendly  
**Versi Dokumen:** 6.0 (Final Paten — Anti-Slop & Ambient Glow Edition)  
**Tanggal Pembaruan:** 9 Oktober 2026  

---

## 1. Eksekutif & Latar Belakang

Himpunan Mahasiswa Teknik Sipil Universitas Tadulako (HMTS UNTAD) membutuhkan platform digital terintegrasi yang memisahkan secara tegas antara konsumsi publik dan manajemen internal:
1. **Portal Publik 4 Halaman:** Etalase resmi organisasi yang modern, berwibawa, bersih (*anti-slop*), dan terstruktur rapi ke dalam 4 halaman khusus agar informasi tidak bertumpuk di satu halaman panjang:
   - **Halaman 1: Beranda (`/`):** Showcase monumental, ringkasan keilmuan, sorotan proker terdekat, dan pintasan layanan cepat.
   - **Halaman 2: Tentang Kami (`/tentang`):** Sejarah organisasi sejak 1994, filosofi lambang resmi (`docs/hmts.png`), visi & misi, lirik resmi Mars HMTS FT-UNTAD, serta bagan bertingkat struktur kepengurusan (Ketua, 4 Pimpinan Harian, 8 Divisi Pelaksana Periode 2026/2027).
   - **Halaman 3: Kegiatan (`/kegiatan`):** Kalender timeline proker, filter kategori, detail kompetisi/pelatihan, unduh TOR, dan registrasi tim.
   - **Halaman 4: Layanan Mahasiswa (`/layanan`):** *One-Stop Student Hub* untuk reservasi alat lab survei anti-bentrok (M7/M8), scan presensi QR acara (M2), kotak aspirasi anonim & pelacak tiket (M11), serta unduh bank aset resmi (M12).
2. **Command Center Internal (`/app`):** Sistem operasional administrasi satu pintu untuk pengurus (`superadmin` & `admin`) mencakup pembukuan permanen (*immutable cash ledger*), verifikasi disposisi surat, rekap kehadiran QR dinamis, dan pengelolaan jadwal inventaris.

---

## 2. Masalah & Objektif

### 2.1 Masalah Utama
- **Fragmentasi Data & Informasi:** Data anggota, notulensi, dan arsip kegiatan tercecer di grup WhatsApp dan spreadsheet pribadi.
- **Integritas Kas & Kuitansi:** Kas fisik dan kuitansi rentan hilang; penyusunan LPJ memakan waktu lama.
- **Peminjaman Alat Sipil Sering Bentrok:** Theodolite, Total Station, dan Waterpass dipinjam tanpa pemantauan jadwal terpusat.
- **Birokrasi Lambat:** Distribusi surat masuk dan lembar disposisi memakan waktu karena berkas fisik.
- **Aspirasi Mahasiswa Rendah:** Mahasiswa ragu menyampaikan masukan karena takut identitasnya diketahui.

### 2.2 Objektif Utama & Target MVP (Fase 1)
- **Arsitektur Multi-Halaman Bersih (Anti-Bising):** Membagi portal publik menjadi 4 halaman terdedikasi untuk memberikan ruang napas (*macro-whitespace* `py-20`), navigasi pulau mengambang (*Floating Island Navbar*) 4 menu, dan pengalaman pengguna yang fokus.
- **Warna Berkarakter Keteknikan:** Oranye Baja (`#CC6600`) sebagai tombol aksi primer (CTA), Kuning Helm (`#FFE500`) sebagai aksen sorotan & status prioritas, di atas kanvas gelap `#0A0A0E` berfitur Ambient Glow.
- **Database Terpusat MySQL:** Menggunakan basis data relasional MySQL 8.0+ / MariaDB 10.11+ lokal untuk integritas data struktural dan ACID transactions.
- **Model Autentikasi Sederhana (Hanya `superadmin` & `admin`):** Tidak menggunakan paket RBAC rumit maupun Enum terpisah. Cukup kolom string `role` (`'superadmin'` / `'admin'`) pada tabel `users`.
- **Arsitektur Ramping Tanpa Redis & Tanpa Bloat:**
  - Tanpa Redis (caching presensi QR 30 detik, antrean kompresi gambar, dan session ditangani via driver MySQL bawaan Laravel).
  - Tanpa `maatwebsite/excel` (ekspor data menggunakan *Native Streamed CSV* bawaan Laravel yang hemat RAM).
  - Tanpa Cloudflare Turnstile wajib (menggunakan *Native Honeypot* + *Laravel Throttle*).
- **Pembukuan Keuangan Anti-Manipulasi:** Setiap transaksi kas dicatat permanen; pembatalan hanya melalui mekanisme *void* beralasan (`VoidCashTransactionAction`) yang dibatasi hanya untuk Superadmin.

---

## 3. Matriks Pengguna & Hak Akses (Superadmin & Admin)

| Modul / Fitur | Superadmin (Ketua Himpunan) | Admin (Pengurus Harian) | Publik / Mahasiswa |
| :--- | :---: | :---: | :---: |
| **Kelola Akun Admin & Reset Periode** | Akses Penuh | — | — |
| **Void / Batalkan Kas Permanen (M5)** | Akses Penuh (Otoritas Void) | — | — |
| **Input Kas Masuk/Keluar & Nota (M5/M6)** | Akses Penuh | Akses Penuh | — |
| **Database Anggota & Peminatan (M1)** | Akses Penuh | Input & Kelola | Lihat di `/tentang` & `/` |
| **Presensi QR Acara Mandiri (M2)** | Akses Penuh | Buat Sesi & Rekap | Scan QR di `/layanan` |
| **Timeline Proker & Panitia (M3/M4)** | Akses Penuh | Kelola Proker & Task | Lihat di `/kegiatan` & `/` |
| **Katalog & Reservasi Alat (M7/M8)** | Akses Penuh | Verifikasi & Jadwalkan | Ajukan di `/layanan` |
| **Surat Disposisi & Notulensi (M9/M10)** | Validasi & Disposisi | Register & Tulis Notulen | — |
| **Kotak Aspirasi & Lacak Tiket (M11)** | Akses & Tindak Lanjut | Moderasi & Respon | Kirim/Cek di `/layanan` |
| **Bank Aset & Repositori Riset (M12)** | Akses Penuh | Unggah & Kelola Aset | Unduh Terbuka di `/layanan` |

---

## 4. Spesifikasi Fungsional Portal Publik (4 Halaman Terinci)

### 4.1 Halaman 1: Beranda (`/`)
- **Top Minimal Utility Bar:** Indikator HMTS FT-UNTAD aktif, Jurusan Teknik Sipil Universitas Tadulako, Akreditasi Unggul, lokasi Palu, dan shortcut cepat ke Kotak Aspirasi Mahasiswa.
- **Floating Island Navbar:** Navbar berkapsul (`rounded-full`) dengan logo resmi HMTS FT-UNTAD (`docs/hmts.png`), 4 tombol menu utama (`Beranda`, `Tentang Kami`, `Kegiatan`, `Layanan`), serta tombol `Login Pengurus ↗`.
- **Framed Hero Container:** Bingkai lengkung (`rounded-[2rem] sm:rounded-[2.5rem]`) berlatar foto infrastruktur riil dengan tata letak 2 kolom: headline monumental `HIMPUNAN MAHASISWA TEKNIK SIPIL` berpadu tagar resmi `#WeAreTheChampions` di kolom kiri, lambang resmi besar (`docs/hmts.png`) tanpa kotak pembungkus dengan pendaran ambien di kolom kanan, subteks deskripsi (< 25 kata), serta tombol aksi primer Oranye Baja (`Jelajahi Kegiatan ↗`) dan tombol sekunder (`Layanan Mahasiswa`).
- **Quick Access Strip di Dasar Hero:** Bar jalan pintas layanan terpadu yang memuat status periode aktif HMTS FT-UNTAD Periode 2026/2027 dan 4 tombol aksi cepat (`Pinjam Alat Lab →`, `Presensi QR →`, `Kotak Aspirasi →`, `Bank Aset →`).
- **Strip Afiliasi & Akreditasi:** Banner kemitraan semi-transparan (`bg-[#0D0D12]/70 backdrop-blur-sm`): Akreditasi Unggul LAM-Teknik, BMPTTSSI Wilayah VIII, HAKI Indonesia, LPJK Sulawesi Tengah, Kementerian PUPR.
- **Tentang HMTS & Metrik Kunci:** Narasi ringkas kiprah sejak 1994, fokus mitigasi kebencanaan tanah, semboyan resmi, dan 4 metrik capaian: 640+ Mahasiswa Aktif, 1994 Tahun Berdiri, Akreditasi Unggul, 1.200+ Jejaring Alumni.
- **5 Konsentrasi Keilmuan Sipil (M1):** 5 kartu pilar keilmuan (Rekayasa Struktur, Geoteknik & Tanah [highlight kartu aktif kuning], Manajemen Konstruksi, Sumber Daya Air, Rekayasa Transportasi).
- **Program Kerja Pilihan (M3/M4):** 3 kartu visual agenda terdekat (*Civil Expo & Bridge Design 2026*, *Workshop BIM Revit & ETABS*, *Sipil Bangun Desa*) dengan badge status registrasi dan tautan detail.
- **Akses Mandiri Mahasiswa (M2, M7, M8, M11, M12):** 4 kartu layanan menggunakan ikon SVG monokrom presisi tinggi (tanpa emoji): Peminjaman Alat Lab, Presensi Mandiri QR, Kotak Aspirasi, Bank Aset & Repositori.
- **Sekretariat & Peta Lokasi:** Peta Google Maps embed interaktif Kampus Bumi Tadulako Tondo, Palu (`-0.835847, 119.893219`), alamat gedung, jam layanan piket (Senin–Jumat 08.00–17.00 WITA), dan saluran kontak resmi.

### 4.2 Halaman 2: Tentang Kami (`/tentang`)
- **Sejarah Organisasi:** Kilas balik berdirinya HMTS FT-UNTAD sejak 1994, peran kepemimpinan mahasiswa sipil di Bumi Tadulako, dan aksi kebencanaan gempa & likuefaksi Palu 2018.
- **Makna Lambang:** Filosofi lambang resmi HMTS FT-UNTAD (`docs/hmts.png`): Mahkota Tadulako berpadu truss segitiga bergradasi biru, kuning, coklat bumi (stabilitas mekanika, keselamatan K3, dan kepemimpinan berintegritas).
- **Visi & 3 Pilar Misi:** Visi kepengurusan aktif dalam boks kuning monumental dan 3 pilar misi: *Penalaran & Keilmuan*, *Kaderisasi & Karakter*, serta *Pengabdian Rekayasa Tepat Guna*.
- **Mars HMTS FT-UNTAD:** Lirik lagu perjuangan organisasi dengan tipografi editorial bersih dan pemutar audio mars.
- **Struktur Kepengurusan HMTS FT-UNTAD Periode 2026/2027 (Bagan Bertingkat / Tiered Tree Layout):**
  - **Tier 1 (Puncak Kepemimpinan):** Ketua Himpunan [Superadmin].
  - **Tier 2 (Pimpinan Harian - 4 BPH):** Ketua 1 (Internal), Ketua 2 (Eksternal), Sekretaris Umum, Bendahara Umum — ditampilkan bersih (Nama, NIM, Angkatan) dengan estetika `clean-card` dan garis stem vertikal/horizontal.
  - **Tier 3 (Divisi Pelaksana - 8 Divisi):** Divisi Ristek, Divisi Infokom, Divisi Penalaran, Divisi FKMTSI, Divisi Hublua (Hubungan Luar & Alumni), Divisi Bursa, Divisi Advokasi, Divisi Kaderisasi. Ditampilkan dalam grid kartu rapi lengkap dengan ikon garis SVG, peran, dan lingkup kerja tanpa nama kabinet fiktif.

### 4.3 Halaman 3: Kegiatan & Proker (`/kegiatan`)
- **Kalender Agenda Proker (M3 & M4):** Rekapitulasi 28 agenda kerja terjadwal.
- **Penyaring Kategori:** Filter interaktif (*Semua, Kompetisi, Workshop & Pelatihan, Pengabdian Masyarakat, Seminar Akademik*).
- **Detail Program Kerja Unggulan:**
  - *Civil Expo & Bridge Design Competition 2026* (tingkat nasional, hadiah Rp 30 Juta, juri HAKI & LPJK, kuota tim, formulir registrasi, dan unduh dokumen TOR PDF).
  - *Civil Workshop BIM Revit & ETABS 2026* (pelatihan pemodelan dan analisis beban gempa SNI 1726, 32 jam praktik, unduh silabus).
  - *Sipil Bangun Desa: Jembatan Gantung* (aksi sosial penggantian sling dan lantai jembatan di Kab. Sigi, open volunteer).
  - *Concrete Innovation Challenge* (riset inovasi beton ramah lingkungan target kuat tekan tinggi, panduan teknis).

### 4.4 Halaman 4: Layanan Mahasiswa (`/layanan`)
*Pusat utilitas mandiri mahasiswa (One-Stop Student Hub) dengan 4 tab terintegrasi (bebas dari penamaan kode modul internal pada tombol UI):*
1. **Tab 1: Peminjaman Alat Lab (M7 & M8):**
   - Katalog alat: Total Station Sokkia CX-105, Theodolite Topcon DT-200, Waterpass Nikon AC-2S, Hammer Test Schmidt.
   - Modal formulir reservasi online anti-bentrok jadwal (`borrowModal`).
2. **Tab 2: Presensi QR Acara (M2):**
   - Antarmuka pemindai simulasi kamera smartphone dan formulir input manual token 6-digit + NIM.
3. **Tab 3: Kotak Aspirasi & Tiket (M11):**
   - Formulir pengiriman aspirasi anonim (kategori lab, akademik, fasilitas) dengan perlindungan kerahasiaan identitas.
   - Sub-tab pelacak status tiket (`ASP-2026-XXXX`) untuk memantau respon pengurus harian.
4. **Tab 4: Bank Aset & Repositori (M12):**
   - Unduhan terbuka: Master Logo Kit & Kop Surat (ZIP), Blueprint CAD Jembatan Busur 60m (DWG), Paper Jurnal Beton Serat (PDF), dan Modul Praktikum Survei (PDF).

---

## 5. Rencana Milestone Rilis

- **Sprint 1 (Fondasi, Arsitektur 4 Halaman & MySQL):** Inisialisasi TALL Stack dengan MySQL, routing 4 halaman publik (`/`, `/tentang`, `/kegiatan`, `/layanan`), model dual-role (`superadmin`/`admin`), skema database M1 & M12.
- **Sprint 2 (Layanan Mahasiswa M2, M7, M8, M11):** Presensi QR dinamis berbasis MySQL dan Livewire polling, katalog & form pinjam alat anti-bentrok, kotak aspirasi honeypot dengan tiket pelacak.
- **Sprint 3 (Command Center `/app`, Kas Immutable & Testing):** Kas M5/M6 dengan void Superadmin, timeline M3/M4 internal, ekspor CSV native, testing & deployment single VPS murah.

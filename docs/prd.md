# PRODUCT REQUIREMENTS DOCUMENT (PRD)
## Web Profil & Sistem Manajemen Organisasi HMTS UNTAD
**Stack:** Laravel 11/12 · Livewire 3 · Alpine.js · Tailwind CSS · MySQL  
**Database Engine:** MySQL 8.0+ / MariaDB 10.11+  
**Design Aesthetic:** Modern Architectural Civil Engineering · Streamlined Agency Precision · Non-Gimmick Minimalist  
**Public Site Architecture:** 4 Halaman Utama Terpisah (Beranda, Tentang Kami, Kegiatan, Layanan)  
**Color Palette:** Canvas `#0A0A0E` · **CTA Tombol Oranye Baja `#CC6600`** (Teks Putih) · **Aksen Sorotan Kuning Helm `#FFE500`** · Tipografi `#FFFFFF` & `#E4E4E7`  
**Infrastructure Principle:** Zero-Redis Monolith · Single VPS Budget-Friendly  
**Versi Dokumen:** 5.3 (Steel Orange CTA & High-Vis Yellow Accent Edition)  
**Tanggal Pembaruan:** 8 Oktober 2026  

---

## 1. Eksekutif & Latar Belakang

Himpunan Mahasiswa Teknik Sipil Universitas Tadulako (HMTS UNTAD) membutuhkan platform digital terintegrasi yang memisahkan secara tegas antara konsumsi publik dan manajemen internal:
1. **Portal Publik 4 Halaman:** Etalase resmi organisasi yang modern, berwibawa, bersih (*anti-slop*), dan terstruktur rapi ke dalam 4 halaman khusus agar informasi tidak bertumpuk di satu halaman panjang:
   - **Halaman 1: Beranda (`/`):** Showcase monumental, ringkasan keilmuan, sorotan proker terdekat, dan pintasan layanan cepat.
   - **Halaman 2: Tentang Kami (`/tentang`):** Sejarah organisasi sejak 1994, filosofi lambang, visi & misi, lirik resmi Mars HMTS FT-UNTAD, serta struktur kepengurusan lengkap (BPH & 5 Departemen).
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
- **Warna Berkarakter Keteknikan:** Kuning Helm/Alat Berat (`#FFE500`) sebagai pemanggil aksi primer (*high-vis action*), Oranye Baja (`#CC6600`) sebagai penanda modul pendukung, di atas kanvas gelap `#0A0A0E`.
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
- **Top Minimal Ticker:** Periode aktif Kabinet Tektonika 2026/2027, Akreditasi LAM-Teknik Unggul, lokasi Palu, dan shortcut kotak aspirasi.
- **Floating Island Navbar:** Navbar berkapsul (`rounded-full`) dengan 4 navigasi utama: `Beranda`, `Tentang Kami`, `Kegiatan`, `Layanan`, serta tombol `Login Pengurus ↗`.
- **Framed Hero Container:** Bingkai lengkung (`rounded-[2rem]`) berlatar foto infrastruktur riil dengan headline monumental: `KOKOH, INOVATIF, MEMBANGUN [→] PERADABAN`, ringkasan identitas, dan aksi cepat jelajahi kegiatan / profil.
- **Strip Akreditasi & Rekognisi:** Stempel kemitraan dan reputasi (LAM-Teknik Unggul, HAKI Indonesia, LPJK Sulteng, BMPTTSSI Wilayah VIII, Kementerian PUPR).
- **Tentang HMTS Secara Singkat:** Profil ringkas sejarah pendirian sejak 1994, filosofi perjuangan di Bumi Tadulako pasca-bencana Palu 2018, moto resmi *"Kokoh, Inovatif, Membangun Peradaban"*, 4 indikator metrik utama (640+ Mahasiswa, 32 Tahun Rekam Jejak, Akreditasi Unggul, 1.200+ Alumni), dan tombol baca selengkapnya ke `/tentang`.
- **Kelebihan Masuk HMTS:** 5 pilar nilai tambah bagi mahasiswa (Jejaring Alumni Nasional & BUMN Karya, Pelatihan Software Sipil & Sertifikasi BIM/ETABS, Inkubasi Lomba Nasional KJI/KBGI & Hibah Riset PKM, Pengalaman Lapangan & Sipil Bangun Desa, serta Jiwa Korsa & Tutor Sebaya Bebas Biaya).
- **5 Pilar Spesialisasi Keilmuan Sipil (M1):** Rekayasa Struktur, Geoteknik & Tanah (highlight riset mitigasi likuefaksi Palu), Manajemen Konstruksi, Sumber Daya Air, dan Rekayasa Transportasi.
- **Program Kerja Unggulan Sedang Berjalan (M3/M4):** Kartu sorotan agenda terdekat (Civil Expo & Bridge Competition, Workshop BIM Revit 32 SKP, Sipil Bangun Desa Kab. Sigi) dengan tautan menuju halaman `/kegiatan`.
- **Akses Layanan Singkat (M2, M7, M8, M11, M12):** Grid pintasan cepat fungsional menuju modul Peminjaman Alat Lab, Scan Presensi QR Acara Mandiri, Kotak Aspirasi Terenkripsi, dan Bank Aset Digital dengan parameter navigasi langsung ke tab terkait di `/layanan`.
- **Peta Lokasi Sekretariat HMTS FT-UNTAD:** Peta Google Maps embed interaktif berkoordinat presisi di Kampus Bumi Tadulako Tondo, Palu (`-0.835847, 119.893219`), status piket aktif, alamat gedung lengkap, jam operasional layanan (Senin–Jumat 08.00–17.00 WITA), kontak resmi (Email, Hotline BPH, Instagram), dan petunjuk rute.

### 4.2 Halaman 2: Tentang Kami (`/tentang`)
- **Sejarah Organisasi:** Kilas balik berdirinya HMTS FT-UNTAD sejak tahun 1994, dedikasi keinsinyuran di Bumi Tadulako, dan ketangguhan pasca-gempa/likuefaksi Palu 2018.
- **Filosofi Lambang:** Arti mendalam bentuk segitiga rangka truss baja, warna kuning helm proyek, dan kanvas hitam obsidian.
- **Visi & 3 Pilar Misi:** Visi kabinet aktif dan 3 pilar: *Penalaran & Keilmuan*, *Kaderisasi & Kekeluargaan*, serta *Pengabdian Rekayasa Pedesaan*.
- **Mars HMTS FT-UNTAD:** Teks lirik resmi mars himpunan dengan tipografi editorial bersih dan pemutar audio mars.
- **Struktur Kepengurusan Lengkap:**
  - Dewan Pimpinan Harian (Ketua Himpunan [Superadmin], Wakil Ketua, Sekjen, Bendahara).
  - 5 Departemen Spesialis: Dep. Akademik & Riset, Dep. Kaderisasi, Dep. Pengmas, Dep. Hubungan Alumni, dan Dep. Media Informasi.

### 4.3 Halaman 3: Kegiatan & Proker (`/kegiatan`)
- **Kalender Agenda Proker (M3 & M4):** Kalender kegiatan sepanjang tahun kepengurusan.
- **Penyaring Kategori:** Filter interaktif (*Semua, Kompetisi Nasional, Workshop & Sertifikasi, Bakti Sosial Desa, Webinar*).
- **Detail Program Kerja Unggulan:**
  - *Civil Expo & Bridge Design Competition 2026* (jadwal, kuota tim, syarat juri HAKI/LPJK, hadiah Rp 30 Juta).
  - *Workshop BIM Revit & ETABS* (silabus 32 SKP terakreditasi).
  - *Sipil Bangun Desa* (aksi lapangan perbaikan jembatan gantung di Kab. Sigi).
  - *National Concrete Innovation Challenge* (riset beton substitusi ramah lingkungan).
- **Aksi Publik:** Formulir pendaftaran tim dan tombol unduh dokumen TOR (Term of Reference) PDF.

### 4.4 Halaman 4: Layanan Mahasiswa (`/layanan`)
*Pusat utilitas mandiri mahasiswa (One-Stop Student Hub) yang memuat 4 tab terintegrasi:*
1. **Tab 1: Peminjaman Alat Lab Sipil (M7 & M8):**
   - Katalog ketersediaan: Total Station Sokkia, Theodolite Topcon, Waterpass Nikon, Hammer Test Schmidt.
   - Formulir permohonan peminjaman online (Nama, NIM, tanggal pinjam/kembali, keperluan) terproteksi verifikasi anti-bentrok jadwal.
2. **Tab 2: Scan Presensi QR Acara Mandiri (M2):**
   - Antarmuka pemindai kamera smartphone untuk scan token QR dinamis (30-60 detik) saat hadir di acara terbuka.
   - Opsi input manual token 6-digit alternatif.
3. **Tab 3: Kotak Aspirasi Anonim & Pelacak Tiket (M11):**
   - Formulir pengiriman aspirasi *zero-identity logging* (kategori lab, akademik, fasilitas).
   - Fitur pencarian status tiket (`ASP-HMTS-2026-XXXX`) untuk memantau respon pengurus.
4. **Tab 4: Bank Aset & Repositori Riset (M12):**
   - Unduhan Master Logo Kit (ZIP), Blueprint CAD Jembatan 60m (DWG), Paper Riset Beton Tahan Gempa 38.5 MPa (PDF), dan Modul Praktikum Lab (PDF).

---

## 5. Rencana Milestone Rilis

- **Sprint 1 (Fondasi, Arsitektur 4 Halaman & MySQL):** Inisialisasi TALL Stack dengan MySQL, routing 4 halaman publik (`/`, `/tentang`, `/kegiatan`, `/layanan`), model dual-role (`superadmin`/`admin`), skema database M1 & M12.
- **Sprint 2 (Layanan Mahasiswa M2, M7, M8, M11):** Presensi QR dinamis berbasis MySQL dan Livewire polling, katalog & form pinjam alat anti-bentrok, kotak aspirasi honeypot dengan tiket pelacak.
- **Sprint 3 (Command Center `/app`, Kas Immutable & Testing):** Kas M5/M6 dengan void Superadmin, timeline M3/M4 internal, ekspor CSV native, testing & deployment single VPS murah.

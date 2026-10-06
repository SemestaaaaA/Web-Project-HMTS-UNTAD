# PRODUCT REQUIREMENTS DOCUMENT (PRD)
## Web Profil & Sistem Manajemen Organisasi HMTS UNTAD
**Stack:** Laravel 11/12 + Livewire 3 + Alpine.js + Tailwind CSS  
**Versi Dokumen:** 1.0 (Final Draft)  
**Tanggal:** 6 Oktober 2026  
**Status:** Disesuaikan untuk Ekosistem Laravel & Livewire  

---

## 1. Eksekutif & Latar Belakang

Himpunan Mahasiswa Teknik Sipil Universitas Tadulako (HMTS UNTAD) memerlukan platform terintegrasi yang menggabungkan:
1. **Profil Publik:** Etalase resmi organisasi yang modern, cepat, SEO-friendly, dan mudah diperbarui oleh pengurus tanpa ketergantungan pada tim pengembang.
2. **Sistem Operasional Internal (`/app`):** Sistem terpadu untuk administrasi, kepengurusan, absensi digital, timeline proker, kepanitiaan, kas & nota keuangan, inventaris alat lab/organisasi, arsip persuratan, notulensi rapat, dan saluran aspirasi mahasiswa sipil.

Prinsip utama sistem adalah **Single Source of Truth** berbasis **Kepengurusan Multi-Periode**. Data diinput satu kali pada modul internal, dan modul yang relevan (seperti struktur pengurus, portofolio kegiatan, profil divisi, serta mitra) langsung tersinkronisasi ke portal publik secara otomatis.

---

## 2. Masalah & Objektif

### 2.1 Masalah Utama
- **Fragmentasi Data:** Data anggota, notulensi, dan arsip tersebar di Google Drive, WhatsApp, dan Excel pribadi pengurus, menyebabkan *data loss* setiap pergantian pengurus (demisioner).
- **Integritas Finansial:** Kas dan kuitansi fisik rentan hilang; rekonsiliasi kas dan penyusunan Laporan Pertanggungjawaban (LPJ) memakan waktu berminggu-minggu.
- **Birokrasi & Komunikasi Lambat:** Surat masuk fisik sering terlambat sampai ke Ketua Himpunan, dan disposisi terhambat.
- **Manajemen Aset & Alat Sipil:** Peminjaman alat ukur, survei, dan perlengkapan inventaris sering mengalami bentrok jadwal dan tidak terpantau status kondisinya.
- **Ketiadaan Saluran Aspirasi Terpercaya:** Mahasiswa ragu menyampaikan kritik karena khawatir identitasnya bocor.

### 2.2 Objektif Fase 1
- **Zero-Dependency Content Management:** Pengurus dapat memperbarui profil himpunan, struktur kabinet, dan berita via dashboard Livewire.
- **Satu Ekosistem (Laravel + Livewire):** Monolitik modern yang ringkas, mudah di-host di VPS murah kampus/cloud, tanpa kerumitan arsitektur decoupled API.
- **Immutable Financial Ledger:** Setiap transaksi kas tercatat permanen, dilengkapi bukti nota ber-watermark/signed URL, dan hanya dapat dibatalkan melalui mekanisme *void* beralasan.
- **Serah Terima Digital (Handover):** Transisi kepengurusan selesai dalam hitungan jam dengan mengaktifkan periode kepengurusan baru, sementara data periode sebelumnya terkunci sebagai arsip digital.

### 2.3 Non-Goals (Batasan Ruang Lingkup)
- **Web Alumni (Web 2):** Platform jejaring alumni dibangun secara terpisah; sistem ini hanya menyimpan status keanggotaan dan penanda lulusan (calon alumni).
- **Payment Gateway Real-Time:** Kas digital difungsikan sebagai sistem pencatatan buku besar (*ledger accounting*), bukan rekening penampung transaksi bank langsung.
- **Aplikasi Mobile Native:** Antarmuka dibangun *responsive mobile-first PWA* dengan dukungan PWA offline-view dan kamera/scanner QR web.

---

## 3. Matriks Pengguna & Hak Akses (RBAC)

Akses dikontrol menggunakan sistem **Role & Permission** berbasis *Laravel Gate & Policy* yang terikat pada *Scope Periode Aktif*.

| Modul / Fitur | Ketua Himpunan (Super) | Sekretaris Umum | Bendahara Umum | Koordinator Divisi | Anggota Aktif | Panitia Kegiatan | Publik (Non-Login) |
| :--- | :---: | :---: | :---: | :---: | :---: | :---: | :---: |
| **Profil Publik & CMS** | Kelola & Terbitkan | Kelola & Terbitkan | — | — | — | — | Baca Saja |
| **Database Pengurus & Anggota** | Akses Penuh | Akses Penuh | Lihat Data | Lihat Divisinya | Edit Profil Sendiri | — | Lihat Publik |
| **Absensi & Presensi QR** | Pantau Semua | Kelola Sesi & Rekap | — | Kelola Sesi Divisi | Presensi Mandiri | Presensi Acara | — |
| **Timeline & Proker** | Pantau & Setujui | Pantau & Kelola | Pantau Anggaran | Kelola Proker Divisi | Lihat Agenda | Lihat Agenda | Lihat Publik |
| **Manajemen Kepanitiaan** | Pantau Semua | Pantau Semua | Pantau Kas Panitia | Lihat | Lihat | Kelola Panitianya | — |
| **Kas Digital & Buku Besar** | Pantau & Approval | Lihat Laporan | Akses Penuh & Void | Ajukan Pencairan | — | Ajukan Pencairan | — |
| **Bukti Nota & Kuitansi** | Lihat Semua | Lihat Semua | Akses Penuh Upload | Unggah Bukti Nota | — | Unggah Bukti Nota | — |
| **Katalog Inventaris** | Akses Penuh | Akses Penuh | Lihat Aset | Lihat Aset | Lihat Aset | Lihat Aset | Lihat Katalog |
| **Peminjaman Inventaris** | Approval Akhir | Verifikasi Jadwal | — | Ajukan Pinjam | Ajukan Pinjam | Ajukan Pinjam | Pengajuan Tamu* |
| **Arsip Surat & Disposisi** | Baca & Disposisi | Kelola & Penomoran | — | Terima Disposisi | — | — | — |
| **Notulensi Rapat** | Validasi & Finalisasi | Tulis & Distribusi | Lihat Notulensi | Tulis Notulensi Div | Baca Notulensi | Tulis Notulensi Pan | — |
| **Aspirasi Anonim** | Baca & Beri Solusi | Moderasi & Status | — | — | Kirim Aspirasi | Kirim Aspirasi | Kirim & Lacak |
| **Penyimpanan Aset Desain** | Kelola | Lihat & Unduh | Lihat & Unduh | Kelola Div. Media | Unduh Aset | Unduh Aset | Unduh Logo/Kit |

*\*Pengajuan pinjam tamu memerlukan verifikasi email/telepon dan persetujuan Sekretaris/Ketua.*

---

## 4. Konsep Arsitektur: Satu Domain, Dua Zona

Sistem berjalan dalam satu aplikasi Laravel dengan dua zona terpisah:

```
[ Domain: hmtsuntad.or.id ]
  ├── Zona Publik (/)                 --> Halaman profil, SEO, cepat, responsif
  └── Zona Internal (/app/*)          --> Dashboard SPA-like bertenaga Livewire 3
```

| Parameter | Zona Publik (`/`) | Zona Internal (`/app`) |
| :--- | :--- | :--- |
| **Routing Prefix** | `/`, `/tentang`, `/pengurus`, `/proker`, `/aspirasi`, `/arsip` | `/app/dashboard`, `/app/kas`, `/app/surat`, dll. |
| **Rendering Mode** | Blade View + Full Page Cache / CDN Ready | Livewire 3 Component (Reaktif, Real-time DOM diffing) |
| **Autentikasi** | Publik tanpa autentikasi (Rate-limited) | Wajib Login (Laravel Session Auth + MFA opsional) |
| **Data Scope** | `where('is_public', true)->where('period_id', $activePeriod)` | Scoped by `period_id` + User Role & Permissions |
| **Keamanan** | Cloudflare Turnstile, Honeypot, Static Output | Laravel Policies, Signed URLs, CSRF & Livewire Checksums |

---

## 5. Spesifikasi Fungsional Terinci (MoSCoW)

### 5.1 Fondasi Sistem (System Core)
- **F-01 [Must]: Autentikasi Modern**
  - Login dengan NIM / Email dan Password.
  - Password reset via email notifikasi.
  - Opsi *Magic Link login* untuk kemudahan pengurus di mobile.
  - Session timeout otomatis setelah masa inaktivitas tertentu.
- **F-02 [Must]: RBAC Multi-Tier (Laravel Permission / Spatie)**
  - Pembatasan aksi berbasis permission (`view_cash`, `approve_cash`, `manage_letters`, dll.).
  - Proteksi form dan tombol aksi menggunakan Blade Directive `@can` dan Livewire authorize calls.
- **F-03 [Must]: Arsitektur Periode Kepengurusan (Multi-Tenancy Time Scope)**
  - Tabel master `periods` (misal: "Periode 2026/2027").
  - Fitur *Active Period Switcher* bagi Admin/Ketua untuk memeriksa arsip masa lalu tanpa merusak data aktif.
  - Default filter `ActivePeriodScope` pada model-model transaksional.
- **F-04 [Must]: Audit Log Trail**
  - Mencatat aksi krusial: Perubahan nominal kas, void transaksi, persetujuan surat rahasia, peminjaman alat, serta perubahan hak akses.
  - Format log: User ID, Timestamps, IP Address, Action, Payload lama vs baru.
- **F-05 [Must]: Sistem Notifikasi Terpadu**
  - In-app notification bell (reaktif dengan Livewire).
  - Email notification via Laravel Queue & Mail untuk aksi prioritas (disposisi surat masuk, persetujuan pengeluaran dana, status aspirasi).

---

### 5.2 Profil Publik HMTS (Portal Eksternal)
- **P-01 [Must]: Visual Identitas & Landing Page (Patokan Resmi: hmtstadulako.framer.website)**
  - Desain resmi berbasis Framer: Dark Canvas `#0C0712`, Headings Putih `#FFFFFF` Poppins Bold, Body `#F3F4F5` Switzer, Aksen Tombol Oranye Hangat `#CC6600` (pill-shaped), Color-Blocking tanpa drop shadow, sudut kontainer tajam 0px.
  - Bagian: Hero Banner, Profil Singkat, Visi & Misi, Nilai-nilai Himpunan, Sambutan Ketua Umum.
- **P-02 [Must]: Struktur Pengurus Interaktif**
  - Menampilkan bagan organisasi kabinet periode aktif secara visual.
  - Filter per bidang/divisi (BPH, Divisi Keilmuan & Keteknikan, Divisi Kaderisasi, Divisi Minat & Bakat, Divisi Humas, Divisi Dana & Usaha).
  - Foto pengurus dengan profil singkat dan portofolio.
- **P-03 [Must]: Galeri & Portofolio Proker Publik**
  - Daftar kegiatan yang telah terlaksana (foto, deskripsi, tanggal, dampak kegiatan).
- **P-04 [Must]: Halaman Mitra & Sponsor**
  - Logo mitra industri konstruksi, instansi pemerintah (Dinas PU, Balai Jasa Konstruksi), dan sponsor kampus.
- **P-05 [Must]: SEO & Metadata Lengkap**
  - Meta tags, OpenGraph (OG) image generator untuk share WhatsApp/Instagram, XML Sitemap dinamis, dan schema.org `EducationalOrganization`.
- **P-06 [Should]: Berita, Artikel & Agenda HMTS**
  - Publikasi agenda ujian, workshop SAP2000/AutoCAD, lomba ketekniksipilan, dan seminar nasional.

---

### 5.3 Modul Internal (M1 s/d M12)

#### M1 · Database Pengurus & Anggota
- **M1-01 [Must]: Master Data Anggota Sipil:**
  - Data: NIM, Nama Lengkap, Angkatan, Kelas, Peminatan (Struktur/Transportasi/Geoteknik/Hidro/Manajemen Konstruksi), No. WA, Email, Status (Aktif, Demisioner, Alumni).
  - Enkripsi/proteksi field kontak untuk mematuhi UU Pelindungan Data Pribadi (UU PDP).
- **M1-02 [Must]: Penugasan Struktur & Jabatan:**
  - Penempatan anggota ke divisi dan jabatan per periode kepengurusan.
  - Riwayat keaktifan pengurus lintas periode.
- **M1-03 [Should]: Impor/Ekspor Massal via Laravel-Excel:**
  - Impor data mahasiswa baru/calon pengurus dari spreadsheet Excel/CSV.
  - Ekspor direktori pengurus ke format Excel & PDF resmi.

#### M2 · Absensi & Presensi Digital
- **M2-01 [Must]: Pembuatan Sesi Presensi:**
  - Jenis kegiatan: Rapat Pengurus, Rapat Divisi, Rapat Akbar, Rapat Panitia Proker.
  - Dilengkapi durasi kedaluwarsa sesi (expired after X hours/minutes).
- **M2-02 [Must]: Presensi QR Code Reaktif:**
  - Generate QR token dinamis berbasis waktu (refresh tiap 30-60 detik) untuk mencegah kecurangan *screenshot sharing*.
  - Pemindaian instan via kamera smartphone (HTML5 QR scanner di browser).
- **M2-03 [Should]: Pengajuan Izin & Sakit:**
  - Form izin mandiri bagi anggota yang tidak dapat hadir dengan lampiran textbox alasan.
- **M2-04 [Must]: Rekapitulasi Otomatis:**
  - Persentase kehadiran per individu dan divisi; ekspor rekap ke format Excel untuk bahan evaluasi.

#### M3 · Timeline Proker & Manajemen Tugas
- **M3-01 [Must]: Master Program Kerja:**
  - Nama proker, Divisi penanggung jawab, Ketua pelaksana (PJ), Estimasi anggaran, Tanggal pelaksanaan, Status (Draft, Approved, Ongoing, Selesai, Evaluasi).
- **M3-02 [Must]: Tampilan Kalender & Milestone:**
  - Kalender kegiatan terpadu himpunan.
  - Milestone sub-kegiatan dengan *checklist action items*.
- **M3-03 [Should]: Integrasi Publikasi Publik:**
  - Tombol toggle: *"Tampilkan di Profil Publik"* untuk proker yang telah selesai dan siap dipamerkan.

#### M4 · Manajemen Kepanitiaan Event
- **M4-01 [Must]: Ruang Kerja Panitia Mandiri:**
  - Pembentukan kepanitiaan ad-hoc (misal: Civil Expo, Lomba Jembatan, Kemah Akrab).
  - Hak akses panitia mencakup mahasiswa sipil di luar struktur inti pengurus.
- **M4-02 [Should]: Task Board Sederhana (Kanban Lite):**
  - Status tugas divisi panitia: *To-Do, In-Progress, Review, Done*.
- **M4-03 [Must]: Hubungan Anggaran Panitia ke Kas:**
  - Pengajuan pagu anggaran kepanitiaan yang terhubung ke modul Kas Digital.

#### M5 · Kas Digital & Buku Besar Keuangan
- **M5-01 [Must]: Pencatatan Pemasukan & Pengeluaran:**
  - Kolom: Tanggal, Akun Kas, Kategori (Iuran, Sponsor, Registrasi, Konsumsi, Logistik, Transport, dll.), Nominal, Pihak Terkait, Keterangan, Tautan Bukti Nota.
- **M5-02 [Must]: Multi-Akun Kas:**
  - Akun Kas Utama Himpunan, Kas Dana Usaha, Kas Acara Tertentu.
- **M5-03 [Must]: Buku Besar Immutable (Anti-Edit / Anti-Hapus):**
  - Transaksi yang sudah tersimpan **tidak boleh di-delete/di-edit langsung**.
  - Koreksi kesalahan wajib menggunakan mekanisme **Void Transaksi** dengan pencatatan alasan, pencatat void, dan penciptaan jurnal pembalik.
- **M5-04 [Must]: Approval Workflow Transaksi Besar:**
  - Pengeluaran di atas ambang batas (misal > Rp 500.000) berstatus *Pending Approval* dan membutuhkan verifikasi Ketua Himpunan sebelum disetujui Bendahara.
- **M5-05 [Must]: Laporan Keuangan & Bahan LPJ:**
  - Neraca kas, arus kas masuk/keluar, filter per proker, dan ekspor instan ke PDF (format laporan LPJ standar) dan Excel.

#### M6 · Database Bukti Nota & Kuitansi
- **M6-01 [Must]: Unggah Nota Terenkripsi / Aman:**
  - Upload bukti fisik (foto struk, kuitansi, transfer) format JPEG/PNG/PDF.
  - Kompresi gambar otomatis di server (via Intervention Image / Spatie MediaLibrary) untuk menghemat ruang disk VPS.
- **M6-02 [Must]: Akses Privat Signed URL:**
  - Berkas nota disimpan di private storage (`storage/app/private/receipts`).
  - Akses file dilindungi *temporary signed URL* Laravel berdurasi 5-15 menit khusus pengurus yang berhak.
- **M6-03 [Should]: Ekspor Arsip Nota Ber-Indeks:**
  - Unduh seluruh nota per proker dalam satu file ZIP terstruktur untuk lampiran fisik LPJ.

#### M7 · Katalog Inventaris & Alat Sipil
- **M7-01 [Must]: Katalog Aset:**
  - Data: Kode Barang unik, Nama Alat (Theodolite, Total Station, Waterpass, Hammer Test, Tenda, Sound System, Proyektor, Meja), Kategori, Jumlah Total, Jumlah Tersedia, Lokasi Penyimpanan, Kondisi (Baik, Rusak Ringan, Rusak Berat), Foto Alat.
- **M7-02 [Should]: Label QR Code Tiap Aset:**
  - Generate sticker QR code untuk ditempel pada unit barang fisik; pemindaian QR membuka halaman detail status alat di `/app/inventaris/{id}`.
- **M7-03 [Could]: Log Pemeliharaan & Kalibrasi:**
  - Riwayat kalibrasi alat ukur dan servis rutin peralatan himpunan.

#### M8 · Peminjaman Inventaris (Anti-Bentrok)
- **M8-01 [Must]: Pengajuan Pinjam Mandiri:**
  - Input: Nama peminjam, Kontak, Tanggal & Jam Pinjam, Tanggal & Jam Kembali, Keperluan (Praktikum, Tugas Lapangan, Kegiatan Kampus, Kegiatan Eksternal).
- **M8-02 [Must]: Validasi Ketersediaan Real-Time (Conflict Detector):**
  - Sistem otomatis menolak atau memperingatkan jika kuantitas alat pada rentang waktu yang dipilih sudah dipesan pihak lain.
- **M8-03 [Must]: Alur Persetujuan & Serah Terima:**
  - Status: *Diajukan -> Disetujui Koordinator/Ketua -> Diambil (Check-Out) -> Dikembalikan (Check-In)*.
  - Formulir check-in mencatat kondisi alat saat kembali (apakah ada cacat/rusak/hilang).
- **M8-04 [Should]: Notifikasi Keterlambatan:**
  - Sistem memberi penanda warna merah dan notifikasi bagi peminjaman yang melewati estimasi waktu pengembalian.

#### M9 · Arsip Surat Masuk, Keluar & Disposisi
- **M9-01 [Must]: Register Surat Masuk:**
  - Nomor agenda, Nomor surat asli, Pengirim, Tanggal masuk, Perihal, Sifat (Biasa, Penting, Rahasia), Berkas scan PDF.
- **M9-02 [Must]: Lembar Disposisi Digital:**
  - Ketua Himpunan dapat mengisi arahan disposisi secara daring ("Hadiri", "Tindak lanjuti Divisi Humas", "Arsipkan") dan menunjuk sekretaris/koordinator terkait.
- **M9-03 [Should]: Penomoran Surat Keluar Otomatis:**
  - Generator format nomor surat resmi HMTS UNTAD: `[Nomor Urut]/A/HMTS-FT/UNTAD/[Bulan Romawi]/[Tahun]`.

#### M10 · Notulensi Rapat Digital
- **M10-01 [Must]: Format Notulensi Terstruktur:**
  - Tanggal, Waktu, Pimpinan Rapat, Notulis, Daftar Hadir (tertaut ke modul M2), Agenda Bahasan, Poin Diskusi, Keputusan Final, Action Items / Tugas Tindak Lanjut.
- **M10-02 [Should]: Konversi Action Item Menjadi Tugas:**
  - Satu klik untuk menjadikan butir keputusan rapat sebagai tugas bertenggat untuk koordinator/anggota terkait.
- **M10-03 [Could]: Ekspor Berita Acara & Notulensi ke PDF Resmi:**
  - Layout otomatis dengan kop surat resmi HMTS UNTAD.

#### M11 · Kotak Aspirasi Anonim Mahasiswa Sipil
- **M11-01 [Must]: Garansi 100% Anonimitas:**
  - Tidak menyimpan `user_id`, nama, email, maupun IP mentah ke tabel aspirasi.
  - Enkripsi hashing satu arah untuk IP harian (HMAC) hanya untuk rate-limiting anti-spam, tanpa mengaitkan ke isi pesan.
- **M11-02 [Must]: Perlindungan Anti-Spam (Cloudflare Turnstile):**
  - Widget Turnstile captcha tanpa interaksi mengganggu.
- **M11-03 [Must]: Kode Tiket Aspirasi (Tracking Code):**
  - Mahasiswa yang mengirim kritik/saran mendapatkan token acak (misal: `HMTS-ASP-8F29A`) untuk mengecek status tindak lanjut dan balasan pengurus secara anonim di portal publik.
- **M11-04 [Must]: Dashboard Moderasi Pengurus:**
  - Status: *Baru, Ditinjau, Ditindaklanjuti, Dijawab, Diarsipkan*.

#### M12 · Bank Aset Desain & Media HMTS
- **M12-01 [Must]: Repositori Branding & Identitas:**
  - Koleksi logo HMTS (PNG transparan, SVG, Vector), guideline warna resmi, font standar, kop surat, dan template PowerPoint/Canva.
- **M12-02 [Should]: Tautan File Master (Google Drive / Figma):**
  - File proyek besar (.PSD, .AI) diintegrasikan lewat tautan Google Drive resmi organisasi untuk menghemat kapasitas storage server.
- **M12-03 [Must]: Showcase Publik:**
  - Bagian unduh logo resmi HMTS UNTAD dapat diakses langsung oleh panitia/pihak luar di zona publik.

---

## 6. Kebutuhan Non-Fungsional & Keamanan

1. **Keamanan & Kepatuhan UU PDP:**
   - Perlindungan data pribadi mahasiswa (NIM, nomor HP) dari scraping publik.
   - Session fixation protection, CSRF token di setiap request, rate-limiting throttle (10 req/min untuk endpoint publik sensitif).
2. **Kinerja & Kecepatan:**
   - Server-side response time < 250ms untuk halaman publik.
   - Pemanfaatan *Livewire defer loading* dan *Alpine.js transitions* untuk kelancaran interaksi.
3. **Penyimpanan Berkas (Storage Isolation):**
   - Berkas publik (logo, foto pengurus) disimpan di disk `public` dengan CDN/symlink.
   - Berkas privat (nota kas, surat masuk, bukti izin) disimpan di disk `private` dan diakses eksklusif via *Controller Streaming / Signed URLs*.
4. **PWA & Offline Capability:**
   - Web App Manifest untuk instalasi di homescreen smartphone pengurus.
   - Service worker untuk cache aset statis landing page.

---

## 7. Rencana Rilis & Alokasi Fase

```
┌────────────────────────────────────────────────────────┐
│ Fase A (Sprint 1-2): Fondasi, Publik, M1, M12          │
│ • Setup Laravel 11 + Livewire 3 + Tailwind             │
│ • RBAC, Periode Switcher, Auth Breeze/Fortify          │
│ • Landing Page Publik & Profil Pengurus (M1)           │
│ • Bank Aset Desain (M12)                               │
└──────────────────────────┬─────────────────────────────┘
                           ▼
┌────────────────────────────────────────────────────────┐
│ Fase B (Sprint 3-4): Tata Kelola & Kegiatan            │
│ • Presensi QR Dinamis & Rekap (M2)                     │
│ • Timeline Proker (M3) & Kepanitiaan (M4)              │
│ • Arsip Surat & Disposisi (M9)                         │
│ • Notulensi Rapat & Action Items (M10)                 │
└──────────────────────────┬─────────────────────────────┘
                           ▼
┌────────────────────────────────────────────────────────┐
│ Fase C (Sprint 5-6): Finansial, Logistik & Aspirasi    │
│ • Kas Digital Multi-Akun & Immutable Ledger (M5)       │
│ • Database Bukti Nota & Signed Storage (M6)            │
│ • Inventaris Alat & Anti-Bentrok Booking (M7 & M8)     │
│ • Aspirasi Anonim + Tracking Token (M11)               │
└────────────────────────────────────────────────────────┘
```

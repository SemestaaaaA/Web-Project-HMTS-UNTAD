# PRODUCT REQUIREMENTS DOCUMENT (PRD)
## Web Profil & Sistem Manajemen Organisasi HMTS UNTAD
**Stack:** Laravel 11/12 · Livewire 3 · Alpine.js · Tailwind CSS  
**Design Aesthetic:** Industrial Civil Engineering & Heavy Construction · High-Vis Yellow CTA · Steel Orange Accents  
**Versi Dokumen:** 3.0 (Civil Construction Edition)  
**Tanggal Pembaruan:** 7 Oktober 2026  

---

## 1. Eksekutif & Latar Belakang

Himpunan Mahasiswa Teknik Sipil Universitas Tadulako (HMTS UNTAD) membutuhkan platform digital terintegrasi yang menggabungkan:
1. **Portal Publik:** Etalase resmi organisasi yang modern, berwibawa, cepat, dan merefleksikan identitas ketekniksipilan bertema **rekayasa konstruksi nyata (*heavy civil construction*)** — menggunakan kanvas gelap baja struktural, **CTA Utama Kuning Konstruksi `#FFE500`**, dan **warna pendukung Oranye Baja `#CC6600`**.
2. **Command Center Internal (`/app`):** Sistem operasional administrasi satu pintu untuk kepengurusan, absensi QR dinamis, timeline proker, kepanitiaan, kas dengan pembukuan permanen (*immutable ledger*), inventaris alat lab & survei sipil anti-bentrok, arsip persuratan, notulensi rapat, dan kotak aspirasi mahasiswa.

---

## 2. Masalah & Objektif

### 2.1 Masalah Utama
- **Fragmentasi Data:** Data anggota dan notulensi tercecer di grup chat dan spreadsheet pribadi, berisiko hilang saat pergantian kepengurusan.
- **Integritas Kas & Kuitansi:** Kas fisik dan nota rentan hilang; penyusunan LPJ keuangan memakan waktu berminggu-minggu.
- **Peminjaman Alat Sipil Sering Bentrok:** Alat ukur (Theodolite, Total Station, Waterpass, Hammer Test) dipinjam tanpa pemantauan jadwal terpusat.
- **Birokrasi Lambat:** Distribusi surat masuk dan disposisi Ketua Himpunan memakan waktu lama karena masih mengandalkan berkas cetak.
- **Aspirasi Mahasiswa Rendah:** Mahasiswa ragu menyampaikan kritik karena khawatir identitasnya diketahui pengurus.

### 2.2 Objektif Utama & Target MVP (Fase 1)
- **Desain Otentik Bertema Konstruksi:** Menghindari template generik; menerapkan visual drafting CAD, stempel stationing (`STA`), marka elevasi, dan plat kaca struktural.
- **Warna Berkarakter Keteknikan:** Kuning Helm/Alat Berat (`#FFE500`) sebagai pemanggil aksi primer, Oranye Primer Baja (`#CC6600`) sebagai penanda modul pendukung, di atas kanvas gelap `#0C0712`.
- **Arsitektur Ringkas (Tanpa Over-Engineering):** Monolitik TALL Stack (Tailwind, Alpine, Laravel, Livewire) tanpa kerumitan decoupled microservices, siap jalan di single VPS murah.
- **Pembukuan Keuangan Anti-Manipulasi:** Setiap transaksi kas dicatat permanen; pembatalan hanya melalui mekanisme *void* beralasan.

---

## 3. Matriks Pengguna & Hak Akses (RBAC)

| Modul / Fitur | Ketua Himpunan | Sekretaris Umum | Bendahara Umum | Koordinator Divisi | Anggota Aktif | Panitia Proker | Publik (Tamu) |
| :--- | :---: | :---: | :---: | :---: | :---: | :---: | :---: |
| **Portal Publik & Berita** | Kelola & Rilis | Kelola & Rilis | — | — | — | — | Baca Saja |
| **Database Anggota (M1)** | Akses Penuh | Akses Penuh | Lihat Data | Lihat Divisinya | Edit Profil Sendiri | — | Lihat Publik |
| **Presensi QR (M2)** | Pantau Semua | Buat Sesi & Rekap | — | Buat Sesi Divisi | Presensi Mandiri | Presensi Acara | — |
| **Timeline Proker (M3)** | Pantau & Setujui | Pantau & Kelola | Pantau Anggaran | Kelola Proker Div | Lihat Agenda | Lihat Agenda | Lihat Publik |
| **Kepanitiaan (M4)** | Pantau Semua | Pantau Semua | Pantau Kas Panitia | Lihat | Lihat | Kelola Panitianya | — |
| **Kas Digital (M5)** | Pantau & Approval | Lihat Laporan | Akses Penuh & Void | Ajukan Pencairan | — | Ajukan Pencairan | — |
| **Bukti Nota (M6)** | Lihat Semua | Lihat Semua | Akses Upload/Kelola | Unggah Bukti Nota | — | Unggah Bukti Nota | — |
| **Katalog Alat Lab (M7)**| Akses Penuh | Akses Penuh | Lihat Aset | Lihat Aset | Lihat Aset | Lihat Aset | Lihat Katalog |
| **Peminjaman Alat (M8)** | Approval Akhir | Verifikasi Jadwal | — | Ajukan Pinjam | Ajukan Pinjam | Ajukan Pinjam | Ajukan Pinjam* |
| **Surat & Disposisi (M9)**| Baca & Disposisi | Kelola & Nomor | — | Terima Disposisi | — | — | — |
| **Notulensi Rapat (M10)** | Validasi & Sahkan | Tulis & Distribusi | Lihat | Tulis Notulen Div | Baca | Tulis Notulen Pan | — |
| **Aspirasi Anonim (M11)** | Baca & Tanggapi | Moderasi Status | — | — | Kirim Aspirasi | Kirim Aspirasi | Kirim & Lacak |
| **Bank Aset Desain (M12)**| Kelola Aset | Unduh | Unduh | Kelola Aset Media | Unduh | Unduh | Unduh Logo Kit |

---

## 4. Spesifikasi Fungsional Terinci (M1 s/d M12)

- **P-01 [Must]: Visual Identity Bertema Heavy Civil Engineering:** Latar kanvas pekat `#0C0712`, grid blueprint halus, aksen garis pita bahaya (*hazard stripe*), CTA kuning konstruksi `#FFE500`, aksen pendukung oranye baja `#CC6600`, dan panel kaca struktural tebal.
- **M1 · Master Database Anggota Sipil:** NIM, Peminatan (Struktur, Geoteknik, Transportasi, Hidro, Manajemen Konstruksi), Nomor WhatsApp terenkripsi.
- **M2 · Presensi QR Dinamis:** Token rahasia berganti otomatis tiap 30-60 detik via cache server; scanner kamera smartphone.
- **M3 & M4 · Timeline Proker & Kepanitiaan:** Manajemen agenda kegiatan, penanggung jawab, dan task board panitia ad-hoc.
- **M5 & M6 · Kas Digital & Bukti Nota:** Buku kas immutable (tanpa edit/delete langsung, koreksi via Action `VoidCashTransactionAction`), kompresi bukti kuitansi ke storage privat terproteksi signed URL.
- **M7 & M8 · Inventaris Alat Sipil & Conflict Detector:** Katalog Theodolite, Total Station, Waterpass, Hammer Test. Algoritma otomatis memblokir bentrok peminjaman alat pada rentang waktu bersamaan.
- **M9 & M10 · Surat Disposisi & Notulensi Rapat:** Register persuratan, lembar disposisi digital Ketua Himpunan, dan ekspor berita acara PDF resmi.
- **M11 · Kotak Aspirasi Mahasiswa:** Zero-identity logging (tanpa user_id, tanpa ip_address), perlindungan Cloudflare Turnstile, dan penerbitan tiket acak pelacakan jawaban.
- **M12 · Bank Aset & Dokumen:** Repositori master logo, kop surat, pedoman warna, dan template dokumen proyek.

---

## 5. Rencana Milestone Rilis

- **Sprint 1 (Fondasi, Desain Konstruksi & Portal Publik):** Inisialisasi TALL Stack, setup token desain konstruksi (Kuning `#FFE500` & Oranye `#CC6600`), migrasi tabel dasar, layout publik, M1, M12.
- **Sprint 2 (Presensi QR, Proker & Persuratan):** Presensi dinamis M2, timeline M3/M4, persuratan M9, notulensi M10.
- **Sprint 3 (Kas Immutable, Inventaris Anti-Bentrok & Aspirasi):** Kas M5/M6, inventaris alat sipil M7/M8, kotak aspirasi M11, security testing & rilis VPS.

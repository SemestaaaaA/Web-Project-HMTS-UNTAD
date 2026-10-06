# PRODUCT REQUIREMENTS DOCUMENT · WEB 1
## Web Profil & Manajemen Organisasi HMTS UNTAD
**Versi:** 0.2 (Draft)  
**Tanggal:** 2 Oktober 2026  
**Basis:** Notulensi Tahap 1 (31 Maret 2026) + pembaruan ruang lingkup  
*Dokumen ini menggantikan PRD v0.1 untuk sisi organisasi. Proyek dipecah menjadi dua web: Web 1 (dokumen ini) dan Web 2 Platform Alumni (PRD terpisah). Poin yang bukan hasil notulensi ditandai [Asumsi] atau [Rekomendasi] untuk divalidasi bersama HMTS.*

---

## 1. Ringkasan
Web 1 menggabungkan dua hal dalam satu aplikasi dan satu domain: profil publik HMTS yang modern dan mudah diperbarui, serta sistem manajemen internal organisasi yang menggantikan spreadsheet, grup chat, dan folder yang tercecer. Intinya adalah **satu sumber data**. Daftar pengurus, proker, dan mitra diinput sekali di sistem internal, lalu sebagian otomatis tampil di halaman publik.

Karena pengurus berganti setiap tahun, semua data diikat ke periode kepengurusan. Data lama tetap tersimpan sebagai arsip, dan pengurus baru bisa langsung membaca jejak keputusan, keuangan, dan kegiatan pendahulunya.

---

## 2. Masalah & Tujuan

### Masalah
- Data organisasi tersebar (Excel, Drive, WhatsApp), sehingga hilang atau sulit dicari saat pergantian pengurus.
- Keuangan dan nota sulit dilacak, dan penyusunan LPJ memakan waktu.
- Surat masuk penting bisa terlambat sampai ke Ketua.
- Inventaris dan peminjaman tidak tercatat rapi, sehingga barang hilang atau bentrok jadwal.
- Tidak ada saluran aspirasi yang aman dan benar-benar anonim.
- Konten website tidak bisa diperbarui tanpa developer.

### Tujuan Fase 1
- Seluruh konten publik diperbarui admin tanpa developer.
- Pengurus mengelola operasional harian (anggota, absensi, proker, kepanitiaan, surat, notulensi) dalam satu tempat.
- Keuangan tercatat transparan dengan bukti nota yang tertaut ke transaksi.
- Serah terima antarperiode selesai dalam hitungan jam, bukan minggu.

### Non-Goals Fase 1
- Platform alumni (Web 2, PRD terpisah).
- Payment gateway atau integrasi rekening bank. Kas digital bersifat pencatatan.
- Aplikasi mobile native. Cukup web responsif/PWA.
- Ekspansi multi-himpunan (skema data disiapkan, fiturnya belum).

---

## 3. Pengguna & Hak Akses
Hak akses dirancang berbasis **role + permission** (bukan role yang di-hardcode), dan ditegakkan di level database lewat **Row Level Security (RLS)**.

| Modul | Ketua (tertinggi) | Sekretaris | Bendahara | Koordinator | Anggota | Panitia |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| **Konten publik** | Kelola | Kelola | — | — | — | — |
| **Pengurus & anggota** | Kelola | Kelola | Lihat | Lihat divisi | Profil sendiri | — |
| **Absensi** | Lihat | Kelola | — | Kelola divisi | Isi | Isi |
| **Timeline proker** | Kelola | Kelola | Lihat | Kelola divisi | Lihat | Lihat |
| **Kepanitiaan** | Kelola | Kelola | Lihat | Lihat | Lihat | Kelola (event sendiri) |
| **Kas & nota** | Lihat, setuju | Lihat | Kelola | Ajukan | — | Ajukan |
| **Inventaris** | Kelola | Kelola | Lihat | Lihat | Lihat | Lihat |
| **Peminjaman** | Setuju | Kelola | Lihat | Ajukan | Ajukan | Ajukan |
| **Arsip surat** | Lihat semua, notifikasi | Kelola | — | — | — | — |
| **Notulensi** | Kelola | Kelola | Lihat | Lihat | Lihat | Lihat |
| **Aspirasi** | Lihat, tanggapi | Moderasi | — | — | Kirim | Kirim |
| **Aset desain** | Kelola | Lihat | Lihat | Kelola (kreatif) | Lihat | Lihat |

*Catatan:* Pengunjung publik hanya melihat zona publik. Aspirasi juga bisa dikirim tanpa login (M11).

---

## 4. Satu Domain, Dua Zona
Rekomendasi teknis: **satu repositori, satu deployment, satu domain**, dengan dua zona yang dipisahkan tegas oleh routing dan middleware autentikasi.

| Aspek | Zona Publik | Zona Internal |
| :--- | :--- | :--- |
| **Alamat** | `domain.id/` (beranda, tentang, kepengurusan, mitra, portofolio) | `domain.id/app/*` (dashboard, seluruh modul manajemen) |
| **Akses** | Terbuka, tanpa login | Wajib login, dibatasi role dan periode |
| **Rendering** | Statis/ISR di-cache CDN, SEO penuh | Dinamis, tidak di-cache, noindex |
| **Sumber data** | Hanya tabel dan kolom yang ditandai publik | Seluruh data dengan RLS default-deny |

---

## 5. Kebutuhan Fungsional (MoSCoW)

### Fondasi Sistem
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| F-01 | Autentikasi: email dan kata sandi, magic link, opsional Google | Must | A |
| F-02 | RBAC role + permission, ditegakkan lewat RLS | Must | A |
| F-03 | Manajemen periode kepengurusan (aktif/arsip), data historis tetap terbaca | Must | A |
| F-04 | Audit log untuk aksi sensitif (keuangan, surat, hak akses) | Must | A |
| F-05 | Notifikasi in-app dan email | Must | A |
| F-06 | Dashboard beranda per role (tugas, notifikasi, ringkasan) | Should | A |

### Profil Publik
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| P-01 | Visual refresh dan design system halaman publik | Must | A |
| P-02 | Halaman About Us / profil umum | Must | A |
| P-03 | Kepengurusan per periode, ditarik otomatis dari database pengurus | Must | A |
| P-04 | Riwayat kemitraan dan sponsor (CRUD admin) | Must | A |
| P-05 | Portofolio kegiatan, ditarik dari proker publik | Must | A |
| P-06 | SEO dasar: metadata, sitemap, gambar OG | Must | A |
| P-07 | Berita, agenda, dan galeri | Could | B |

### M1 · Database Pengurus & Anggota
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| M1-01 | Profil anggota: nama, NIM, angkatan, kontak, foto (field sensitif dibatasi) | Must | A |
| M1-02 | Struktur divisi dan jabatan per periode, riwayat jabatan | Must | A |
| M1-03 | Impor massal dari CSV/Excel | Should | A |
| M1-04 | Status keanggotaan (aktif, nonaktif, lulus) penanda calon alumni Web 2 | Should | A |

### M2 · Database Absensi
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| M2-01 | Buat sesi absensi (rapat/kegiatan) tertaut proker/kepanitiaan | Must | B |
| M2-02 | Presensi via QR dinamis atau tautan berbatas waktu | Must | B |
| M2-03 | Status hadir/izin/sakit/alpa + bukti izin | Should | B |
| M2-04 | Rekap per anggota dan periode, ekspor Excel | Must | B |
| M2-05 | Validasi lokasi (geofence) | Could | B |

### M3 · Timeline Proker
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| M3-01 | Daftar proker: PJ, divisi, tanggal, status, anggaran rencana | Must | B |
| M3-02 | Tampilan timeline/Gantt sederhana dan kalender | Must | B |
| M3-03 | Milestone dan tugas dengan tenggat serta pengingat | Should | B |
| M3-04 | Penanda "publikasikan ke profil" dan tautan LPJ | Should | B |

### M4 · Manajemen Kepanitiaan
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| M4-01 | Buat kepanitiaan: ketua, sekretaris, bendahara, divisi | Must | B |
| M4-02 | Akses terbatas per kepanitiaan (termasuk panitia non-pengurus) | Must | B |
| M4-03 | Anggaran panitia tertaut ke Kas Digital | Must | B |
| M4-04 | Papan tugas (kanban) per divisi panitia | Should | B |
| M4-05 | Arsip kepanitiaan (LPJ, dokumen) setelah acara selesai | Should | B |

### M5 · Kas Digital
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| M5-01 | Catat pemasukan/pengeluaran: tanggal, kategori, nominal, pihak, tertaut proker/panitia | Must | C |
| M5-02 | Multi-akun kas (kas umum, kas panitia) | Must | C |
| M5-03 | Ledger immutable (hanya di-void dengan alasan) | Must | C |
| M5-04 | Laporan bulanan, per proker, bahan LPJ; ekspor PDF/Excel | Must | C |
| M5-05 | Persetujuan pengeluaran di atas ambang batas (Bendahara -> Ketua) | Should | C |
| M5-06 | Rekonsiliasi saldo dan pengingat transaksi tanpa nota | Should | C |

### M6 · Database Bukti Nota
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| M6-01 | Unggah foto/PDF nota tertaut ke transaksi | Must | C |
| M6-02 | Kompresi otomatis di sisi klien | Must | C |
| M6-03 | Akses privat lewat signed URL berumur pendek | Must | C |
| M6-04 | Pencarian dan filter transaksi | Should | C |
| M6-05 | Ekspor arsip tahunan ke Google Drive/ZIP | Should | C |
| M6-06 | OCR nominal dan tanggal otomatis | Could | C |

### M7 · Inventaris
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| M7-01 | Katalog barang: kode, kategori, jumlah, kondisi, lokasi, foto | Must | C |
| M7-02 | Label QR per barang untuk pindai cepat | Should | C |
| M7-03 | Riwayat kondisi dan perawatan | Could | C |
| M7-04 | Stock opname berkala | Could | C |

### M8 · Peminjaman Inventaris
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| M8-01 | Pengajuan pinjam: peminjam, barang, tanggal, keperluan | Must | C |
| M8-02 | Cek ketersediaan dan anti-bentrok jadwal | Must | C |
| M8-03 | Persetujuan oleh pengelola inventaris/Ketua | Must | C |
| M8-04 | Check-out dan check-in dengan catatan kondisi fisik | Must | C |
| M8-05 | Pengingat jatuh tempo dan status terlambat | Should | C |
| M8-06 | Form peminjaman eksternal publik | Could | C |

### M9 · Arsip Surat Masuk & Keluar
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| M9-01 | Register surat: nomor, tanggal, perihal, pengirim/tujuan, sifat, pindaian | Must | B |
| M9-02 | Notifikasi otomatis ke role tertinggi saat surat masuk dicatat | Must | B |
| M9-03 | Hak akses per sifat surat (biasa/rahasia) | Must | B |
| M9-04 | Penomoran surat keluar otomatis | Should | B |
| M9-05 | Status disposisi: diterima, didisposisikan, selesai | Should | B |

### M10 · Notulensi Rapat
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| M10-01 | Editor template: agenda, peserta, keputusan, action items | Must | B |
| M10-02 | Tautan ke absensi dan proker | Should | B |
| M10-03 | Action items menjadi tugas bertenggat | Should | B |
| M10-04 | Status draft ke final, riwayat versi | Should | B |
| M10-05 | Ekspor notulensi ke PDF | Could | B |

### M11 · Aspirasi Anonim
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| M11-01 | Pengiriman 100% anonim (tanpa user ID/IP tersimpan) | Must | C |
| M11-02 | Anti-spam (Cloudflare Turnstile + hash IP harian) | Must | C |
| M11-03 | Moderasi, kategori, dan status tindak lanjut | Must | C |
| M11-04 | Balasan anonim via kode tiket acak | Should | C |
| M11-05 | Rekap tren aspirasi tahunan | Could | C |

### M12 · Penyimpanan Aset Desain
| ID | Kebutuhan | Prioritas | Fase |
| :--- | :--- | :--- | :--- |
| M12-01 | Pustaka aset: logo, guideline, template, font | Must | A |
| M12-02 | Kategori, tag, pratinjau, tombol unduh | Must | A |
| M12-03 | Aset publik otomatis tampil di landing page | Should | A |
| M12-04 | File master (PSD/AI) via tautan Drive/Figma | Should | A |

---

## 6. Keputusan Penyimpanan File

| Jenis File | Lokasi Penyimpanan | Alasan Teknis |
| :--- | :--- | :--- |
| **Bukti Nota** | Supabase Storage (Privat, signed URL) | RLS otomatis sesuai transaksi, file dikompres di client |
| **Pindaian Surat** | Supabase Storage (Privat) | Kontrol sifat surat biasa/rahasia, audit trail |
| **Aset Publik Kecil** | Supabase Storage (Publik + CDN) | Langsung dipakai landing page |
| **File Master Desain** | Link Google Drive / Figma | Menghindari over-quota storage Supabase |
| **Backup Tahunan** | ZIP ke Google Drive Organisasi | Cadangan independen di luar platform utama |

---

## 7. Kebutuhan Non-Fungsional & Keamanan
- **Keamanan:** RLS *default-deny* di setiap tabel, bucket privat, MFA opsional.
- **Privasi:** Proteksi UU PDP untuk data kontak & NIM anggota.
- **Integritas:** Kas immutable (tidak bisa dihapus, hanya void).
- **Skalabilitas:** Setiap skema memiliki kolom `organization_id` dan `period_id`.
- **Teknologi PWA:** Mobile-first, mendukung QR scanning di browser smartphone.

---

## 8. Ringkasan Tech Stack Rekomendasi
- **Framework:** Next.js (App Router) + TypeScript
- **UI:** Tailwind CSS + shadcn/ui
- **Database, Auth & Storage:** Supabase (PostgreSQL + RLS)
- **Email:** Resend
- **Anti-spam:** Cloudflare Turnstile
- **Deployment:** Vercel Pro (Alternatif: VPS + Coolify)

---

## 9. Estimasi Biaya & Jadwal Fase

| Fase | Cakupan Modul | Hari-Orang | Estimasi (@ Rp 400rb/hari) |
| :--- | :--- | :--- | :--- |
| **Fase 0** | Discovery, Audit & Finalisasi Scope | — | — |
| **Fase A** | Fondasi, Profil Publik, RBAC, M1, M12 | 47 | Rp 18.800.000 |
| **Fase B** | M2 (Absensi), M3 (Proker), M4 (Panitia), M9 (Surat), M10 (Notulensi) | 45 | Rp 18.000.000 |
| **Fase C** | M5 (Kas), M6 (Nota), M7 (Inventaris), M8 (Peminjaman), M11 (Aspirasi) | 33 | Rp 13.200.000 |
| **Total** | *(Termasuk PM 15% & Buffer 20%)* | **125** | **Rp 50.000.000** |
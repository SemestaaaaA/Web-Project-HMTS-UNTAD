<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.public')]
class ProgramIndex extends Component
{
    public string $selectedCategory = 'all';
    public ?array $activeTorModal = null;

    public array $categories = [
        'all' => 'Semua Kategori',
        'competition' => 'Kompetisi & Lomba',
        'workshop' => 'Workshop & Pelatihan',
        'community' => 'Pengabdian Masyarakat',
        'seminar' => 'Seminar Akademik',
    ];

    public array $programs = [
        [
            'id' => 1,
            'title' => 'Civil Expo & Bridge Design Competition 2026',
            'category_key' => 'competition',
            'category' => 'Kompetisi Nasional',
            'badge' => 'Pendaftaran Dibuka',
            'badge_color' => 'bg-brand-orange',
            'date' => '24 - 26 November 2026',
            'location' => 'Auditorium Untad & Aula FT',
            'quota' => '32 Tim (Sisa 8 Kuota)',
            'prize' => 'Total Hadiah Rp 30.000.000',
            'desc' => 'Kompetisi rancang bangun jembatan balsa nasional dengan kriteria pengujian lendutan maksimum dan efisiensi beban dinamis gempa.',
            'tor_details' => 'Dokumen TOR memuat ketentuan dimensi bentang 60 cm, batas lendutan 3 mm, pengujian beban vertikal 50 kg, dan batas waktu perakitan 4 jam.',
            'image' => 'https://images.unsplash.com/photo-1545558014-8692077e9b5c?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'id' => 2,
            'title' => 'Civil Workshop BIM Revit & ETABS 2026',
            'category_key' => 'workshop',
            'category' => 'Pelatihan Software',
            'badge' => 'Sisa 12 Kursi',
            'badge_color' => 'bg-amber-600',
            'date' => '12 - 14 Desember 2026',
            'location' => 'Lab Komputasi Sipil FT-UNTAD',
            'quota' => '40 Peserta',
            'prize' => 'Sertifikat Kompetensi 32 JP',
            'desc' => 'Pelatihan intensif pemodelan informasi bangunan (BIM 3D/4D) serta analisis rekayasa struktur tahan gempa berdasar SNI 1726:2019.',
            'tor_details' => 'Silabus mencakup modul Revit Structure dasar-menengah, ekspor wireframe ke ETABS 21, dan optimasi tulangan kolom-balok beton bertulang.',
            'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'id' => 3,
            'title' => 'Sipil Bangun Desa: Jembatan Gantung Sigi',
            'category_key' => 'community',
            'category' => 'Pengabdian Masyarakat',
            'badge' => 'Open Volunteer',
            'badge_color' => 'bg-emerald-600',
            'date' => '18 - 20 Januari 2027',
            'location' => 'Desa Salua, Kec. Kulawi, Kab. Sigi',
            'quota' => '25 Relawan Mahasiswa',
            'prize' => 'Aksi Nyata Keteknikan',
            'desc' => 'Pemasangan kawat sling pengaman baru dan penggantian bantalan kayu jembatan penyeberangan sungai perintis bagi akses anak sekolah.',
            'tor_details' => 'Paket kerja mencakup survei topografi sungai, pengecoran abutmen penguat, dan peremajaan lantai jembatan sepanjang 42 meter.',
            'image' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=800&q=80',
        ],
        [
            'id' => 4,
            'title' => 'Concrete Innovation Challenge 2026',
            'category_key' => 'competition',
            'category' => 'Riset & Kompetisi',
            'badge' => 'Tahap Proposal',
            'badge_color' => 'bg-sky-600',
            'date' => '05 - 08 Februari 2027',
            'location' => 'Lab Bahan & Beton FT-UNTAD',
            'quota' => '16 Tim Riset',
            'prize' => 'Hibah Riset Rp 15.000.000',
            'desc' => 'Kompetisi inovasi campuran beton mutu tinggi ramah lingkungan berbasis substitusi limbah lokal (abu ampas tebu dan pasir Palu).',
            'tor_details' => 'Pengujian kuat tekan beton 7, 14, dan 28 hari menggunakan mesin UTM dengan target kuat tekan f\'c 40 MPa.',
            'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=800&q=80',
        ],
    ];

    public function setCategory(string $category): void
    {
        $this->selectedCategory = $category;
    }

    public function openTorModal(int $programId): void
    {
        foreach ($this->programs as $prog) {
            if ($prog['id'] === $programId) {
                $this->activeTorModal = $prog;
                break;
            }
        }
    }

    public function closeTorModal(): void
    {
        $this->activeTorModal = null;
    }

    public function render()
    {
        $filteredPrograms = collect($this->programs)->filter(function ($prog) {
            if ($this->selectedCategory === 'all') {
                return true;
            }
            return $prog['category_key'] === $this->selectedCategory;
        });

        return view('livewire.public.program-index', [
            'filteredPrograms' => $filteredPrograms,
        ]);
    }
}

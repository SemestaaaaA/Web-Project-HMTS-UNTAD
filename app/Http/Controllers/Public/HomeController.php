<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request): View
    {
        $periodName = '2026/2027';

        try {
            $period = Period::current();
            if ($period) {
                $periodName = $period->name;
            }
        } catch (\Throwable $e) {
            // Fallback graceful jika database belum dikonfigurasi oleh user
        }

        // 5 Konsentrasi Keilmuan Teknik Sipil
        $fields = [
            [
                'number' => '01',
                'tag' => 'STRUKTUR',
                'title' => 'Rekayasa Struktur',
                'desc' => 'Analisis gedung tahan gempa, jembatan baja bentang panjang, dan perancangan beton bertulang.',
                'active' => false,
            ],
            [
                'number' => '02',
                'tag' => 'GEOTEKNIK',
                'title' => 'Geoteknik & Tanah',
                'desc' => 'Mekanika tanah, daya dukung pondasi dalam, dan riset mitigasi likuefaksi wilayah Palu.',
                'active' => true, // Sorotan prioritas kuning
            ],
            [
                'number' => '03',
                'tag' => 'MANAJEMEN',
                'title' => 'Manajemen Konstruksi',
                'desc' => 'Estimasi biaya RAB, penjadwalan kurva S, Building Information Modeling (BIM), dan standar K3.',
                'active' => false,
            ],
            [
                'number' => '04',
                'tag' => 'HIDRO',
                'title' => 'Sumber Daya Air',
                'desc' => 'Pengendalian banjir DAS Palu, rekayasa bendungan, dan perancangan sistem drainase perkotaan.',
                'active' => false,
            ],
            [
                'number' => '05',
                'tag' => 'TRANSPORT',
                'title' => 'Rekayasa Transportasi',
                'desc' => 'Geometrik jalan raya, perkerasan aspal, analisis simpang, dan manajemen lalu lintas regional.',
                'active' => false,
            ],
        ];

        // 3 Program Kerja Pilihan
        $featuredPrograms = [
            [
                'title' => 'Civil Expo & Bridge Design 2026',
                'date' => '24 - 26 November 2026',
                'badge' => 'Pendaftaran Dibuka',
                'category' => 'Kompetisi Nasional',
                'desc' => 'Lomba perancangan model jembatan rangka balsa skala nasional dengan kriteria efisiensi dan kapasitas beban gempa.',
                'image' => 'https://images.unsplash.com/photo-1545558014-8692077e9b5c?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Workshop BIM Revit & ETABS 2026',
                'date' => '12 - 14 Desember 2026',
                'badge' => 'Sisa 12 Kursi',
                'category' => 'Pelatihan Software',
                'desc' => 'Pelatihan intensif pemodelan 3D arsitektural dan analisis respons spektrum gempa SNI 1726 berbasis teknologi Building Information Modeling.',
                'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'title' => 'Sipil Bangun Desa: Jembatan Gantung',
                'date' => '18 - 20 Januari 2027',
                'badge' => 'Open Volunteer',
                'category' => 'Pengabdian Masyarakat',
                'desc' => 'Aksi bakti sosial peremajaan lantai kayu dan penggantian sling pengaman jembatan perintis penyeberangan anak sekolah di Sigi.',
                'image' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=600&q=80',
            ],
        ];

        return view('public.home', compact('periodName', 'fields', 'featuredPrograms'));
    }
}

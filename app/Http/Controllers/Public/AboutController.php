<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Member;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request): View
    {
        $periodName = '2026/2027';
        $ketua = null;
        $bphList = [];
        $divisions = [];

        try {
            $period = Period::current();
            if ($period) {
                $periodName = $period->name;
            }

            $ketua = Member::where('role_type', 'ketua')->first();
            $bphList = Member::where('role_type', 'bph')->orderBy('sort_order')->get();
            $divisions = Division::with('members')->orderBy('sort_order')->get();
        } catch (\Throwable $e) {
            // Fallback graceful jika database belum dikonfigurasi
        }

        // Fallback data jika database belum di-seed
        if (!$ketua) {
            $ketua = (object)[
                'name' => 'M. Rayhan Pratama',
                'nim' => 'F11122045',
                'batch' => "'22",
                'position' => 'Ketua',
                'bio' => 'Penanggung jawab umum arah kebijakan & kepemimpinan organisasi',
            ];
        }

        if (empty($bphList) || count($bphList) === 0) {
            $bphList = collect([
                (object)[
                    'name' => 'Dimas Arya Nugraha',
                    'nim' => 'F11122087',
                    'batch' => "'22",
                    'position' => 'Ketua 1',
                    'bio' => 'Koordinator bidang internal keorganisasian & sinkronisasi divisi.',
                ],
                (object)[
                    'name' => 'Fadel Muhammad',
                    'nim' => 'F11122103',
                    'batch' => "'22",
                    'position' => 'Ketua 2',
                    'bio' => 'Koordinator bidang eksternal, kemitraan lembaga, & keprofesian.',
                ],
                (object)[
                    'name' => 'Amanda Putri Lestari',
                    'nim' => 'F11123014',
                    'batch' => "'23",
                    'position' => 'Sekretaris Umum',
                    'bio' => 'Tata kelola persuratan, inventaris arsip, & administrasi kesekretariatan.',
                ],
                (object)[
                    'name' => 'Siti Nurhaliza',
                    'nim' => 'F11123059',
                    'batch' => "'23",
                    'position' => 'Bendahara Umum',
                    'bio' => 'Manajemen perbendaharaan kas, transparansi anggaran, & laporan keuangan.',
                ],
            ]);
        }

        if (empty($divisions) || count($divisions) === 0) {
            $divisions = collect([
                (object)[
                    'code' => 'DIVISI 01',
                    'name' => 'Ristek',
                    'full_name' => 'Riset & Teknologi',
                    'description' => 'Inovasi rekayasa konstruksi, material beton, dan teknologi rekayasa sipil.',
                ],
                (object)[
                    'code' => 'DIVISI 02',
                    'name' => 'Infokom',
                    'full_name' => 'Informasi & Komunikasi',
                    'description' => 'Pengelolaan media resmi, publikasi digital, dan dokumentasi visual.',
                ],
                (object)[
                    'code' => 'DIVISI 03',
                    'name' => 'Penalaran',
                    'full_name' => 'Penalaran Ilmiah & Prestasi',
                    'description' => 'Pendampingan lomba jembatan (KJI/KBGI), bimbingan akademik, & tutor sebaya.',
                ],
                (object)[
                    'code' => 'DIVISI 04',
                    'name' => 'FKMTSI',
                    'full_name' => 'Forum Komunikasi Mahasiswa Teknik Sipil Indonesia',
                    'description' => 'Hubungan koordinasi FKMTSI Wilayah VIII dan temu wicara nasional.',
                ],
                (object)[
                    'code' => 'DIVISI 05',
                    'name' => 'Hublua',
                    'full_name' => 'Hubungan Luar & Alumni',
                    'description' => 'Sinergi dengan instansi PUPR, BUMN Karya, LPJK, dan jejaring alumni.',
                ],
                (object)[
                    'code' => 'DIVISI 06',
                    'name' => 'Bursa',
                    'full_name' => 'Kewirausahaan Sipil',
                    'description' => 'Pengadaan merchandise resmi, atribut keteknikan, dan kemandirian dana.',
                ],
                (object)[
                    'code' => 'DIVISI 07',
                    'name' => 'Advokasi',
                    'full_name' => 'Advokasi & Kesejahteraan Mahasiswa',
                    'description' => 'Penjaringan aspirasi civitas, advokasi sarana lab, dan perlindungan hak mahasiswa.',
                ],
                (object)[
                    'code' => 'DIVISI 08',
                    'name' => 'Kaderisasi',
                    'full_name' => 'Pengembangan Sumber Daya Mahasiswa',
                    'description' => 'Pembinaan karakter moral calon insinyur, pelatihan kepemimpinan, & jiwa korsa.',
                ],
            ]);
        }

        return view('public.about', compact('periodName', 'ketua', 'bphList', 'divisions'));
    }
}

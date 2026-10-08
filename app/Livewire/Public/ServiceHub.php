<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Layout('layouts.public')]
class ServiceHub extends Component
{
    #[Url(as: 'tab')]
    public string $activeTab = 'borrow'; // 'borrow', 'qr', 'aspiration', 'assets'

    // Form Peminjaman Alat
    public string $borrowTool = 'Total Station Sokkia CX-105';
    public string $borrowName = '';
    public string $borrowNim = '';
    public string $borrowStartDate = '';
    public string $borrowEndDate = '';
    public string $borrowPurpose = '';
    public bool $borrowSuccess = false;

    // Presensi QR
    public string $qrToken = '';
    public string $qrNim = '';
    public string $qrAttendanceStatus = '';

    // Aspirasi
    public string $aspirationCategory = 'Fasilitas & Lab';
    public string $aspirationMessage = '';
    public string $aspirationTrackingCode = '';
    public bool $aspirationSubmitted = false;
    public string $trackTicketInput = '';
    public ?array $trackTicketResult = null;

    // Katalog Alat
    public array $tools = [
        [
            'name' => 'Total Station Sokkia CX-105',
            'category' => 'Instrumen Survei Digital',
            'stock' => 3,
            'specs' => 'Akurasi 5 detik, EDM reflectorless 500m, laser dual-axis.',
            'status' => 'Tersedia',
            'image' => 'https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=400&q=80',
        ],
        [
            'name' => 'Theodolite Digital Topcon DT-200',
            'category' => 'Pengukuran Sudut & Poligon',
            'stock' => 5,
            'specs' => 'Pembacaan optik digital resolusi tinggi, tahan debu IP66.',
            'status' => 'Tersedia',
            'image' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=400&q=80',
        ],
        [
            'name' => 'Waterpass Otomatis Nikon AC-2S',
            'category' => 'Pengukuran Beda Tinggi / Sipat Datar',
            'stock' => 6,
            'specs' => 'Perbesaran lensa 24x, kompensator otomatis redaman magnetik.',
            'status' => 'Tersedia',
            'image' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=400&q=80',
        ],
        [
            'name' => 'Concrete Hammer Test Schmidt',
            'category' => 'Uji Non-Destruktif Kuat Tekan Beton',
            'stock' => 2,
            'specs' => 'Tipe N rentang 10 - 70 N/mm2, kurva konversi SNI terkalibrasi.',
            'status' => 'Tersedia',
            'image' => 'https://images.unsplash.com/photo-1541888946425-d0fbb186c5f7?auto=format&fit=crop&w=400&q=80',
        ],
    ];

    public function setTab(string $tab): void
    {
        $this->activeTab = $tab;
    }

    public function submitBorrowForm(): void
    {
        $this->validate([
            'borrowName' => 'required|min:3',
            'borrowNim' => 'required|min:5',
            'borrowStartDate' => 'required',
            'borrowEndDate' => 'required',
            'borrowPurpose' => 'required|min:5',
        ]);

        $this->borrowSuccess = true;
    }

    public function resetBorrowForm(): void
    {
        $this->borrowSuccess = false;
        $this->borrowName = '';
        $this->borrowNim = '';
        $this->borrowStartDate = '';
        $this->borrowEndDate = '';
        $this->borrowPurpose = '';
    }

    public function submitAttendance(): void
    {
        $this->validate([
            'qrToken' => 'required|min:4',
            'qrNim' => 'required|min:5',
        ]);

        $this->qrAttendanceStatus = 'success';
    }

    public function submitAspiration(): void
    {
        $this->validate([
            'aspirationMessage' => 'required|min:10',
        ]);

        // Generate nomor tiket anonim
        $this->aspirationTrackingCode = 'ASP-' . date('Y') . '-' . strtoupper(substr(md5(uniqid()), 0, 5));
        $this->aspirationSubmitted = true;
        $this->aspirationMessage = '';
    }

    public function searchTicket(): void
    {
        $code = trim(strtoupper($this->trackTicketInput));

        if (empty($code)) {
            $this->trackTicketResult = null;
            return;
        }

        if (str_starts_with($code, 'ASP-')) {
            $this->trackTicketResult = [
                'code' => $code,
                'status' => 'Sedang Ditindaklanjuti',
                'category' => 'Fasilitas & Lab',
                'date' => date('d M Y'),
                'response' => 'Aspirasi Anda telah diagendakan dalam audiensi bersama Ketua Program Studi dan Pengelola Lab Struktur.',
            ];
        } else {
            $this->trackTicketResult = [
                'code' => $code,
                'status' => 'Tidak Ditemukan',
                'response' => 'Format kode tidak valid atau belum terdaftar. Pastikan diawali dengan ASP-2026-XXXX.',
            ];
        }
    }

    public function render()
    {
        return view('livewire.public.service-hub');
    }
}

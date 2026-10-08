<footer class="bg-black/90 py-12 px-4 sm:px-6 lg:px-8 border-t border-white/10 mt-16 relative z-10">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6 font-mono text-xs text-zinc-500">

        <!-- Logo & Identitas Organisasi -->
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/hmts.png') }}" alt="Logo HMTS FT-UNTAD" class="w-8 h-8 object-contain">
            <div>
                <span class="text-white font-semibold">HMTS FT-UNTAD</span> — Periode 2026/2027
                <div class="text-[11px] text-zinc-500">Jurusan Teknik Sipil, Fakultas Teknik Universitas Tadulako</div>
            </div>
        </div>

        <!-- Tautan Navigasi -->
        <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-6">
            <a href="{{ route('home') }}" class="hover:text-brand-yellow transition-colors">Beranda</a>
            <a href="{{ route('about') }}" class="hover:text-brand-yellow transition-colors">Tentang Kami</a>
            <a href="{{ route('programs.index') }}" class="hover:text-brand-yellow transition-colors">Kegiatan</a>
            <a href="{{ route('services.hub') }}" class="hover:text-brand-yellow transition-colors">Layanan Mahasiswa</a>
        </div>

        <!-- Hak Cipta -->
        <div class="text-[11px] text-zinc-500 text-center md:text-right">
            © {{ date('Y') }} HMTS FT-UNTAD. Kokoh, Inovatif, Membangun Peradaban. <span class="text-brand-yellow font-bold">#WeAreTheChampions</span>
        </div>

    </div>
</footer>

<div>
    <!-- HEADER KEGIATAN -->
    <section class="pt-10 pb-12 px-4 sm:px-6 lg:px-8 border-b border-white/10">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 text-xs font-mono text-zinc-300 mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-brand-yellow"></span>
                    <span>Kalender Proker</span>
                </div>
                <h1 class="font-display font-black text-3xl sm:text-5xl text-white uppercase tracking-tight mb-2">
                    Agenda & <span class="text-brand-yellow">Program Kerja</span>
                </h1>
                <p class="text-zinc-300 text-sm max-w-xl font-sans">
                    Rekapitulasi kegiatan ilmiah, pelatihan software rekayasa, kompetisi nasional, dan aksi bakti masyarakat sipil.
                </p>
            </div>

            <!-- Metrik Kalender -->
            <div class="flex items-center gap-3 font-mono text-xs">
                <div class="px-4 py-2.5 rounded-2xl bg-[#121217] border border-white/10 text-center">
                    <span class="text-white font-bold block text-base">28</span>
                    <span class="text-zinc-500 text-[10px]">Agenda Tahun Ini</span>
                </div>
                <div class="px-4 py-2.5 rounded-2xl bg-[#121217] border border-white/10 text-center">
                    <span class="text-brand-yellow font-bold block text-base">4</span>
                    <span class="text-zinc-500 text-[10px]">Pendaftaran Terbuka</span>
                </div>
            </div>
        </div>
    </section>

    <!-- FILTER KATEGORI -->
    <section class="py-6 px-4 sm:px-6 lg:px-8 border-b border-white/5 bg-[#0D0D12]/70 backdrop-blur-sm sticky top-[72px] z-30">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center gap-2">
            @foreach ($categories as $key => $label)
                <button type="button" 
                        wire:click="setCategory('{{ $key }}')" 
                        class="px-4 py-2 rounded-full text-xs font-mono transition-all cursor-pointer {{ $selectedCategory === $key ? 'bg-brand-orange text-white font-bold shadow-md shadow-brand-orange/20' : 'bg-white/5 text-zinc-300 hover:text-white hover:bg-white/10 border border-white/5' }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </section>

    <!-- GRID PROGRAM KERJA -->
    <section class="py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @forelse ($filteredPrograms as $program)
                    <div class="clean-card overflow-hidden flex flex-col group border border-white/10 hover:border-brand-yellow/40 transition-all">
                        <!-- Gambar Proker -->
                        <div class="h-60 relative overflow-hidden bg-zinc-900">
                            <img src="{{ $program['image'] }}" 
                                 alt="{{ $program['title'] }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#121217] via-transparent to-transparent"></div>
                            <span class="absolute top-4 left-4 px-3.5 py-1 rounded-full text-white text-[11px] font-mono font-bold uppercase shadow-lg {{ $program['badge_color'] }}">
                                {{ $program['badge'] }}
                            </span>
                            <span class="absolute top-4 right-4 px-3 py-1 rounded-full bg-black/70 backdrop-blur-sm border border-white/10 text-brand-yellow text-[11px] font-mono">
                                {{ $program['category'] }}
                            </span>
                        </div>

                        <!-- Konten Detail -->
                        <div class="p-6 sm:p-8 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="font-display font-bold text-xl text-white mb-3">{{ $program['title'] }}</h3>
                                <p class="text-xs sm:text-sm text-zinc-300 leading-relaxed mb-6 font-sans">
                                    {{ $program['desc'] }}
                                </p>

                                <!-- Meta Info Teknis -->
                                <div class="grid grid-cols-2 gap-3 p-4 rounded-2xl bg-black/40 border border-white/5 font-mono text-xs mb-6">
                                    <div>
                                        <span class="text-zinc-500 block text-[10px] uppercase">Waktu Pelaksanaan</span>
                                        <span class="text-white font-semibold">{{ $program['date'] }}</span>
                                    </div>
                                    <div>
                                        <span class="text-zinc-500 block text-[10px] uppercase">Lokasi Acara</span>
                                        <span class="text-white">{{ $program['location'] }}</span>
                                    </div>
                                    <div class="pt-2 border-t border-white/5">
                                        <span class="text-zinc-500 block text-[10px] uppercase">Kapasitas / Kuota</span>
                                        <span class="text-brand-yellow">{{ $program['quota'] }}</span>
                                    </div>
                                    <div class="pt-2 border-t border-white/5">
                                        <span class="text-zinc-500 block text-[10px] uppercase">Hadiah / Output</span>
                                        <span class="text-white">{{ $program['prize'] }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="pt-4 border-t border-white/10 flex flex-wrap items-center justify-between gap-3">
                                <button type="button" 
                                        wire:click="openTorModal({{ $program['id'] }})"
                                        class="px-4 py-2.5 rounded-full bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-mono text-zinc-300 hover:text-white transition-all flex items-center gap-1.5 cursor-pointer">
                                    <span>Lihat TOR Kegiatan</span>
                                    <span class="text-brand-yellow">↗</span>
                                </button>

                                <a href="{{ route('services.hub') }}?tab=borrow" 
                                   class="inline-flex items-center gap-2 bg-brand-orange hover:bg-brand-orangeHover text-white px-5 py-2.5 rounded-full font-mono text-xs font-bold uppercase shadow-md shadow-brand-orange/20 transition-all">
                                    <span>Daftar / Registrasi</span>
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 clean-card p-12 text-center text-zinc-400 font-mono text-sm">
                        Tidak ada program kerja untuk kategori terpilih saat ini.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- MODAL TOR DETAIL -->
    @if ($activeTorModal)
        <div class="fixed inset-0 z-50 bg-black/80 backdrop-blur-md flex items-center justify-center p-4">
            <div class="clean-card max-w-lg w-full p-6 sm:p-8 relative border-2 border-brand-yellow shadow-2xl bg-[#121217]">
                <button type="button" 
                        wire:click="closeTorModal" 
                        class="absolute top-4 right-4 text-zinc-400 hover:text-white font-mono text-sm border border-white/20 w-8 h-8 rounded-full flex items-center justify-center cursor-pointer">
                    ✕
                </button>

                <div class="pb-3 mb-5 border-b border-white/10">
                    <span class="font-mono text-xs text-brand-yellow font-semibold uppercase block mb-1">Term of Reference (TOR)</span>
                    <h3 class="font-display font-bold text-xl text-white">{{ $activeTorModal['title'] }}</h3>
                    <p class="font-mono text-xs text-zinc-400 mt-1">{{ $activeTorModal['category'] }} · {{ $activeTorModal['date'] }}</p>
                </div>

                <div class="space-y-4 font-mono text-xs text-zinc-300">
                    <div class="p-4 rounded-xl bg-black/50 border border-white/5">
                        <span class="text-brand-yellow font-bold block mb-1">Ketentuan & Lingkup Teknis</span>
                        <p class="font-sans text-xs text-zinc-300 leading-relaxed">{{ $activeTorModal['tor_details'] }}</p>
                    </div>

                    <div class="p-4 rounded-xl bg-black/50 border border-white/5 flex items-center justify-between">
                        <div>
                            <span class="text-zinc-500 block text-[10px]">Hadiah & Sertifikat</span>
                            <span class="text-white font-semibold">{{ $activeTorModal['prize'] }}</span>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-[10px]">
                            Dokumen Resmi
                        </span>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-white/10 flex justify-end gap-3 font-mono text-xs">
                    <button type="button" 
                            wire:click="closeTorModal" 
                            class="px-5 py-2.5 rounded-full border border-white/20 text-white cursor-pointer hover:bg-white/5">
                        Tutup
                    </button>
                    <a href="{{ route('services.hub') }}?tab=assets" 
                       class="inline-flex items-center gap-2 bg-brand-orange hover:bg-brand-orangeHover text-white px-5 py-2.5 rounded-full font-bold uppercase shadow-lg shadow-brand-orange/20">
                        <span>Unduh TOR Lengkap (PDF)</span>
                        <span>↓</span>
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

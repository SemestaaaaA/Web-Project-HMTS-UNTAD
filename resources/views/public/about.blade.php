<x-layouts.public title="Tentang Kami | HMTS FT-UNTAD">

    <!-- HEADER / HERO SECTION TENTANG KAMI -->
    <section class="pt-10 pb-12 px-4 sm:px-6 lg:px-8 border-b border-white/10">
        <div class="max-w-7xl mx-auto">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 text-xs font-mono text-zinc-300 mb-4">
                <span class="w-1.5 h-1.5 rounded-full bg-brand-yellow"></span>
                <span>Profil Organisasi</span>
            </div>
            <h1 class="font-display font-black text-3xl sm:text-5xl text-white uppercase tracking-tight mb-3">
                Sejarah, Visi Misi, & <span class="text-brand-yellow">Struktur Pengurus</span>
            </h1>
            <p class="text-zinc-300 text-sm sm:text-base max-w-2xl leading-relaxed font-sans">
                Mengenal tonggak sejarah, prinsip nilai perjuangan, dan susunan kepengurusan HMTS FT-UNTAD Periode {{ $periodName }}.
            </p>
        </div>
    </section>

    <!-- 1. SEJARAH & MAKNA LAMBANG -->
    <section class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <!-- Sejarah Singkat -->
            <div class="lg:col-span-7 clean-card p-6 sm:p-8">
                <span class="text-brand-yellow font-mono text-xs font-semibold uppercase block mb-2">Lintas Sejarah</span>
                <h3 class="font-display font-bold text-xl text-white uppercase mb-4">Sejarah Singkat HMTS FT-UNTAD</h3>
                <div class="space-y-4 text-xs sm:text-sm text-zinc-300 leading-relaxed font-sans">
                    <p>
                        Himpunan Mahasiswa Teknik Sipil Fakultas Teknik Universitas Tadulako didirikan seiring dengan berdirinya Program Studi Teknik Sipil pada tahun 1994 di Kampus Bumi Tadulako, Kota Palu, Sulawesi Tengah.
                    </p>
                    <p>
                        Sebagai lembaga kemahasiswaan tertua dan terbesar di Fakultas Teknik, HMTS hadir sebagai wadah penalaran ilmiah keinsinyuran, pengkaderan karakter berintegritas, serta pelopor pengabdian masyarakat saat mitigasi kebencanaan pasca-gempa dan likuefaksi Palu 2018.
                    </p>
                    <p>
                        Dengan semboyan <strong class="text-white">"Kokoh, Inovatif, Membangun Peradaban"</strong>, HMTS kini menaungi lebih dari 640 mahasiswa aktif serta ribuan alumni yang berkarya di instansi pemerintah, BUMN Konstruksi, dan konsultan perencana nasional.
                    </p>
                </div>
            </div>

            <!-- Makna Lambang Resmi -->
            <div class="lg:col-span-5 clean-card p-6 sm:p-8">
                <div class="flex items-center gap-4 mb-5 pb-4 border-b border-white/10">
                    <img src="{{ asset('images/hmts.png') }}" alt="Logo Resmi HMTS FT-UNTAD" class="w-16 h-16 object-contain drop-shadow-md">
                    <div>
                        <span class="text-brand-yellow font-mono text-xs font-semibold uppercase block">Identitas Visual</span>
                        <h3 class="font-display font-bold text-lg text-white uppercase">Makna Lambang HMTS</h3>
                    </div>
                </div>
                <div class="space-y-3 font-mono text-xs text-zinc-300">
                    <div class="p-3.5 rounded-xl bg-black/40 border border-white/5">
                        <span class="text-brand-yellow font-bold block mb-1">Rangka Segitiga Truss</span>
                        <p class="font-sans text-xs text-zinc-400">Simbol kekokohan struktur terstabil dalam ilmu mekanika teknik sipil.</p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-black/40 border border-white/5">
                        <span class="text-brand-yellow font-bold block mb-1">Kuning Helm Keselamatan</span>
                        <p class="font-sans text-xs text-zinc-400">Mencerminkan etos kerja lapangan dan kewaspadaan standar K3 konstruksi.</p>
                    </div>
                    <div class="p-3.5 rounded-xl bg-black/40 border border-white/5">
                        <span class="text-brand-yellow font-bold block mb-1">Hitam Obsidian Kanvas</span>
                        <p class="font-sans text-xs text-zinc-400">Fondasi keteguhan integritas insinyur yang tak tergoyahkan.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- 2. VISI & MISI STRATEGIS -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-white/5 bg-[#0D0D12]/70 backdrop-blur-sm relative z-10">
        <div class="max-w-7xl mx-auto">
            <div class="pb-4 mb-8 border-b border-white/10">
                <span class="text-brand-yellow font-mono text-xs font-semibold uppercase block mb-1">Arah Gerak Organisasi</span>
                <h2 class="font-display font-black text-2xl sm:text-3xl text-white uppercase">Visi & 3 Pilar Misi</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                <!-- Visi Box -->
                <div class="lg:col-span-5 rounded-3xl bg-brand-yellow text-black p-8 flex flex-col justify-between shadow-xl">
                    <div>
                        <div class="font-mono text-xs font-bold pb-3 mb-4 border-b border-black/20 flex justify-between">
                            <span>VISI STRATEGIS</span>
                            <span>{{ $periodName }}</span>
                        </div>
                        <p class="font-display font-bold text-lg sm:text-xl leading-snug uppercase">
                            Menjadi wadah pembinaan mahasiswa Teknik Sipil yang berintegritas tinggi, unggul dalam riset infrastruktur tahan gempa, adaptif terhadap kemajuan teknologi BIM, dan berkontribusi nyata bagi masyarakat.
                        </p>
                    </div>
                    <div class="pt-6 border-t border-black/20 font-mono text-xs font-bold">
                        HMTS FT-UNTAD · Periode {{ $periodName }}
                    </div>
                </div>

                <!-- 3 Pilar Misi -->
                <div class="lg:col-span-7 space-y-4">
                    <div class="clean-card p-6 border-l-4 border-l-brand-yellow">
                        <span class="font-mono text-brand-yellow font-semibold text-xs block mb-1">01 / Penalaran & Keilmuan</span>
                        <h4 class="font-display font-bold text-base text-white uppercase mb-1">Kapasitas Ilmiah & Keteknikan</h4>
                        <p class="text-xs text-zinc-300 leading-relaxed font-sans">Penyelenggaraan pelatihan software rekayasa teknik (BIM Revit, ETABS, SAP2000), pembinaan kompetisi jembatan nasional, dan pendampingan riset mahasiswa.</p>
                    </div>
                    <div class="clean-card p-6 border-l-4 border-l-brand-yellow">
                        <span class="font-mono text-brand-yellow font-semibold text-xs block mb-1">02 / Kaderisasi & Karakter</span>
                        <h4 class="font-display font-bold text-base text-white uppercase mb-1">Kepemimpinan & Etika Profesi</h4>
                        <p class="text-xs text-zinc-300 leading-relaxed font-sans">Membangun budaya organisasi yang menjunjung tinggi etika insinyur, solidaritas korsa, dan hubungan kekeluargaan lintas angkatan.</p>
                    </div>
                    <div class="clean-card p-6 border-l-4 border-l-brand-yellow">
                        <span class="font-mono text-brand-yellow font-semibold text-xs block mb-1">03 / Pengabdian Masyarakat</span>
                        <h4 class="font-display font-bold text-base text-white uppercase mb-1">Aksi Rekayasa Tepat Guna</h4>
                        <p class="text-xs text-zinc-300 leading-relaxed font-sans">Menerapkan perhitungan teknis dalam perbaikan sarana jembatan perintis desa, sistem sanitasi lingkungan, dan sosialisasi bangunan aman gempa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. MARS HMTS FT-UNTAD -->
    <section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-white/5">
        <div class="max-w-4xl mx-auto clean-card p-8 sm:p-10 text-center">
            <span class="text-brand-yellow font-mono text-xs font-semibold uppercase block mb-1">Lagu Perjuangan Organisasi</span>
            <h2 class="font-display font-bold text-2xl text-white uppercase mb-6">Mars HMTS FT-UNTAD</h2>

            <div class="space-y-4 text-center text-sm sm:text-base text-zinc-300 leading-relaxed italic max-w-2xl mx-auto font-sans">
                <p>
                    "Di bumi Tadulako kita bersatu padu,<br>
                    Mengemban panji almamater tercinta.<br>
                    Himpunan Mahasiswa Teknik Sipil berdiri kokoh,<br>
                    Menempa nalar ciptakan karya peradaban."
                </p>
                <div class="w-12 h-px bg-white/20 mx-auto"></div>
                <p>
                    "Baja dan beton menyatu dalam jiwa,<br>
                    Ketelitian dan integritas panduan nyata.<br>
                    Bakti kami persembahkan untuk nusa bangsa,<br>
                    Keluarga abadi, jaya HMTS selamanya!"
                </p>
            </div>

            <div class="mt-8 pt-6 border-t border-white/10 flex flex-wrap items-center justify-between gap-4 font-mono text-xs">
                <span class="text-zinc-500">Pencipta: Keluarga Besar HMTS FT-UNTAD</span>
                <button type="button" 
                        onclick="alert('Audio Mars HMTS sedang disiapkan oleh Divisi Infokom.');" 
                        class="inline-flex items-center gap-2 bg-brand-orange text-white px-5 py-2 rounded-full font-semibold uppercase hover:bg-brand-orangeHover shadow-md cursor-pointer">
                    <span>▶ Putar Audio Mars</span>
                </button>
            </div>
        </div>
    </section>

    <!-- 4. STRUKTUR KEPENGURUSAN (BAGAN BERTINGKAT / 3-TIER TREE LAYOUT) -->
    <section class="py-16 sm:py-20 px-4 sm:px-6 lg:px-8 border-t border-white/5 bg-[#0D0D12]/70 backdrop-blur-sm relative z-10">
        <div class="max-w-7xl mx-auto">

            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-brand-yellow font-mono text-xs font-semibold uppercase block mb-1">Bagan Struktur Organisasi</span>
                <h2 class="font-display font-black text-2xl sm:text-3xl text-white uppercase">Kepengurusan HMTS FT-UNTAD</h2>
                <p class="text-xs font-mono text-zinc-400 mt-2">Periode {{ $periodName }} · Dewan Pimpinan Harian & 8 Divisi Pelaksana</p>
            </div>

            <!-- TINGKAT 1: KETUA (Puncak Bagan) -->
            <div class="flex flex-col items-center mb-6">
                <div class="clean-card max-w-sm w-full p-6 text-center border-brand-yellow/60 relative shadow-xl shadow-brand-yellow/5">
                    <span class="font-mono text-xs text-brand-yellow font-bold uppercase block mb-1">01. KETUA</span>
                    <h4 class="font-display font-bold text-lg text-white">{{ $ketua->name }}</h4>
                    <div class="font-mono text-xs text-zinc-400 mt-1">NIM: {{ $ketua->nim }} · Angkatan {{ $ketua->batch }}</div>
                    <div class="mt-3 pt-3 border-t border-white/10 text-xs text-zinc-400 font-sans">
                        {{ $ketua->bio }}
                    </div>
                </div>
                <!-- Batang Vertikal Penghubung Tingkat 1 ke Tingkat 2 -->
                <div class="w-0.5 h-8 bg-brand-yellow/50"></div>
            </div>

            <!-- TINGKAT 2: 4 PIMPINAN HARIAN (Ketua 1, Ketua 2, Sekum, Bendum) -->
            <div class="relative mb-8">
                <!-- Garis Horizontal Penghubung Cabang Tingkat 2 (Desktop) -->
                <div class="hidden lg:block absolute top-0 left-[12.5%] right-[12.5%] h-0.5 bg-white/20"></div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 pt-4">
                    @foreach ($bphList as $index => $bph)
                        <div class="clean-card p-5 relative flex flex-col justify-between">
                            <!-- Stem Vertikal Menghubungkan ke Garis Horizontal -->
                            <div class="hidden lg:block absolute -top-4 left-1/2 -translate-x-1/2 w-0.5 h-4 bg-white/20"></div>
                            <div>
                                <span class="font-mono text-xs text-brand-yellow font-bold uppercase block mb-1">
                                    0{{ $index + 2 }}. {{ strtoupper($bph->position) }}
                                </span>
                                <h4 class="font-display font-bold text-base text-white">{{ $bph->name }}</h4>
                                <div class="font-mono text-xs text-zinc-400 mt-0.5">NIM: {{ $bph->nim }} · Angkatan {{ $bph->batch }}</div>
                                <p class="text-xs text-zinc-400 mt-2.5 leading-relaxed font-sans">{{ $bph->bio }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Batang Penghubung ke 8 Divisi Pelaksana -->
            <div class="flex flex-col items-center my-6">
                <div class="w-0.5 h-8 bg-white/20"></div>
                <div class="px-4 py-1 rounded-full bg-white/5 border border-white/10 text-xs font-mono text-brand-yellow font-semibold tracking-wider">
                    8 DIVISI PELAKSANA
                </div>
                <div class="w-0.5 h-8 bg-white/20"></div>
            </div>

            <!-- TINGKAT 3: 8 DIVISI PELAKSANA -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($divisions as $division)
                    <div class="clean-card p-5 flex flex-col justify-between">
                        <div>
                            <span class="font-mono text-xs text-brand-yellow font-semibold block mb-1">{{ $division->code }}</span>
                            <h4 class="font-display font-bold text-base text-white mb-1">{{ $division->name }}</h4>
                            <p class="text-xs text-zinc-400 leading-relaxed font-sans">{{ $division->description }}</p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-white/5 font-mono text-[11px] text-zinc-400 flex items-center justify-between">
                            <span>Koordinator & Staf</span>
                            <span class="text-brand-orange">Aktif</span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

</x-layouts.public>

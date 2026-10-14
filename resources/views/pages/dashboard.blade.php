@extends('layouts.app')

@section('title', 'Smart Farm Dashboard - AgriLens')

@section('content')
<main class="container mx-auto px-6 py-10 max-w-7xl">

    <!-- 1. Header Banner & Status Dashboard -->
    <div class="relative bg-gradient-to-r from-emerald-950/80 via-slate-900/90 to-green-950/80 border border-emerald-500/30 rounded-3xl p-8 md:p-12 mb-10 shadow-2xl backdrop-blur-xl overflow-hidden">
        <div class="absolute -right-10 -bottom-10 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <div class="inline-flex items-center gap-2 bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    Sistem Aktif • Akses Terbuka
                </div>
                <h1 class="text-3xl md:text-5xl font-black text-white tracking-tight">
                    AgriLens <span class="text-emerald-400">Farm Dashboard</span>
                </h1>
                <p class="text-gray-300 text-sm md:text-base mt-2 max-w-2xl leading-relaxed">
                    Pusat kendali ekosistem pertanian cerdas. Akses langsung seluruh modul budidaya, riset berita, analitik AI, dan pemantauan sensor tanpa perlu sesi login.
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('lens.ai') }}" 
                   class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black px-6 py-3.5 rounded-2xl transition-all shadow-lg shadow-emerald-500/20 flex items-center gap-2 text-sm active:scale-95">
                    <span>🔬</span> Deteksi AI Lens
                </a>
                <a href="{{ route('module.index') }}" 
                   class="bg-white/10 hover:bg-white/20 text-white font-bold px-6 py-3.5 rounded-2xl transition-all border border-white/10 text-sm active:scale-95">
                    Katalog Modul
                </a>
            </div>
        </div>
    </div>

    <!-- 2. Statistik Metrik Utama -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <!-- Card 1: Total Modul -->
        <div class="bg-black/40 backdrop-blur-xl border border-emerald-500/30 rounded-3xl p-6 shadow-xl relative group hover:border-emerald-400 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <span class="text-3xl p-3 bg-emerald-500/10 rounded-2xl border border-emerald-500/20">🌱</span>
                <span class="text-xs font-bold text-emerald-400 bg-emerald-500/10 px-2.5 py-1 rounded-full">Database</span>
            </div>
            <h3 class="text-gray-400 text-xs font-bold uppercase tracking-wider">Modul Edukasi</h3>
            <p class="text-4xl font-extrabold text-white mt-1">{{ $totalModul }}</p>
            <p class="text-xs text-gray-400 mt-2 flex items-center gap-1">
                <span class="text-emerald-400">✓</span> Panduan budidaya & pupuk
            </p>
        </div>

        <!-- Card 2: Total Kategori -->
        <div class="bg-black/40 backdrop-blur-xl border border-blue-500/30 rounded-3xl p-6 shadow-xl relative group hover:border-blue-400 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <span class="text-3xl p-3 bg-blue-500/10 rounded-2xl border border-blue-500/20">🏷️</span>
                <span class="text-xs font-bold text-blue-400 bg-blue-500/10 px-2.5 py-1 rounded-full">Kategori</span>
            </div>
            <h3 class="text-gray-400 text-xs font-bold uppercase tracking-wider">Klaster Pertanian</h3>
            <p class="text-4xl font-extrabold text-white mt-1">{{ $totalKategori }}</p>
            <p class="text-xs text-gray-400 mt-2 flex items-center gap-1">
                <span class="text-blue-400">✓</span> Klasifikasi tanaman & nutrisi
            </p>
        </div>

        <!-- Card 3: Berita & Riset -->
        <div class="bg-black/40 backdrop-blur-xl border border-amber-500/30 rounded-3xl p-6 shadow-xl relative group hover:border-amber-400 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <span class="text-3xl p-3 bg-amber-500/10 rounded-2xl border border-amber-500/20">📰</span>
                <span class="text-xs font-bold text-amber-400 bg-amber-500/10 px-2.5 py-1 rounded-full">Publikasi</span>
            </div>
            <h3 class="text-gray-400 text-xs font-bold uppercase tracking-wider">Berita & Riset</h3>
            <p class="text-4xl font-extrabold text-white mt-1">{{ $totalBerita }}</p>
            <p class="text-xs text-gray-400 mt-2 flex items-center gap-1">
                <span class="text-amber-400">✓</span> Informasi pasar & cuaca
            </p>
        </div>

        <!-- Card 4: Sensor IoT / Lingkungan -->
        <div class="bg-black/40 backdrop-blur-xl border border-purple-500/30 rounded-3xl p-6 shadow-xl relative group hover:border-purple-400 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <span class="text-3xl p-3 bg-purple-500/10 rounded-2xl border border-purple-500/20">🌦️</span>
                <span class="text-xs font-bold text-purple-400 bg-purple-500/10 px-2.5 py-1 rounded-full">IoT Smart</span>
            </div>
            <h3 class="text-gray-400 text-xs font-bold uppercase tracking-wider">Kelembaban Tanah</h3>
            <p class="text-4xl font-extrabold text-white mt-1">68<span class="text-xl font-normal text-gray-400">%</span></p>
            <p class="text-xs text-emerald-400 mt-2 flex items-center gap-1">
                <span>●</span> Kondisi tanah optimal (pH 6.5)
            </p>
        </div>
    </section>

    <!-- 3. Navigasi Akses Cepat (Quick Actions) -->
    <section class="mb-14">
        <h2 class="text-xl font-extrabold text-white mb-6 flex items-center gap-2">
            <span>⚡</span> Pintasan Layanan AgriLens
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            <a href="{{ route('lens.ai') }}" 
               class="bg-gradient-to-br from-emerald-950/60 to-slate-900 border border-emerald-500/20 hover:border-emerald-400 p-5 rounded-2xl transition-all duration-300 hover:-translate-y-1 block shadow-lg">
                <span class="text-3xl block mb-2">📸</span>
                <h4 class="text-white font-bold text-sm">Lens AI Scanner</h4>
                <p class="text-gray-400 text-xs mt-1">Diagnosis penyakit & nutrisi daun</p>
            </a>

            <a href="{{ route('module.index') }}" 
               class="bg-gradient-to-br from-blue-950/60 to-slate-900 border border-blue-500/20 hover:border-blue-400 p-5 rounded-2xl transition-all duration-300 hover:-translate-y-1 block shadow-lg">
                <span class="text-3xl block mb-2">📖</span>
                <h4 class="text-white font-bold text-sm">Modul Edukasi</h4>
                <p class="text-gray-400 text-xs mt-1">Panduan menanam & pembuatan pupuk</p>
            </a>

            <a href="{{ route('quiz.index') }}" 
               class="bg-gradient-to-br from-purple-950/60 to-slate-900 border border-purple-500/20 hover:border-purple-400 p-5 rounded-2xl transition-all duration-300 hover:-translate-y-1 block shadow-lg">
                <span class="text-3xl block mb-2">🏆</span>
                <h4 class="text-white font-bold text-sm">Kuis & Tantangan</h4>
                <p class="text-gray-400 text-xs mt-1">Uji pemahaman wawasan bertani</p>
            </a>

            <a href="{{ route('forum.index') }}" 
               class="bg-gradient-to-br from-amber-950/60 to-slate-900 border border-amber-500/20 hover:border-amber-400 p-5 rounded-2xl transition-all duration-300 hover:-translate-y-1 block shadow-lg">
                <span class="text-3xl block mb-2">💬</span>
                <h4 class="text-white font-bold text-sm">Forum Komunitas</h4>
                <p class="text-gray-400 text-xs mt-1">Diskusi interaktif sesama petani</p>
            </a>
        </div>
    </section>

    <!-- 4. Tabel / Grid Modul Edukasi Terkini -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Kolom Kiri: Modul Edukasi (2 Kolom) -->
        <div class="lg:col-span-2 bg-black/40 backdrop-blur-xl border border-white/10 rounded-3xl p-6 md:p-8 shadow-2xl">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-extrabold text-white flex items-center gap-2">
                        <span>🌱</span> Modul Budidaya Terkini
                    </h3>
                    <p class="text-xs text-gray-400 mt-1">Data langsung dari tabel database MySQL `moduls`</p>
                </div>
                <a href="{{ route('module.index') }}" class="text-xs font-bold text-emerald-400 hover:text-emerald-300 transition">
                    Lihat Semua →
                </a>
            </div>

            <div class="space-y-4">
                @forelse ($recentModules as $mod)
                    @php
                        $modId = is_array($mod) ? $mod['id'] : $mod->id;
                        $modTitle = is_array($mod) ? $mod['title'] : $mod->title;
                        $modCat = is_array($mod) ? ($mod['category'] ?? 'Umum') : ($mod->category ?? $mod->kategori?->nama_kategori ?? 'Umum');
                        $modDesc = is_array($mod) ? $mod['short_desc'] : $mod->short_desc;
                        $modDiff = is_array($mod) ? ($mod['difficulty'] ?? 'Pemula') : ($mod->difficulty ?? 'Pemula');
                        $modDays = is_array($mod) ? ($mod['harvest_days'] ?? 60) : ($mod->harvest_days ?? 60);
                    @endphp
                    <div class="p-4 bg-slate-900/60 hover:bg-slate-900/90 border border-white/5 hover:border-emerald-500/30 rounded-2xl transition duration-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-xl shrink-0">
                                🌿
                            </div>
                            <div>
                                <div class="flex items-center gap-2 flex-wrap mb-1">
                                    <x-badge :category="$modCat">{{ $modCat }}</x-badge>
                                    <span class="text-[10px] text-gray-400 bg-white/5 px-2 py-0.5 rounded-full">
                                        ⏱️ {{ $modDays }} hari
                                    </span>
                                    <span class="text-[10px] text-emerald-400 bg-emerald-500/10 px-2 py-0.5 rounded-full font-semibold">
                                        {{ $modDiff }}
                                    </span>
                                </div>
                                <h4 class="text-white font-bold text-sm hover:text-emerald-400 transition">
                                    <a href="{{ route('module.detail', ['id' => $modId]) }}">{{ $modTitle }}</a>
                                </h4>
                                <p class="text-xs text-gray-400 line-clamp-1 mt-0.5">{{ $modDesc }}</p>
                            </div>
                        </div>
                        <a href="{{ route('module.detail', ['id' => $modId]) }}" 
                           class="text-xs font-bold bg-white/5 hover:bg-emerald-500 hover:text-slate-950 text-emerald-400 px-4 py-2 rounded-xl border border-white/10 transition shrink-0">
                            Buka Modul
                        </a>
                    </div>
                @empty
                    <div class="text-center py-10 text-gray-400">
                        <p>Belum ada data modul di database.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Kolom Kanan: Berita Terbaru & Info Cuaca (1 Kolom) -->
        <div class="space-y-6">
            <!-- Berita Singkat -->
            <div class="bg-black/40 backdrop-blur-xl border border-white/10 rounded-3xl p-6 shadow-2xl">
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-lg font-extrabold text-white flex items-center gap-2">
                        <span>📰</span> Berita Agrikultur
                    </h3>
                    <a href="{{ route('news.index') }}" class="text-xs text-emerald-400 hover:text-emerald-300 font-bold">Semua →</a>
                </div>

                <div class="space-y-4">
                    @forelse ($recentNews as $newsItem)
                        @php
                            $newsId = is_array($newsItem) ? $newsItem['id'] : $newsItem->id;
                            $newsTitle = is_array($newsItem) ? $newsItem['title'] : $newsItem->title;
                            $newsCat = is_array($newsItem) ? $newsItem['category'] : $newsItem->category;
                            $newsDate = is_array($newsItem) ? $newsItem['post_date'] : $newsItem->post_date;
                        @endphp
                        <a href="{{ route('news.detail', ['id' => $newsId]) }}" class="block p-3.5 bg-slate-900/50 hover:bg-slate-900 border border-white/5 rounded-2xl transition">
                            <div class="flex items-center justify-between text-[11px] text-gray-400 mb-1.5">
                                <span class="text-emerald-400 font-semibold">{{ $newsCat }}</span>
                                <span>{{ \Carbon\Carbon::parse($newsDate)->translatedFormat('d M Y') }}</span>
                            </div>
                            <h5 class="text-xs font-bold text-white line-clamp-2 leading-relaxed">
                                {{ $newsTitle }}
                            </h5>
                        </a>
                    @empty
                        <p class="text-xs text-gray-400 text-center py-4">Belum ada berita.</p>
                    @endforelse
                </div>
            </div>

            <!-- Kartu Status Iklim & Rekomendasi -->
            <div class="bg-gradient-to-br from-green-950/60 to-slate-950 border border-green-500/20 rounded-3xl p-6 shadow-2xl text-left">
                <div class="flex items-center gap-3 mb-3">
                    <span class="text-2xl">💡</span>
                    <h4 class="text-sm font-bold text-white">Rekomendasi Tanam Hari Ini</h4>
                </div>
                <p class="text-xs text-gray-300 leading-relaxed mb-4">
                    Intensitas sinar matahari optimal dengan kelembaban 68%. Sangat disarankan melakukan pemupukan susulan pada komoditas cabai dan tomat pada sore hari.
                </p>
                <a href="{{ route('module.index') }}" class="inline-block text-xs font-bold text-emerald-400 hover:text-emerald-300">
                    Lihat Panduan Pemupukan →
                </a>
            </div>
        </div>
    </div>

</main>
@endsection

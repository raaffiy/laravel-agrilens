@extends('layouts.app')

@section('title', 'Beranda - AgriLens Smart Agriculture')

@section('content')
    <!-- Hero Section Terbingkai Rapi -->
    <section class="max-w-5xl mx-auto px-6 pt-12 pb-16 text-center relative">
        <div class="bg-slate-950/60 backdrop-blur-2xl border border-white/10 p-10 md:p-14 rounded-3xl shadow-2xl">
            <span class="inline-block bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 text-xs font-bold px-4 py-1.5 rounded-full mb-6 uppercase tracking-widest shadow-sm">
                Solusi Cerdas Pertanian Berkelanjutan
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight tracking-tight">
                Pertanian Lebih Cerdas dengan <span class="text-emerald-400">AgriLens</span>
            </h1>
            <p class="mt-6 text-base md:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Platform edukasi, monitoring, dan komunitas petani modern. Membantu meningkatkan hasil panen dan ketahanan pangan melalui teknologi.
            </p>
            <div class="mt-8 flex flex-wrap justify-center items-center gap-4">
                <a href="{{ route('module.index') }}" 
                   class="bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-400 hover:to-green-500 text-white font-extrabold py-3.5 px-8 rounded-2xl transition duration-300 transform hover:scale-105 shadow-xl shadow-emerald-500/25 text-sm md:text-base inline-flex items-center gap-2">
                    <span>📚</span> Mulai Belajar Modul
                </a>
                <a href="{{ route('lens.ai') }}" 
                   class="bg-slate-900/80 hover:bg-slate-800/90 border border-emerald-400/40 hover:border-emerald-400 text-emerald-300 hover:text-white font-bold py-3.5 px-8 rounded-2xl transition duration-300 transform hover:scale-105 backdrop-blur-xl text-sm md:text-base inline-flex items-center gap-2">
                    <span>⚡</span> Coba Lens AI
                </a>
            </div>
        </div>
    </section>

    <!-- Konten Utama (Spacing & Grid Presisi) -->
    <div class="max-w-6xl mx-auto px-6 space-y-28">

        <!-- 1. Latar Belakang Section -->
        <section id="latar-belakang" class="bg-slate-900/80 backdrop-blur-2xl p-8 md:p-14 rounded-3xl shadow-2xl border border-white/10 flex flex-col lg:flex-row items-center gap-12">
            <div class="w-full lg:w-1/2">
                <span class="text-emerald-400 text-xs font-bold uppercase tracking-widest bg-emerald-500/10 border border-emerald-500/30 px-3 py-1 rounded-full inline-block mb-3">
                    Tentang Platform
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-2 mb-6 leading-tight">
                    Latar Belakang <span class="text-emerald-400">AgriLens</span>
                </h2>
                <p class="text-slate-300 leading-relaxed text-sm md:text-base mb-4">
                    Pertanian adalah sektor krusial bagi kehidupan kita, namun banyak petani menghadapi kendala dalam mendeteksi penyakit tanaman, akses harga pasar, dan teknik budidaya organik yang efisien.
                </p>
                <p class="text-slate-300 leading-relaxed text-sm md:text-base">
                    <strong class="text-emerald-400 font-semibold">AgriLens</strong> hadir sebagai jembatan pengetahuan dengan menyediakan materi panduan praktis, analisis berbasis kecerdasan buatan, dan forum kolaborasi terbuka.
                </p>
            </div>
            <div class="w-full lg:w-1/2 overflow-hidden rounded-2xl shadow-2xl border border-white/10">
                <img src="{{ asset('assets/latarbelakang.png') }}" 
                     alt="Smart Farming AgriLens" 
                     class="w-full h-80 md:h-96 object-cover hover:scale-105 transition duration-500" 
                     onerror="this.onerror=null;this.src='https://placehold.co/600x400/1e293b/4ade80?text=Smart+Farming';" />
            </div>
        </section>

        <!-- 2. Tujuan Section (Grid 3 Kolom Rapi & Simetris) -->
        <section id="tujuan" class="text-center">
            <div class="mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-500/10 border border-emerald-500/30 px-3.5 py-1.5 rounded-full inline-block mb-3">
                    Fokus & Komitmen
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white">
                    Tujuan <span class="text-emerald-400">Kami</span>
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left items-stretch">
                <x-card>
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-emerald-500/15 border border-emerald-500/30 flex items-center justify-center text-3xl mb-6 shadow-inner">
                            📖
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-3">
                            Literasi Pertanian
                        </h3>
                        <p class="text-slate-300 leading-relaxed text-sm">
                            Meningkatkan pengetahuan teknik bercocok tanam dan pembuatan pupuk organik melalui modul langkah-demi-langkah yang mudah dipahami.
                        </p>
                    </div>
                </x-card>

                <x-card>
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-emerald-500/15 border border-emerald-500/30 flex items-center justify-center text-3xl mb-6 shadow-inner">
                            🔍
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-3">
                            Monitoring Cerdas
                        </h3>
                        <p class="text-slate-300 leading-relaxed text-sm">
                            Membantu mendeteksi dini gejala hama dan penyakit daun tanaman menggunakan teknologi pemrosesan citra kamera cerdas.
                        </p>
                    </div>
                </x-card>

                <x-card>
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-emerald-500/15 border border-emerald-500/30 flex items-center justify-center text-3xl mb-6 shadow-inner">
                            🤝
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-3">
                            Ekosistem Kolaboratif
                        </h3>
                        <p class="text-slate-300 leading-relaxed text-sm">
                            Menghubungkan kelompok tani, akademisi, dan masyarakat luas dalam wadah forum tanya-jawab yang aktif dan saling mendukung.
                        </p>
                    </div>
                </x-card>
            </div>
        </section>

        <!-- 3. Modul Unggulan (Grid 3 Kolom Sejajar) -->
        <section id="modul-unggulan">
            <div class="flex justify-between items-end mb-10 flex-wrap gap-4 border-b border-white/10 pb-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-500/10 border border-emerald-500/30 px-3.5 py-1.5 rounded-full inline-block mb-2">
                        Kurikulum Terpopuler
                    </span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-white">
                        Modul Edukasi <span class="text-emerald-400">Pilihan</span>
                    </h2>
                    <p class="text-slate-400 text-sm mt-1">Panduan bertani yang paling banyak dipelajari minggu ini</p>
                </div>
                <a href="{{ route('module.index') }}" class="text-emerald-400 hover:text-emerald-300 font-bold flex items-center gap-1.5 text-sm transition group">
                    <span>Lihat Semua Modul</span>
                    <span class="group-hover:translate-x-1 transition">→</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
                @foreach ($featuredModules as $module)
                    @include('partials.module-card', ['module' => $module])
                @endforeach
            </div>
        </section>

        <!-- 4. Manfaat AgriLens (Grid 2 Kolom Sejajar) -->
        <section id="manfaat" class="text-center">
            <div class="mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-500/10 border border-emerald-500/30 px-3.5 py-1.5 rounded-full inline-block mb-3">
                    Keunggulan Ekosistem
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white">
                    Manfaat <span class="text-emerald-400">AgriLens</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left items-stretch">
                <div class="bg-slate-900/80 backdrop-blur-2xl p-8 rounded-3xl border border-white/10 flex items-start gap-5 hover:border-emerald-500/40 transition">
                    <span class="text-3xl bg-emerald-500/15 text-emerald-400 p-3.5 rounded-2xl border border-emerald-500/30 flex-shrink-0">🌱</span>
                    <div>
                        <h4 class="font-bold text-xl text-white mb-2">Edukasi Pertanian Modern</h4>
                        <p class="text-slate-300 text-sm leading-relaxed">Materi lengkap dan terstruktur mulai dari persiapan lahan, pemupukan organik, hingga penanganan pascapanen.</p>
                    </div>
                </div>

                <div class="bg-slate-900/80 backdrop-blur-2xl p-8 rounded-3xl border border-white/10 flex items-start gap-5 hover:border-blue-500/40 transition">
                    <span class="text-3xl bg-blue-500/15 text-blue-400 p-3.5 rounded-2xl border border-blue-500/30 flex-shrink-0">📊</span>
                    <div>
                        <h4 class="font-bold text-xl text-white mb-2">Informasi Pasar & Cuaca</h4>
                        <p class="text-slate-300 text-sm leading-relaxed">Berita berkala mengenai fluktuasi komoditas dan peringatan dini cuaca ekstrem bagi petani.</p>
                    </div>
                </div>

                <div class="bg-slate-900/80 backdrop-blur-2xl p-8 rounded-3xl border border-white/10 flex items-start gap-5 hover:border-purple-500/40 transition">
                    <span class="text-3xl bg-purple-500/15 text-purple-400 p-3.5 rounded-2xl border border-purple-500/30 flex-shrink-0">💬</span>
                    <div>
                        <h4 class="font-bold text-xl text-white mb-2">Pusat Diskusi Terpusat</h4>
                        <p class="text-slate-300 text-sm leading-relaxed">Wadah diskusi interaktif untuk bertanya seputar kendala tanaman dan berbagi tips sukses antar petani.</p>
                    </div>
                </div>

                <div class="bg-slate-900/80 backdrop-blur-2xl p-8 rounded-3xl border border-white/10 flex items-start gap-5 hover:border-amber-500/40 transition">
                    <span class="text-3xl bg-amber-500/15 text-amber-400 p-3.5 rounded-2xl border border-amber-500/30 flex-shrink-0">📈</span>
                    <div>
                        <h4 class="font-bold text-xl text-white mb-2">Peningkatan Produktivitas</h4>
                        <p class="text-slate-300 text-sm leading-relaxed">Optimalisasi panen dan efisiensi biaya melalui pupuk organik mandiri ramah lingkungan.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. Galeri Dokumentasi -->
        <section id="galeri" class="text-center">
            <div class="mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-500/10 border border-emerald-500/30 px-3.5 py-1.5 rounded-full inline-block mb-3">
                    Aktivitas Lapangan
                </span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white">
                    Galeri <span class="text-emerald-400">Dokumentasi</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ([1, 2, 3, 4] as $item)
                    <div class="group relative overflow-hidden rounded-2xl shadow-xl bg-slate-900/80 border border-white/10">
                        <img src="{{ asset('assets/dokumentasi/pertemuanPertama.jpg') }}" 
                             alt="Dokumentasi AgriLens {{ $item }}"
                             class="w-full h-56 object-cover transition duration-500 group-hover:scale-110 opacity-80 group-hover:opacity-100" 
                             onerror="this.onerror=null;this.src='https://placehold.co/400x300/1e293b/4ade80?text=Dokumentasi+{{ $item }}';" />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-5">
                            <p class="text-white text-sm font-bold">Kegiatan Pendampingan Tani #{{ $item }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </div>
@endsection

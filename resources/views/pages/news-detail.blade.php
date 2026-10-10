@extends('layouts.app')

@section('title', $news['title'] . ' - AgriLens')

@section('content')
<main class="container mx-auto px-6 py-12 max-w-5xl">

    <!-- Tombol Navigasi Kembali -->
    <div class="mb-6">
        <a href="{{ route('news.index') }}" 
           class="inline-flex items-center gap-2 text-sm font-semibold text-green-400 hover:text-green-300 transition">
            <span>←</span> Kembali ke Indeks Berita
        </a>
    </div>

    <!-- Kartu Konten Berita Utama -->
    <article class="bg-black/40 backdrop-blur-xl border border-green-500/30 rounded-3xl shadow-2xl overflow-hidden">
        <!-- Header Banner Image -->
        <div class="relative w-full h-80 md:h-96 overflow-hidden bg-slate-950">
            <img src="{{ $news['image'] }}" 
                 alt="{{ $news['title'] }}" 
                 class="w-full h-full object-cover"
                 onerror="this.onerror=null;this.src='https://placehold.co/900x450/1e293b/4ade80?text=AgriLens+News';" />
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
        </div>

        <div class="p-8 md:p-12">
            <!-- Kategori & Tanggal -->
            <div class="flex items-center gap-4 flex-wrap mb-4">
                <x-badge :category="$news['category']">{{ $news['category'] }}</x-badge>
                <span class="text-xs text-gray-400">
                    📅 Ditayangkan pada {{ \Carbon\Carbon::parse($news['post_date'])->translatedFormat('d F Y') }}
                </span>
            </div>

            <!-- Judul Berita -->
            <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight mb-8">
                {{ $news['title'] }}
            </h1>

            {{-- Paragraf Isi Berita (Blade Directive @foreach untuk memecah baris teks) --}}
            <div class="text-gray-300 text-base md:text-lg leading-relaxed space-y-5 border-t border-white/10 pt-8">
                @php
                    $paragraphs = array_filter(explode("\n", $news['long_desc']));
                @endphp

                @if (count($paragraphs) > 0)
                    @foreach ($paragraphs as $para)
                        <p>{{ trim($para) }}</p>
                    @endforeach
                @else
                    <p>{{ $news['long_desc'] }}</p>
                @endif
            </div>

            <!-- Tombol Aksi Bawah -->
            <div class="mt-12 pt-8 border-t border-white/10 flex flex-wrap justify-between items-center gap-4">
                <a href="{{ route('news.index') }}" 
                   class="bg-green-600 hover:bg-green-500 text-white px-8 py-3 rounded-2xl font-bold transition shadow-lg shadow-green-600/30 inline-flex items-center gap-2">
                    <span>←</span> Semua Berita
                </a>
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white text-sm transition">
                    Ke Halaman Beranda
                </a>
            </div>
        </div>
    </article>

    {{-- Berita Terkait (@if & @foreach) --}}
    @if ($recentNews->isNotEmpty())
        <section class="mt-16">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-white">
                    Berita Terkait <span class="text-green-400">Lainnya</span>
                </h2>
                <a href="{{ route('news.index') }}" class="text-sm font-semibold text-green-400 hover:underline">
                    Lihat Semua →
                </a>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($recentNews as $item)
                    @include('partials.news-card', ['news' => $item])
                @endforeach
            </div>
        </section>
    @endif

</main>
@endsection


@extends('layouts.app')

@section('title', 'Modul Edukasi Pertanian - AgriLens')

@section('content')
<main class="container mx-auto px-6 py-12">
    <!-- Hero Banner -->
    <div class="bg-black/40 backdrop-blur-xl p-10 md:p-14 rounded-3xl shadow-2xl mb-14 text-center border border-white/10 max-w-5xl mx-auto">
        <span class="text-xs bg-green-500/20 text-green-300 px-4 py-1.5 rounded-full border border-green-500/30 uppercase font-bold tracking-wider">
            Kurikulum Praktis Petani
        </span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mt-4">
            Modul Edukasi <span class="text-green-400">Pertanian</span>
        </h1>
        <p class="mt-4 text-gray-300 max-w-2xl mx-auto text-base md:text-lg leading-relaxed">
            Pelajari teknik budidaya tanaman pangan dan formulasi pupuk organik mandiri dengan panduan terperinci dari AgriLens.
        </p>
    </div>

    <!-- 1. Bagian Panduan Menanam -->
    <section class="mb-20">
        <div class="flex items-center justify-between mb-8 pb-4 border-b border-white/10 flex-wrap gap-4">
            <div>
                <h2 class="text-3xl font-bold text-white flex items-center gap-3">
                    <span>🌾</span> Panduan <span class="text-green-400">Menanam Tanaman</span>
                </h2>
                <p class="text-gray-400 text-sm mt-1">Langkah budidaya komoditas pangan dari benih sampai panen</p>
            </div>
            <span class="text-xs font-semibold bg-green-500/10 text-green-400 px-3 py-1 rounded-lg border border-green-500/20">
                Total: {{ count($tanaman) }} Komoditas
            </span>
        </div>

        {{-- Directive Perulangan @forelse dan Directive Percabangan @if --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($tanaman as $module)
                @include('partials.module-card', ['module' => $module])
            @empty
                <div class="col-span-full text-center py-12 bg-black/30 rounded-2xl border border-white/10 text-gray-400">
                    <p>Belum ada modul panduan menanam yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- 2. Bagian Panduan Membuat Pupuk Organik -->
    <section>
        <div class="flex items-center justify-between mb-8 pb-4 border-b border-white/10 flex-wrap gap-4">
            <div>
                <h2 class="text-3xl font-bold text-white flex items-center gap-3">
                    <span>🧪</span> Panduan <span class="text-purple-400">Membuat Pupuk Organik</span>
                </h2>
                <p class="text-gray-400 text-sm mt-1">Formulasi kompos, POC, dan pupuk kandang hemat biaya</p>
            </div>
            <span class="text-xs font-semibold bg-purple-500/10 text-purple-300 px-3 py-1 rounded-lg border border-purple-500/20">
                Total: {{ count($pupuk) }} Resep Pupuk
            </span>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($pupuk as $module)
                @include('partials.module-card', ['module' => $module])
            @empty
                <div class="col-span-full text-center py-12 bg-black/30 rounded-2xl border border-white/10 text-gray-400">
                    <p>Belum ada modul panduan pupuk yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </section>
</main>
@endsection

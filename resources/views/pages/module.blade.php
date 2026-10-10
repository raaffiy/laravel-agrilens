@extends('layouts.app')

@section('title', 'Modul Edukasi Pertanian - AgriLens')

@section('content')
<main class="container mx-auto px-6 py-12">
    <!-- Hero Banner -->
    <div class="bg-black/40 backdrop-blur-xl p-10 md:p-14 rounded-3xl shadow-2xl mb-14 text-center border border-white/10 max-w-5xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white">
            Module Edukasi <span class="text-green-400">Pertanian</span>
        </h1>
        <p class="mt-4 text-gray-300 max-w-2xl mx-auto text-base md:text-lg leading-relaxed">
            Pelajari teknik menanam berbagai jenis tanaman pangan dengan panduan ahli dari AgriLens.
        </p>
    </div>

    <!-- 1. Seksi Panduan Menanam -->
    <section class="mb-20">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-white mb-10">
            Pilih <span class="text-green-400">Panduan Menanam</span>
        </h2>

        {{-- Directive Perulangan @forelse dan Partial @include --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10 max-w-7xl mx-auto">
            @forelse ($tanaman as $module)
                @include('partials.module-card', ['module' => $module])
            @empty
                <div class="col-span-full text-center py-12 bg-black/30 rounded-2xl border border-white/10 text-gray-400">
                    <p>Belum ada modul panduan menanam yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- 2. Seksi Panduan Membuat Pupuk Organik -->
    <section class="mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-white mb-10 mt-16">
            Pilih <span class="text-green-400">Panduan Membuat Pupuk</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10 max-w-7xl mx-auto">
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

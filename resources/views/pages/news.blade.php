@extends('layouts.app')

@section('title', 'Berita Terkini Pertanian - AgriLens')

@section('content')
<main class="container mx-auto px-6 py-12">
    <!-- Hero Section -->
    <section class="max-w-4xl mx-auto text-center mb-16">
        <div class="bg-black/40 backdrop-blur-xl p-10 md:p-14 rounded-3xl shadow-2xl border border-white/10">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white">
                📰 Berita Terbaru <span class="text-green-400">AgriLens</span>
            </h1>
            <p class="mt-4 text-gray-300 max-w-2xl mx-auto text-base md:text-lg leading-relaxed">
                Update informasi terbaru seputar pertanian, komoditas, teknologi, dan dunia agrikultur.
            </p>
        </div>
    </section>

    <!-- Kategori Filter Legend -->
    <div class="flex justify-center flex-wrap gap-3 mb-12">
        <x-badge category="Harga Pasar">Harga Pasar</x-badge>
        <x-badge category="Cuaca & Iklim">Cuaca & Iklim</x-badge>
        <x-badge category="Teknologi">Teknologi</x-badge>
        <x-badge category="Hama dan Penyakit">Hama & Penyakit</x-badge>
    </div>

    {{-- Grid Berita Menggunakan Directive @forelse dan Partial @include --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10 max-w-7xl mx-auto">
        @forelse ($newsList as $news)
            @include('partials.news-card', ['news' => $news])
        @empty
            <div class="col-span-full text-center py-16 bg-black/30 rounded-3xl border border-white/10 text-gray-400">
                <p class="text-lg">Belum ada berita pertanian yang dipublikasikan saat ini.</p>
            </div>
        @endforelse
    </div>
</main>
@endsection

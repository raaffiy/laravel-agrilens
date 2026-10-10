@extends('layouts.app')

@section('title', $module['title'] . ' - AgriLens Modul')

@section('content')
<main class="container mx-auto px-6 py-12 max-w-5xl">
    <!-- Tombol Kembali (Named Route) -->
    <div class="mb-8">
        <a href="{{ route('module.index') }}" class="inline-flex items-center gap-2 text-green-400 hover:text-green-300 font-semibold transition text-sm">
            <span>←</span> Kembali ke Daftar Modul
        </a>
    </div>

    <!-- Header Modul -->
    <div class="bg-black/40 backdrop-blur-xl border border-white/10 rounded-3xl p-8 md:p-12 shadow-2xl mb-12">
        <div class="mb-4">
            <x-badge :category="$module['category']">{{ $module['category'] }}</x-badge>
        </div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight">
            {{ $module['title'] }}
        </h1>
        <p class="text-gray-300 text-lg leading-relaxed">
            {{ $module['short_desc'] ?: $module['long_desc'] }}
        </p>

        <!-- Media Hero (Video / Image) -->
        <div class="mt-8 rounded-2xl overflow-hidden border border-white/10 bg-black/60 shadow-2xl">
            @php
                $isYoutube = str_contains($module['image'] ?? '', 'youtu');
            @endphp

            @if ($isYoutube)
                @php
                    $videoUrl = $module['image'];
                    if (str_contains($videoUrl, 'youtu.be/')) {
                        $vId = explode('?', explode('youtu.be/', $videoUrl)[1] ?? '')[0] ?? '';
                    } else {
                        $vId = explode('&', explode('watch?v=', $videoUrl)[1] ?? '')[0] ?? '';
                    }
                @endphp
                <div class="aspect-video w-full">
                    <iframe class="w-full h-full" 
                            src="https://www.youtube.com/embed/{{ $vId }}" 
                            title="{{ $module['title'] }}" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen></iframe>
                </div>
            @else
                <img src="{{ $module['image'] }}" 
                     alt="{{ $module['title'] }}" 
                     class="w-full max-h-[460px] object-cover" 
                     onerror="this.onerror=null;this.src='https://placehold.co/800x450/1e293b/4ade80?text=AgriLens';" />
            @endif
        </div>
    </div>

    <!-- Konten Rincian Modul -->
    <div class="grid md:grid-cols-3 gap-8">
        <!-- Kolom Utama -->
        <div class="md:col-span-2 space-y-8">
            <!-- Penjelasan Lengkap -->
            <div class="bg-black/30 backdrop-blur-xl border border-white/10 rounded-3xl p-8">
                <h2 class="text-2xl font-bold text-white mb-4 flex items-center gap-2">
                    <span>📖</span> Uraian Modul
                </h2>
                <div class="text-gray-300 leading-relaxed space-y-4 whitespace-pre-line text-sm md:text-base">
                    {{ $module['long_desc'] }}
                </div>
            </div>

            <!-- Langkah-Langkah (Planting / Making Steps) -->
            <div class="bg-black/30 backdrop-blur-xl border border-white/10 rounded-3xl p-8">
                <h2 class="text-2xl font-bold text-green-400 mb-4 flex items-center gap-2">
                    <span>📝</span> Langkah-Langkah Pelaksanaan
                </h2>
                <div class="text-gray-200 leading-relaxed whitespace-pre-line text-sm md:text-base font-mono bg-black/40 p-6 rounded-2xl border border-white/5">
                    {{ $module['planting_steps'] }}
                </div>
            </div>
        </div>

        <!-- Kolom Sidebar -->
        <div class="space-y-8">
            <!-- Manfaat / Ingredients -->
            <div class="bg-black/30 backdrop-blur-xl border border-white/10 rounded-3xl p-6">
                <h3 class="text-xl font-bold text-white mb-3 flex items-center gap-2">
                    <span>✨</span> Manfaat & Bahan
                </h3>
                <div class="text-gray-300 text-sm leading-relaxed whitespace-pre-line">
                    {{ $module['benefits'] }}
                </div>
            </div>

            <!-- Tips Perawatan / Alat -->
            <div class="bg-black/30 backdrop-blur-xl border border-white/10 rounded-3xl p-6">
                <h3 class="text-xl font-bold text-amber-400 mb-3 flex items-center gap-2">
                    <span>💡</span> Tips & Kebutuhan
                </h3>
                <div class="text-gray-300 text-sm leading-relaxed whitespace-pre-line">
                    {{ $module['care_tips'] }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modul Terkait (Looping @foreach) --}}
    @if ($relatedModules->isNotEmpty())
        <div class="mt-20 pt-10 border-t border-white/10">
            <h2 class="text-3xl font-bold text-white mb-8">
                Modul Edukasi <span class="text-green-400">Lainnya</span>
            </h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($relatedModules as $rel)
                    @include('partials.module-card', ['module' => $rel])
                @endforeach
            </div>
        </div>
    @endif
</main>
@endsection


{{-- Partial: resources/views/partials/module-card.blade.php --}}
@php
    $isPupuk = ($module['category'] ?? '') === 'Panduan Membuat Pupuk';
    $imgSrc = $module['image'] ?? '/assets/menanam/padi.png';

    // Jika video youtube, buat thumbnail otomatis
    if ($isPupuk && str_contains($imgSrc, 'youtu.be/')) {
        $videoId = explode('?', explode('youtu.be/', $imgSrc)[1] ?? '')[0] ?? '';
        $imgSrc = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
    } elseif ($isPupuk && str_contains($imgSrc, 'watch?v=')) {
        $videoId = explode('&', explode('watch?v=', $imgSrc)[1] ?? '')[0] ?? '';
        $imgSrc = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
    }
@endphp

<a href="{{ route('module.detail', ['id' => $module['id']]) }}"
   class="group relative overflow-hidden rounded-3xl shadow-2xl border border-white/10 hover:border-emerald-400/70 transition duration-500 flex flex-col h-full bg-slate-900/80 backdrop-blur-2xl">
    
    <div class="relative w-full h-52 overflow-hidden bg-slate-950 flex-shrink-0">
        <img src="{{ $imgSrc }}" 
             alt="{{ $module['title'] }}" 
             class="w-full h-full object-cover transition duration-500 group-hover:scale-110 opacity-85"
             onerror="this.onerror=null;this.src='https://placehold.co/400x300/1e293b/4ade80?text=AgriLens+Module';" />
        
        {{-- Percabangan @if untuk menampilkan badge khusus pupuk / video --}}
        @if ($isPupuk)
            <div class="absolute top-3 right-3 bg-red-600/90 text-white text-xs font-bold px-2.5 py-1 rounded-lg flex items-center gap-1.5 shadow-lg backdrop-blur-sm">
                <span>▶</span> Video Tutorial
            </div>
        @else
            <div class="absolute top-3 right-3 bg-emerald-600/90 text-white text-xs font-bold px-2.5 py-1 rounded-lg flex items-center gap-1.5 shadow-lg backdrop-blur-sm">
                <span>🌱</span> Panduan Tani
            </div>
        @endif

        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
    </div>

    <div class="p-6 md:p-7 flex-1 flex flex-col justify-between">
        <div>
            <div class="mb-3">
                <x-badge :category="$module['category']">{{ $module['category'] }}</x-badge>
            </div>
            <h3 class="text-xl font-bold text-white group-hover:text-emerald-400 transition line-clamp-1 mb-2">
                {{ $module['title'] }}
            </h3>
            <p class="text-slate-300 text-sm line-clamp-2 leading-relaxed">
                {{ $module['short_desc'] ?: $module['long_desc'] }}
            </p>
        </div>

        <div class="mt-5 pt-4 border-t border-white/10 flex items-center justify-between text-xs text-emerald-400 font-bold">
            <span>Pelajari Modul</span>
            <span class="group-hover:translate-x-1 transition">→</span>
        </div>
    </div>
</a>

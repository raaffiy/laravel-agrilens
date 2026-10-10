{{-- Partial: resources/views/partials/module-card.blade.php --}}
@php
    $isPupuk = ($module['category'] ?? '') === 'Panduan Membuat Pupuk';
    $rawImg = $module['image'] ?? '/assets/menanam/padi.png';

    // Penanganan URL gambar dan YouTube thumbnail
    if ($isPupuk && str_contains($rawImg, 'youtu.be/')) {
        $videoId = explode('?', explode('youtu.be/', $rawImg)[1] ?? '')[0] ?? '';
        $imgSrc = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
    } elseif ($isPupuk && str_contains($rawImg, 'watch?v=')) {
        $videoId = explode('&', explode('watch?v=', $rawImg)[1] ?? '')[0] ?? '';
        $imgSrc = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
    } elseif (str_starts_with($rawImg, 'http')) {
        $imgSrc = $rawImg;
    } else {
        $imgSrc = asset(ltrim($rawImg, '/'));
    }
@endphp

<a href="{{ route('module.detail', ['id' => $module['id']]) }}"
   class="group relative h-80 rounded-3xl overflow-hidden shadow-2xl border border-green-400/20 hover:border-green-400/70 transition transform hover:-translate-y-2 duration-300 flex flex-col justify-end bg-slate-900/40 backdrop-blur-xl">
    
    <!-- Background Image Cover Penuh -->
    <img src="{{ $imgSrc }}" 
         alt="{{ $module['title'] }}" 
         class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-110 opacity-80"
         onerror="this.onerror=null;this.src='https://placehold.co/600x400/1e293b/4ade80?text=AgriLens+Module';" />
    
    <!-- Badge Kategori Pojok Kanan Atas -->
    @if ($isPupuk)
        <div class="absolute top-4 right-4 z-20 bg-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-xl flex items-center gap-1.5 shadow-lg backdrop-blur-sm">
            <span>▶</span> Video Tutorial
        </div>
    @else
        <div class="absolute top-4 right-4 z-20 bg-green-600/90 text-white text-xs font-bold px-3 py-1.5 rounded-xl flex items-center gap-1.5 shadow-lg backdrop-blur-sm">
            <span>🌱</span> Panduan Tani
        </div>
    @endif

    <!-- Overlay Gradasi Gelap Elegan -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/50 to-transparent pointer-events-none"></div>

    <!-- Konten Teks di Bagian Bawah Kartu -->
    <div class="relative z-10 p-6 md:p-7">
        <h3 class="text-2xl font-bold text-white mb-2 group-hover:text-green-400 transition line-clamp-1 drop-shadow-md">
            {{ $module['title'] }}
        </h3>
        <p class="text-gray-300 text-sm line-clamp-2 leading-relaxed drop-shadow">
            {{ $module['short_desc'] ?: $module['long_desc'] }}
        </p>
    </div>
</a>

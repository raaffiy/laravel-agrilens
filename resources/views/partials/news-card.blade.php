{{-- Partial: resources/views/partials/news-card.blade.php --}}
@php
    $rawImg = $news['image'] ?? '/assets/menanam/cabai.png';
    $imgSrc = str_starts_with($rawImg, 'http') ? $rawImg : asset(ltrim($rawImg, '/'));
@endphp

<div class="bg-black/40 border border-green-500/30 hover:border-green-400 shadow-xl rounded-3xl overflow-hidden hover:-translate-y-2 transition transform duration-300 backdrop-blur-xl flex flex-col justify-between h-full group">
    <div>
        <!-- Gambar Thumbnail Berita -->
        <div class="relative w-full h-52 overflow-hidden bg-slate-950 flex-shrink-0">
            <img src="{{ $imgSrc }}" 
                 class="w-full h-full object-cover transition duration-500 group-hover:scale-105" 
                 alt="{{ $news['title'] }}"
                 onerror="this.onerror=null;this.src='https://placehold.co/600x400/1e293b/4ade80?text=AgriLens+News';" />
            
            <div class="absolute top-4 left-4 z-10">
                <x-badge :category="$news['category']">{{ $news['category'] }}</x-badge>
            </div>
        </div>

        <!-- Konten Berita -->
        <div class="p-6 md:p-7">
            <h3 class="text-xl font-bold text-white mb-3 line-clamp-2 hover:text-green-400 transition leading-snug">
                <a href="{{ route('news.detail', ['id' => $news['id']]) }}">
                    {{ $news['title'] }}
                </a>
            </h3>

            <p class="text-gray-300 text-sm line-clamp-3 leading-relaxed">
                {{ $news['long_desc'] }}
            </p>
        </div>
    </div>

    <!-- Footer Kartu Berita -->
    <div class="px-6 md:px-7 pb-6 pt-4 border-t border-white/10 flex items-center justify-between text-xs text-gray-400 mt-auto">
        <span>📅 {{ \Carbon\Carbon::parse($news['post_date'])->translatedFormat('d F Y') }}</span>
        <a href="{{ route('news.detail', ['id' => $news['id']]) }}" class="text-green-400 font-bold hover:underline hover:text-green-300 transition">
            Baca Selengkapnya →
        </a>
    </div>
</div>

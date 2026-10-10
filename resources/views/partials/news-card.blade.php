{{-- Partial: resources/views/partials/news-card.blade.php --}}
<div class="bg-black/40 border border-green-500/30 hover:border-green-400 shadow-xl rounded-3xl overflow-hidden hover:-translate-y-2 transition transform duration-300 backdrop-blur-xl flex flex-col justify-between">
    <div>
        <div class="relative w-full h-48 overflow-hidden bg-slate-950">
            <img src="{{ $news['image'] }}" 
                 class="w-full h-full object-cover transition duration-500 hover:scale-105" 
                 alt="{{ $news['title'] }}"
                 onerror="this.onerror=null;this.src='https://placehold.co/400x300/1e293b/4ade80?text=AgriLens+News';" />
            
            <div class="absolute top-3 left-3">
                <x-badge :category="$news['category']">{{ $news['category'] }}</x-badge>
            </div>
        </div>

        <div class="p-6">
            <h3 class="text-xl font-bold text-white mb-2 line-clamp-2 hover:text-green-400 transition">
                <a href="{{ route('news.detail', ['id' => $news['id']]) }}">
                    {{ $news['title'] }}
                </a>
            </h3>

            <p class="text-gray-300 text-sm line-clamp-3 leading-relaxed mb-4">
                {{ $news['long_desc'] }}
            </p>
        </div>
    </div>

    <div class="px-6 pb-6 pt-2 border-t border-white/10 flex items-center justify-between text-xs text-gray-400">
        <span>📅 {{ \Carbon\Carbon::parse($news['post_date'])->translatedFormat('d F Y') }}</span>
        <a href="{{ route('news.detail', ['id' => $news['id']]) }}" class="text-green-400 font-semibold hover:underline">
            Baca Selengkapnya →
        </a>
    </div>
</div>

@props([
    'category' => 'Umum',
])

@php
    $colorClasses = match ($category) {
        'Harga Pasar' => 'bg-emerald-600/90 text-white border-emerald-400/40',
        'Cuaca & Iklim' => 'bg-amber-600/90 text-white border-amber-400/40',
        'Hama dan Penyakit', 'Hama & Penyakit' => 'bg-rose-600/90 text-white border-rose-400/40',
        'Teknologi' => 'bg-sky-600/90 text-white border-sky-400/40',
        'Panduan Menanam' => 'bg-green-600/90 text-white border-green-400/40',
        'Panduan Membuat Pupuk' => 'bg-purple-600/90 text-white border-purple-400/40',
        default => 'bg-gray-600/90 text-white border-gray-400/40',
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center text-xs font-semibold px-3 py-1 rounded-full border shadow-sm {$colorClasses}"]) }}>
    {{ $slot->isEmpty() ? $category : $slot }}
</span>

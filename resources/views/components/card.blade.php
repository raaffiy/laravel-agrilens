@props([
    'hover' => true,
])

<div {{ $attributes->merge(['class' => 'h-full flex flex-col justify-between bg-slate-900/80 backdrop-blur-2xl border border-white/10 rounded-3xl p-8 md:p-10 shadow-2xl transition duration-300 ' . ($hover ? 'hover:border-emerald-400/50 hover:-translate-y-1 hover:shadow-emerald-500/10' : '')]) }}>
    {{ $slot }}
</div>

@props([
    'type' => 'info'
])

@php
    $typeClasses = [
        'success' => 'bg-emerald-950/80 border-emerald-500/50 text-emerald-200',
        'danger' => 'bg-red-950/80 border-red-500/50 text-red-200',
        'warning' => 'bg-amber-950/80 border-amber-500/50 text-amber-200',
        'info' => 'bg-blue-950/80 border-blue-500/50 text-blue-200',
    ][$type] ?? 'bg-slate-900 border-white/20 text-white';

    $icon = [
        'success' => '✅',
        'danger' => '⚠️',
        'warning' => '⚡',
        'info' => 'ℹ️',
    ][$type] ?? '📢';
@endphp

<div class="border rounded-2xl p-4 my-3 shadow-lg flex items-start gap-3 backdrop-blur-md {{ $typeClasses }}">
    <span class="text-xl shrink-0">{{ $icon }}</span>
    <div class="flex-1 text-sm leading-relaxed">
        {{ $slot }}
    </div>
</div>

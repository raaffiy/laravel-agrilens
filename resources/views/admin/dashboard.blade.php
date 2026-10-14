@extends('layouts.app')

@section('title', 'Admin Dashboard CRUD - AgriLens')

@section('content')
<main class="container mx-auto px-4 md:px-6 py-8 max-w-7xl">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8 bg-black/40 backdrop-blur-xl border border-emerald-500/30 p-6 md:p-8 rounded-3xl shadow-2xl">
        <div>
            <div class="inline-flex items-center gap-2 bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-2">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                Admin Panel • CRUD Database
            </div>
            <h1 class="text-2xl md:text-4xl font-extrabold text-white">
                Dashboard Manajemen <span class="text-emerald-400">Modul Edukasi Pertanian</span>
            </h1>
            <p class="text-gray-300 text-xs md:text-sm mt-1">
                Kelola data katalog modul edukasi secara penuh (Tambah, Lihat, Perbarui, dan Hapus).
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.modules.create') }}" 
               class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black px-6 py-3 rounded-2xl transition shadow-lg shadow-emerald-500/20 flex items-center gap-2 text-sm active:scale-95">
                <span>➕</span> Tambah Modul Baru
            </a>
            <a href="{{ route('module.index') }}" 
               class="bg-white/10 hover:bg-white/20 text-white font-bold px-5 py-3 rounded-2xl transition border border-white/10 text-sm">
                Lihat Katalog
            </a>
        </div>
    </div>

    <!-- Flash Notification Success -->
    @if (session('success'))
        <div class="mb-6">
            <x-alert type="success">
                <div class="flex items-center justify-between w-full">
                    <span><strong>Berhasil:</strong> {{ session('success') }}</span>
                </div>
            </x-alert>
        </div>
    @endif

    <!-- Metric Stat Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <div class="bg-black/40 backdrop-blur-xl border border-white/10 rounded-2xl p-5 shadow-xl">
            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Modul Edukasi</span>
            <p class="text-3xl font-extrabold text-emerald-400 mt-1">{{ $totalModul }}</p>
            <span class="text-[11px] text-gray-400">Tersimpan di tabel `moduls`</span>
        </div>
        <div class="bg-black/40 backdrop-blur-xl border border-white/10 rounded-2xl p-5 shadow-xl">
            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Kategori</span>
            <p class="text-3xl font-extrabold text-blue-400 mt-1">{{ $totalKategori }}</p>
            <span class="text-[11px] text-gray-400">Relasi foreign key `kategoris`</span>
        </div>
        <div class="bg-black/40 backdrop-blur-xl border border-white/10 rounded-2xl p-5 shadow-xl">
            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Publikasi Berita</span>
            <p class="text-3xl font-extrabold text-amber-400 mt-1">{{ $totalBerita }}</p>
            <span class="text-[11px] text-gray-400">Tersimpan di tabel `beritas`</span>
        </div>
    </div>

    <!-- Filter Kategori & Data Table -->
    <div class="bg-black/40 backdrop-blur-xl border border-white/10 rounded-3xl shadow-2xl overflow-hidden">
        
        <!-- Toolbar Filter Kategori -->
        <div class="p-6 border-b border-white/10 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-2 flex-wrap">
                <span class="text-xs font-bold text-gray-400 mr-2">Filter Kategori:</span>
                <a href="{{ route('admin.dashboard') }}" 
                   class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ !$selectedCategory ? 'bg-emerald-500 text-slate-950 font-black' : 'bg-slate-900/80 text-gray-300 hover:text-white border border-white/10' }}">
                    Semua ({{ $totalModul }})
                </a>
                @foreach ($categories as $cat)
                    <a href="{{ route('admin.dashboard', ['kategori' => $cat->slug]) }}" 
                       class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ $selectedCategory === $cat->slug ? 'bg-emerald-500 text-slate-950 font-black' : 'bg-slate-900/80 text-gray-300 hover:text-white border border-white/10' }}">
                        {{ $cat->nama_kategori }} ({{ $cat->moduls_count }})
                    </a>
                @endforeach
            </div>
            <div class="text-xs text-gray-400">
                Menampilkan <strong>{{ $modules->count() }}</strong> modul data
            </div>
        </div>

        <!-- Tabel CRUD Modul -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-300">
                <thead class="bg-slate-950/80 text-xs uppercase font-extrabold text-gray-400 tracking-wider border-b border-white/10">
                    <tr>
                        <th class="py-4 px-6 text-center w-16">ID</th>
                        <th class="py-4 px-6">Informasi Modul</th>
                        <th class="py-4 px-6">Kategori & Kesulitan</th>
                        <th class="py-4 px-6">Estimasi Panen</th>
                        <th class="py-4 px-6">Tanggal Rilis</th>
                        <th class="py-4 px-6 text-center w-48">Aksi CRUD</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse ($modules as $m)
                        <tr class="hover:bg-white/[0.03] transition">
                            <td class="py-4 px-6 text-center font-mono font-bold text-gray-400">
                                #{{ $m->id }}
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-slate-900 border border-white/10 overflow-hidden shrink-0 flex items-center justify-center text-lg">
                                        @if ($m->image && str_starts_with($m->image, '/assets'))
                                            <img src="{{ asset($m->image) }}" alt="{{ $m->title }}" class="w-full h-full object-cover">
                                        @else
                                            🌱
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white hover:text-emerald-400 transition">
                                            <a href="{{ route('module.detail', ['id' => $m->id]) }}">{{ $m->title }}</a>
                                        </h4>
                                        <p class="text-xs text-gray-400 line-clamp-1 mt-0.5">{{ $m->short_desc }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex flex-col gap-1 items-start">
                                    <x-badge :category="$m->category">{{ $m->category }}</x-badge>
                                    <span class="text-[10px] text-gray-400 bg-white/5 px-2 py-0.5 rounded-full">
                                        Tingkat: <strong class="text-emerald-400">{{ $m->difficulty }}</strong>
                                    </span>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-semibold text-white">
                                ⏱️ {{ $m->harvest_days }} Hari
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-400">
                                📅 {{ \Carbon\Carbon::parse($m->published_at)->translatedFormat('d M Y') }}
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Tombol View Detail -->
                                    <a href="{{ route('module.detail', ['id' => $m->id]) }}" 
                                       target="_blank"
                                       title="Lihat Tampilan Publik"
                                       class="p-2 bg-blue-500/10 hover:bg-blue-500 text-blue-400 hover:text-white rounded-xl transition border border-blue-500/20 text-xs font-bold">
                                        👁️
                                    </a>

                                    <!-- Tombol Edit (Update) -->
                                    <a href="{{ route('admin.modules.edit', ['id' => $m->id]) }}" 
                                       title="Edit Data Modul"
                                       class="p-2 bg-amber-500/10 hover:bg-amber-500 text-amber-400 hover:text-slate-950 rounded-xl transition border border-amber-500/20 text-xs font-bold">
                                        ✏️ Edit
                                    </a>

                                    <!-- Tombol Hapus (Delete) -->
                                    <form action="{{ route('admin.modules.destroy', ['id' => $m->id]) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus modul {{ addslashes($m->title) }}? Data akan dihapus permanen dari database.')"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                title="Hapus Modul"
                                                class="p-2 bg-red-500/10 hover:bg-red-500 text-red-400 hover:text-white rounded-xl transition border border-red-500/20 text-xs font-bold">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-12 text-gray-400">
                                Belum ada data modul pada kategori ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</main>
@endsection

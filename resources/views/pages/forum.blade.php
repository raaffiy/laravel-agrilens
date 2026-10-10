@extends('layouts.app')

@section('title', 'Forum Komunitas Petani - AgriLens')

@section('content')
<main class="container mx-auto px-6 py-12 max-w-5xl">

    <!-- Hero Section -->
    <div class="text-center mb-12">
        <div class="bg-black/40 backdrop-blur-xl p-10 md:p-14 rounded-3xl shadow-2xl border border-white/10">
            <span class="text-xs bg-green-500/20 text-green-300 px-4 py-1.5 rounded-full border border-green-500/30 uppercase font-bold tracking-wider">
                Ruang Diskusi & Konsultasi
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mt-4">
                💬 Forum Komunitas <span class="text-green-400">AgriLens</span>
            </h1>
            <p class="mt-4 text-gray-300 max-w-2xl mx-auto text-base md:text-lg leading-relaxed">
                Tempat bertukar pengalaman, berdiskusi teknik bercocok tanam, dan berkonsultasi seputar masalah hama dan penyakit tanaman.
            </p>
        </div>
    </div>

    <!-- Bar Aksi / Tambah Diskusi -->
    <div class="flex justify-between items-center mb-8 flex-wrap gap-4">
        <div>
            <h2 class="text-2xl font-bold text-white">Topik Diskusi Terkini</h2>
            <p class="text-gray-400 text-sm">Menampilkan {{ count($discussions) }} pertanyaan dari para petani</p>
        </div>

        <button type="button" 
                onclick="document.getElementById('modal-post').classList.remove('hidden')"
                class="bg-green-600 hover:bg-green-500 text-white font-bold px-6 py-3 rounded-2xl transition duration-300 transform hover:scale-105 shadow-lg shadow-green-600/30 inline-flex items-center gap-2">
            <span>✏️</span> Ajukan Pertanyaan Baru
        </button>
    </div>

    {{-- Daftar Diskusi (Directive @forelse & @if) --}}
    <div class="space-y-6">
        @forelse ($discussions as $disc)
            <div class="bg-black/40 backdrop-blur-xl border border-white/10 hover:border-green-500/40 rounded-3xl p-6 md:p-8 shadow-xl transition">
                <!-- Info Penanya & Waktu -->
                <div class="flex items-start justify-between gap-4 mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-11 h-11 rounded-full bg-gradient-to-tr from-green-600 to-emerald-400 flex items-center justify-center font-bold text-slate-950 text-base shadow-md">
                            {{ strtoupper(substr($disc['author'], 0, 1)) }}
                        </div>
                        <div>
                            <h3 class="font-bold text-white text-base md:text-lg leading-snug">
                                {{ $disc['author'] }}
                            </h3>
                            <span class="text-xs text-gray-400">🕒 {{ $disc['created_at'] }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-1.5 text-xs bg-slate-900/80 px-3 py-1.5 rounded-full border border-white/10 text-rose-400 font-semibold">
                        <span>❤️</span>
                        <span>{{ $disc['likes'] }} Suka</span>
                    </div>
                </div>

                <!-- Isi Pertanyaan -->
                <p class="text-gray-200 text-base md:text-lg leading-relaxed mb-6 font-medium">
                    "{{ $disc['content'] }}"
                </p>

                {{-- Jawaban / Solusi Tim Ahli (Directive @if) --}}
                @if (!empty($disc['answer']))
                    <div class="bg-emerald-950/40 border border-emerald-500/30 rounded-2xl p-5 md:p-6 mt-4">
                        <div class="flex items-center gap-2 mb-2 text-emerald-400 font-bold text-sm">
                            <span>✅</span>
                            <span>Tanggapan & Rekomendasi Ahli AgriLens:</span>
                        </div>
                        <p class="text-emerald-100/90 text-sm md:text-base leading-relaxed">
                            {{ $disc['answer'] }}
                        </p>
                    </div>
                @else
                    <div class="text-xs text-amber-300/80 bg-amber-950/30 border border-amber-500/20 px-4 py-2 rounded-xl mt-4 inline-block">
                        ⏳ Menunggu tanggapan dari penyuluh atau komunitas...
                    </div>
                @endif
            </div>
        @empty
            <div class="text-center py-16 bg-black/30 rounded-3xl border border-white/10 text-gray-400">
                <p class="text-lg">Belum ada diskusi komunitas saat ini. Jadilah yang pertama bertanya!</p>
            </div>
        @endforelse
    </div>

    <!-- Modal Buat Pertanyaan (Simulasi Interaktif) -->
    <div id="modal-post" class="hidden fixed inset-0 z-50 bg-black/80 backdrop-blur-md flex items-center justify-center p-6">
        <div class="bg-slate-900 border border-green-500/40 rounded-3xl max-w-lg w-full p-8 shadow-2xl relative">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">Ajukan Pertanyaan ke Komunitas</h3>
                <button type="button" 
                        onclick="document.getElementById('modal-post').classList.add('hidden')"
                        class="text-gray-400 hover:text-white text-2xl">
                    ✕
                </button>
            </div>

            <form onsubmit="event.preventDefault(); alert('Pertanyaan Anda telah berhasil dikirimkan!'); document.getElementById('modal-post').classList.add('hidden');">
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-300 mb-2">Nama atau Kelompok Tani</label>
                    <input type="text" 
                           placeholder="Contoh: Pak Budi (Gapoktan Makmur)" 
                           class="w-full bg-slate-950 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-green-400" 
                           required>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-300 mb-2">Isi Pertanyaan / Topik Diskusi</label>
                    <textarea rows="4" 
                              placeholder="Tuliskan kendala tanaman, pertanyaan seputar pupuk, hama, atau teknik tanam..." 
                              class="w-full bg-slate-950 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-green-400" 
                              required></textarea>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" 
                            onclick="document.getElementById('modal-post').classList.add('hidden')"
                            class="px-5 py-2.5 rounded-xl text-gray-400 hover:text-white text-sm">
                        Batal
                    </button>
                    <button type="submit" 
                            class="bg-green-600 hover:bg-green-500 text-white font-bold px-6 py-2.5 rounded-xl text-sm transition">
                        Kirim Pertanyaan 🚀
                    </button>
                </div>
            </form>
        </div>
    </div>

</main>
@endsection


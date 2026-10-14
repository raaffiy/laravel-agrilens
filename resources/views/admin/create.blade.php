@extends('layouts.app')

@section('title', 'Tambah Modul Edukasi Baru - Admin AgriLens')

@section('content')
<main class="container mx-auto px-4 md:px-6 py-10 max-w-4xl">

    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" 
           class="inline-flex items-center gap-2 text-sm font-bold text-emerald-400 hover:text-emerald-300 transition">
            ← Kembali ke Dashboard Admin
        </a>
    </div>

    <!-- Card Form Tambah Modul -->
    <div class="bg-black/50 backdrop-blur-xl border border-emerald-500/30 rounded-3xl p-8 md:p-12 shadow-2xl">
        <div class="mb-8 border-b border-white/10 pb-6">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-400 bg-emerald-500/10 px-3 py-1 rounded-full border border-emerald-500/20">
                CREATE OPERATION
            </span>
            <h1 class="text-2xl md:text-3xl font-black text-white mt-3">
                Tambah Modul <span class="text-emerald-400">Edukasi Pertanian</span>
            </h1>
            <p class="text-gray-400 text-xs md:text-sm mt-1">
                Lengkapi formulir di bawah ini untuk menyimpan modul budidaya tanaman atau pupuk ke database MySQL.
            </p>
        </div>

        @if ($errors->any())
            <div class="mb-6">
                <x-alert type="danger">
                    <div>
                        <strong class="font-bold">Terdapat kesalahan pengisian formulir:</strong>
                        <ul class="list-disc list-inside mt-1 text-xs">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                </x-alert>
            </div>
        @endif

        <form action="{{ route('admin.modules.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- 1. Kategori & Tingkat Kesulitan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                        Kategori Modul <span class="text-red-400">*</span>
                    </label>
                    <select name="kategori_id" 
                            class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3.5 text-white text-sm focus:outline-none focus:border-emerald-400" 
                            required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('kategori_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                        Tingkat Kesulitan <span class="text-red-400">*</span>
                    </label>
                    <select name="difficulty" 
                            class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3.5 text-white text-sm focus:outline-none focus:border-emerald-400" 
                            required>
                        <option value="Pemula" {{ old('difficulty') === 'Pemula' ? 'selected' : '' }}>Pemula</option>
                        <option value="Menengah" {{ old('difficulty') === 'Menengah' ? 'selected' : '' }}>Menengah</option>
                        <option value="Mahir" {{ old('difficulty') === 'Mahir' ? 'selected' : '' }}>Mahir</option>
                    </select>
                </div>
            </div>

            <!-- 2. Judul Modul -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                    Judul Modul Panduan <span class="text-red-400">*</span>
                </label>
                <input type="text" 
                       name="title" 
                       value="{{ old('title') }}" 
                       placeholder="Contoh: Panduan Menanam Bawang Merah Organik" 
                       class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3.5 text-white text-sm focus:outline-none focus:border-emerald-400" 
                       required>
            </div>

            <!-- 3. Path / URL Gambar & Estimasi Hari Panen -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                        URL / Path Gambar Modul
                    </label>
                    <input type="text" 
                           name="image" 
                           value="{{ old('image', '/assets/menanam/padi.png') }}" 
                           placeholder="/assets/menanam/cabai.png" 
                           class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3.5 text-white text-sm focus:outline-none focus:border-emerald-400">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                        Estimasi Masa Panen (Hari) <span class="text-red-400">*</span>
                    </label>
                    <input type="number" 
                           name="harvest_days" 
                           value="{{ old('harvest_days', 75) }}" 
                           min="1" 
                           max="999" 
                           class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3.5 text-white text-sm focus:outline-none focus:border-emerald-400" 
                           required>
                </div>
            </div>

            <!-- 4. Tanggal Publikasi -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                    Tanggal Publikasi <span class="text-red-400">*</span>
                </label>
                <input type="date" 
                       name="published_at" 
                       value="{{ old('published_at', date('Y-m-d')) }}" 
                       class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3.5 text-white text-sm focus:outline-none focus:border-emerald-400" 
                       required>
            </div>

            <!-- 5. Ringkasan Singkat -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                    Ringkasan Singkat (Short Description) <span class="text-red-400">*</span>
                </label>
                <textarea name="short_desc" 
                          rows="2" 
                          placeholder="Ringkasan 1-2 kalimat untuk kartu modul..." 
                          class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-400" 
                          required>{{ old('short_desc') }}</textarea>
            </div>

            <!-- 6. Deskripsi Lengkap -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                    Deskripsi Lengkap Materi <span class="text-red-400">*</span>
                </label>
                <textarea name="long_desc" 
                          rows="4" 
                          placeholder="Penjelasan komprehensif mengenai teknik budidaya..." 
                          class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-400" 
                          required>{{ old('long_desc') }}</textarea>
            </div>

            <!-- 7. Manfaat Budidaya -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                    Manfaat & Keunggulan (Gunakan bullet point • per baris)
                </label>
                <textarea name="benefits" 
                          rows="3" 
                          placeholder="• Nilai ekonomis tinggi&#10;• Cocok untuk lahan sempit pekarangan" 
                          class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-400">{{ old('benefits') }}</textarea>
            </div>

            <!-- 8. Langkah Menanam -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                    Langkah-Langkah Menanam (Gunakan penomoran 1, 2, 3 per baris)
                </label>
                <textarea name="planting_steps" 
                          rows="4" 
                          placeholder="1. Siapkan media tanam gembur&#10;2. Semai bibit selama 14 hari&#10;3. Pindah tanam ke pot besar" 
                          class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-400">{{ old('planting_steps') }}</textarea>
            </div>

            <!-- 9. Tips Perawatan -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                    Tips Perawatan & Pengendalian Hama
                </label>
                <textarea name="care_tips" 
                          rows="2" 
                          placeholder="• Siram setiap pagi secara teratur&#10;• Berikan pupuk organik cair setiap 2 minggu" 
                          class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-emerald-400">{{ old('care_tips') }}</textarea>
            </div>

            <!-- Tombol Submit -->
            <div class="flex items-center justify-end gap-4 pt-6 border-t border-white/10">
                <a href="{{ route('admin.dashboard') }}" 
                   class="px-6 py-3 rounded-2xl font-bold text-gray-400 hover:text-white transition text-sm">
                    Batal
                </a>
                <button type="submit" 
                        class="bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black px-8 py-3.5 rounded-2xl transition shadow-lg shadow-emerald-500/20 text-sm active:scale-95">
                    💾 Simpan Modul ke Database
                </button>
            </div>
        </form>
    </div>

</main>
@endsection

@extends('layouts.app')

@section('title', 'AgriLens AI - Deteksi Kesehatan Tanaman & Tanah')

@section('content')
<main class="container mx-auto px-6 py-12 max-w-4xl">

    <!-- Hero Section -->
    <div class="text-center mb-12">
        <div class="bg-black/40 backdrop-blur-xl p-10 md:p-14 rounded-3xl shadow-2xl border border-white/10">
            <span class="text-xs bg-green-500/20 text-green-300 px-4 py-1.5 rounded-full border border-green-500/30 uppercase font-bold tracking-wider">
                Artificial Intelligence Pertanian
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mt-4">
                🔍 AgriLens <span class="text-green-400">Lens AI</span>
            </h1>
            <p class="mt-4 text-gray-300 max-w-2xl mx-auto text-base md:text-lg leading-relaxed">
                Unggah foto daun tanaman atau sampel tanah Anda. Model cerdas kami akan menganalisis kondisi kesehatan, mendiagnosis hama & penyakit, serta merekomendasikan solusi perawatan.
            </p>
        </div>
    </div>

    <!-- Kotak Analisis AI Interaktif -->
    <div class="bg-black/50 backdrop-blur-xl border border-green-500/30 rounded-3xl p-8 md:p-12 shadow-2xl">
        
        <!-- Area Unggah / Upload Box -->
        <div class="mb-8">
            <label class="block text-sm font-semibold text-gray-300 mb-3">Foto Tanaman atau Sampel Tanah</label>
            
            <div id="drop-zone" 
                 class="border-2 border-dashed border-green-500/40 hover:border-green-400 rounded-3xl p-8 text-center cursor-pointer bg-slate-900/40 transition flex flex-col items-center justify-center min-h-[220px]">
                <input type="file" id="image-input" accept="image/*" class="hidden">
                
                <div id="upload-prompt" class="space-y-3">
                    <div class="text-5xl">📷</div>
                    <div class="text-white font-bold text-base md:text-lg">Klik atau Seret Foto ke Sini</div>
                    <p class="text-gray-400 text-xs md:text-sm max-w-sm">Mendukung format JPG, PNG, atau WEBP (Maksimal 5MB)</p>
                </div>

                <!-- Preview Gambar -->
                <div id="preview-wrapper" class="hidden relative max-w-xs mx-auto">
                    <img id="image-preview" src="#" alt="Preview" class="rounded-2xl max-h-64 object-cover shadow-lg border border-white/20">
                    <button type="button" id="btn-remove-img" class="absolute -top-3 -right-3 bg-rose-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-sm font-bold shadow-md hover:bg-rose-500">
                        ✕
                    </button>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi Analisis -->
        <div class="text-center mb-10">
            <button type="button" 
                    id="btn-analyze"
                    class="bg-green-600 hover:bg-green-500 text-white font-extrabold px-10 py-4 rounded-2xl text-lg transition duration-300 transform hover:scale-105 shadow-xl shadow-green-600/30 inline-flex items-center gap-3">
                <span>⚡</span>
                <span id="btn-analyze-text">Mulai Analisis Cerdas</span>
            </button>
        </div>

        <!-- Indikator Loading -->
        <div id="ai-loading" class="hidden text-center py-8">
            <div class="inline-block w-12 h-12 border-4 border-green-500/20 border-t-green-500 rounded-full animate-spin mb-4"></div>
            <p class="text-green-300 font-semibold animate-pulse text-sm">Sedang memindai tekstur daun dan mendiagnosis patogen...</p>
        </div>

        <!-- Kotak Hasil Analisis AI -->
        <div id="ai-result" class="hidden border border-green-400/40 bg-emerald-950/30 rounded-3xl p-6 md:p-8 shadow-xl">
            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-white/10">
                <span class="text-2xl">🌱</span>
                <div>
                    <h3 class="text-xl font-bold text-white">Hasil Diagnosis AgriLens AI</h3>
                    <span class="text-xs text-green-400 font-medium">Model Status: Terverifikasi & Rekomendasi Siap</span>
                </div>
            </div>

            <div id="result-content" class="text-gray-200 text-sm md:text-base leading-relaxed space-y-4">
                <!-- Konten dinamis disisipkan via JavaScript -->
            </div>
        </div>

        <!-- Panduan Penggunaan Singkat -->
        <div class="mt-12 pt-8 border-t border-white/10 grid grid-cols-1 md:grid-cols-3 gap-6 text-center text-xs text-gray-400">
            <div class="p-4 bg-slate-900/40 rounded-2xl border border-white/5">
                <span class="text-lg block mb-1">📸 1. Foto Jelas</span>
                Pastikan objek daun atau tanah memiliki pencahayaan cukup dan fokus tajam.
            </div>
            <div class="p-4 bg-slate-900/40 rounded-2xl border border-white/5">
                <span class="text-lg block mb-1">🤖 2. Deteksi Cepat</span>
                Kecerdasan buatan membaca pola klorosis, bercak jamur, atau jenis kelembapan tanah.
            </div>
            <div class="p-4 bg-slate-900/40 rounded-2xl border border-white/5">
                <span class="text-lg block mb-1">💊 3. Solusi Tepat</span>
                Dapatkan instruksi dosis pupuk atau pestisida nabati ramah lingkungan.
            </div>
        </div>

    </div>

</main>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropZone = document.getElementById('drop-zone');
        const input = document.getElementById('image-input');
        const uploadPrompt = document.getElementById('upload-prompt');
        const previewWrapper = document.getElementById('preview-wrapper');
        const previewImg = document.getElementById('image-preview');
        const btnRemove = document.getElementById('btn-remove-img');
        const btnAnalyze = document.getElementById('btn-analyze');
        const btnAnalyzeText = document.getElementById('btn-analyze-text');
        const aiLoading = document.getElementById('ai-loading');
        const aiResult = document.getElementById('ai-result');
        const resultContent = document.getElementById('result-content');

        let fileSelected = false;

        dropZone.addEventListener('click', (e) => {
            if (e.target !== btnRemove) {
                input.click();
            }
        });

        input.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                const file = this.files[0];
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    uploadPrompt.classList.add('hidden');
                    previewWrapper.classList.remove('hidden');
                    fileSelected = true;
                    aiResult.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        btnRemove.addEventListener('click', (e) => {
            e.stopPropagation();
            input.value = '';
            previewImg.src = '#';
            previewWrapper.classList.add('hidden');
            uploadPrompt.classList.remove('hidden');
            fileSelected = false;
            aiResult.classList.add('hidden');
        });

        btnAnalyze.addEventListener('click', function () {
            if (!fileSelected) {
                alert('Silakan pilih atau unggah foto tanaman/tanah terlebih dahulu!');
                return;
            }

            btnAnalyze.disabled = true;
            btnAnalyzeText.textContent = 'Menganalisis...';
            aiLoading.classList.remove('hidden');
            aiResult.classList.add('hidden');

            setTimeout(() => {
                aiLoading.classList.add('hidden');
                btnAnalyze.disabled = false;
                btnAnalyzeText.textContent = 'Mulai Analisis Cerdas';
                aiResult.classList.remove('hidden');

                resultContent.innerHTML = `
                    <div class="p-4 bg-slate-900/80 rounded-xl border border-white/10 mb-4">
                        <strong class="text-white block mb-1">Identifikasi Objek:</strong>
                        <p class="text-green-300">Tanaman Cabai (Capsicum annuum) - Terindikasi Gejala Antraknosa (Colletotrichum capsici) Fase Awal.</p>
                    </div>
                    <div class="p-4 bg-slate-900/80 rounded-xl border border-white/10 mb-4">
                        <strong class="text-white block mb-1">Tingkat Keparahan:</strong>
                        <span class="inline-block bg-amber-600/90 text-white text-xs font-bold px-3 py-1 rounded-full">Ringan - Sedang (20-30%)</span>
                    </div>
                    <div class="p-4 bg-slate-900/80 rounded-xl border border-white/10">
                        <strong class="text-white block mb-1">Rekomendasi Penanganan:</strong>
                        <ul class="list-disc list-inside space-y-1 text-gray-300 text-sm">
                            <li>Segera pangkas dan musnahkan bagian daun/buah yang memperlihatkan bercak hitam melingkar.</li>
                            <li>Semprotkan fungisida hayati berbasis <em>Trichoderma viride</em> pada pagi hari sebelum jam 09.00.</li>
                            <li>Atur jarak tanam dan pangkas gulma di sekitar pangkal batang untuk menurunkan kelembapan berlebih.</li>
                        </ul>
                    </div>
                `;
            }, 1800);
        });
    });
</script>
@endpush
@endsection

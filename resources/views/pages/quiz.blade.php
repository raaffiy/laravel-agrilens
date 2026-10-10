@extends('layouts.app')

@section('title', 'Kuis & Tantangan Pertanian - AgriLens')

@section('content')
<main class="container mx-auto px-6 py-12 max-w-4xl">

    <!-- Hero Section -->
    <div class="text-center mb-12">
        <div class="bg-black/40 backdrop-blur-xl p-10 md:p-14 rounded-3xl shadow-2xl border border-white/10">
            <span class="text-xs bg-green-500/20 text-green-300 px-4 py-1.5 rounded-full border border-green-500/30 uppercase font-bold tracking-wider">
                Uji Kompetensi Tani
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mt-4">
                🌾 Kuis & Tantangan <span class="text-green-400">AgriLens</span>
            </h1>
            <p class="mt-4 text-gray-300 max-w-2xl mx-auto text-base md:text-lg leading-relaxed">
                Tantang wawasan pertanian Anda seputar agronomi, nutrisi tanah, pupuk organik, dan teknik budidaya modern.
            </p>
        </div>
    </div>

    <!-- Arena Kuis Dinamis -->
    <div id="quiz-container" class="bg-black/50 backdrop-blur-xl border border-green-500/30 rounded-3xl p-8 md:p-12 shadow-2xl">
        
        <!-- Layar Mulai (Start Screen) -->
        <div id="quiz-intro" class="text-center py-6">
            <div class="text-6xl mb-6">🏆</div>
            <h2 class="text-3xl font-bold text-white mb-4">Siap Menguji Pengetahuan?</h2>
            <p class="text-gray-300 max-w-md mx-auto mb-8 text-sm md:text-base">
                Terdapat <span class="text-green-400 font-bold">{{ count($questions) }} soal</span> pilihan ganda. 
                Pilih jawaban yang paling tepat sebelum batas waktu habis!
            </p>
            <button id="btn-start" 
                    type="button"
                    class="bg-green-600 hover:bg-green-500 text-white font-extrabold px-10 py-4 rounded-2xl text-lg transition duration-300 transform hover:scale-105 shadow-xl shadow-green-600/30">
                Mulai Kuis Sekarang
            </button>
        </div>

        <!-- Layar Pengerjaan Soal (Question Screen) -->
        <div id="quiz-play" class="hidden">
            <!-- Header Status Soal & Timer -->
            <div class="flex justify-between items-center pb-6 border-b border-white/10 mb-8">
                <div>
                    <span class="text-xs uppercase tracking-wider text-gray-400 font-semibold">Nomor Soal</span>
                    <div class="text-2xl font-black text-white">
                        <span id="current-question-num" class="text-green-400">1</span> / {{ count($questions) }}
                    </div>
                </div>

                <!-- Timer Badge -->
                <div class="flex items-center gap-2 bg-slate-900/80 px-4 py-2 rounded-2xl border border-green-400/30">
                    <span class="text-lg">⏱️</span>
                    <span id="time-left" class="text-xl font-black text-green-400">15</span>
                    <span class="text-xs text-gray-400">detik</span>
                </div>
            </div>

            <!-- Kontainer Daftar Soal yang Dirender oleh Blade -->
            <div id="questions-wrapper">
                @foreach ($questions as $index => $q)
                    <div class="question-item {{ $loop->first ? '' : 'hidden' }}" data-index="{{ $index }}" data-correct="{{ $q['correct'] }}">
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-6 leading-relaxed">
                            {{ $q['question'] }}
                        </h3>

                        <div class="grid gap-4">
                            @foreach ($q['options'] as $optIdx => $optText)
                                <button type="button" 
                                        class="option-btn w-full text-left p-4 md:p-5 rounded-2xl border border-white/10 bg-slate-900/60 hover:bg-slate-800/80 text-gray-200 font-medium transition duration-200 flex items-center justify-between group cursor-pointer"
                                        data-option="{{ $optIdx }}">
                                    <span>{{ $optText }}</span>
                                    <span class="opacity-0 group-hover:opacity-100 transition text-green-400 text-sm font-bold">Pilih →</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Layar Hasil Akhir (Result Screen) -->
        <div id="quiz-result" class="hidden text-center py-6">
            <div id="result-icon" class="text-7xl mb-4">🌟</div>
            <h2 id="result-heading" class="text-3xl font-black text-white mb-2">Selesai!</h2>
            <p id="result-message" class="text-gray-300 mb-8 text-base"></p>

            <div class="bg-slate-900/70 border border-green-500/20 p-6 rounded-2xl max-w-sm mx-auto mb-8">
                <div class="text-sm text-gray-400 uppercase tracking-wider mb-1">Skor Anda</div>
                <div class="text-5xl font-black text-green-400">
                    <span id="final-score">0</span> / {{ count($questions) }}
                </div>
            </div>

            <div class="flex justify-center gap-4 flex-wrap">
                <button id="btn-restart" 
                        type="button" 
                        class="bg-green-600 hover:bg-green-500 text-white font-bold px-8 py-3.5 rounded-2xl transition shadow-lg shadow-green-600/30">
                    Ulangi Kuis 🔄
                </button>
                <a href="{{ route('module.index') }}" 
                   class="bg-slate-800 hover:bg-slate-700 text-white font-bold px-8 py-3.5 rounded-2xl transition border border-white/10">
                    Pelajari Modul Tani 📚
                </a>
            </div>
        </div>

    </div>

</main>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btnStart = document.getElementById('btn-start');
        const btnRestart = document.getElementById('btn-restart');
        const introScreen = document.getElementById('quiz-intro');
        const playScreen = document.getElementById('quiz-play');
        const resultScreen = document.getElementById('quiz-result');
        const currentNumEl = document.getElementById('current-question-num');
        const timeLeftEl = document.getElementById('time-left');
        const finalScoreEl = document.getElementById('final-score');
        const resultMsgEl = document.getElementById('result-message');
        const questions = document.querySelectorAll('.question-item');
        const totalQuestions = questions.length;

        let currentIdx = 0;
        let score = 0;
        let timer = null;
        let timeLeft = 15;

        function startQuiz() {
            introScreen.classList.add('hidden');
            resultScreen.classList.add('hidden');
            playScreen.classList.remove('hidden');
            currentIdx = 0;
            score = 0;
            showQuestion(0);
        }

        function showQuestion(idx) {
            questions.forEach((q, i) => {
                q.classList.toggle('hidden', i !== idx);
                // Reset button states
                const btns = q.querySelectorAll('.option-btn');
                btns.forEach(b => {
                    b.disabled = false;
                    b.className = 'option-btn w-full text-left p-4 md:p-5 rounded-2xl border border-white/10 bg-slate-900/60 hover:bg-slate-800/80 text-gray-200 font-medium transition duration-200 flex items-center justify-between group cursor-pointer';
                });
            });

            currentNumEl.textContent = idx + 1;
            timeLeft = 15;
            timeLeftEl.textContent = timeLeft;
            clearInterval(timer);
            timer = setInterval(() => {
                timeLeft--;
                timeLeftEl.textContent = timeLeft;
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    handleAnswer(null, -1);
                }
            }, 1000);
        }

        function handleAnswer(clickedBtn, selectedOption) {
            clearInterval(timer);
            const currentQuestion = questions[currentIdx];
            const correctOption = parseInt(currentQuestion.dataset.correct);
            const allBtns = currentQuestion.querySelectorAll('.option-btn');

            allBtns.forEach(btn => {
                btn.disabled = true;
                const optVal = parseInt(btn.dataset.option);
                if (optVal === correctOption) {
                    btn.classList.remove('bg-slate-900/60', 'border-white/10');
                    btn.classList.add('bg-green-600/90', 'border-green-400', 'text-white');
                } else if (btn === clickedBtn) {
                    btn.classList.remove('bg-slate-900/60', 'border-white/10');
                    btn.classList.add('bg-rose-600/90', 'border-rose-400', 'text-white');
                }
            });

            if (selectedOption === correctOption) {
                score++;
            }

            setTimeout(() => {
                currentIdx++;
                if (currentIdx < totalQuestions) {
                    showQuestion(currentIdx);
                } else {
                    finishQuiz();
                }
            }, 1200);
        }

        function finishQuiz() {
            playScreen.classList.add('hidden');
            resultScreen.classList.remove('hidden');
            finalScoreEl.textContent = score;

            if (score === totalQuestions) {
                resultMsgEl.textContent = 'Luar Biasa! Pemahaman pertanian Anda sempurna bagaikan master agronomis! 🌟';
            } else if (score >= Math.ceil(totalQuestions / 2)) {
                resultMsgEl.textContent = 'Bagus sekali! Wawasan pertanian Anda sudah sangat solid. Terus tingkatkan! 🌱';
            } else {
                resultMsgEl.textContent = 'Tetap semangat! Pelajari kembali materi modul edukasi kami untuk hasil lebih optimal. 📚';
            }
        }

        // Event listener options
        questions.forEach(q => {
            const btns = q.querySelectorAll('.option-btn');
            btns.forEach(btn => {
                btn.addEventListener('click', function () {
                    const opt = parseInt(this.dataset.option);
                    handleAnswer(this, opt);
                });
            });
        });

        if (btnStart) btnStart.addEventListener('click', startQuiz);
        if (btnRestart) btnRestart.addEventListener('click', startQuiz);
    });
</script>
@endpush
@endsection

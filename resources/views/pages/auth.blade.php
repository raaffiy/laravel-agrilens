@extends('layouts.app')

@section('title', 'Masuk / Autentikasi Pengguna - AgriLens')

@section('content')
<main class="container mx-auto px-6 py-16 max-w-md">

    <!-- Card Autentikasi -->
    <div class="bg-black/50 backdrop-blur-xl border border-green-500/40 rounded-3xl p-8 md:p-10 shadow-2xl">
        
        <!-- Header Brand -->
        <div class="text-center mb-8">
            <div class="text-5xl mb-3">🌿</div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">
                <span class="text-green-400">Agri</span>Lens ID
            </h1>
            <p class="text-gray-400 text-sm mt-1">Portal Petani & Komunitas Agrikultur Cerdas</p>
        </div>

        <!-- Tab Switcher (Masuk / Daftar) -->
        <div class="flex bg-slate-900/80 p-1 rounded-2xl border border-white/10 mb-8">
            <button type="button" 
                    id="tab-login"
                    onclick="switchTab('login')"
                    class="flex-1 py-2.5 rounded-xl text-sm font-bold text-white bg-green-600 transition shadow">
                Masuk
            </button>
            <button type="button" 
                    id="tab-register"
                    onclick="switchTab('register')"
                    class="flex-1 py-2.5 rounded-xl text-sm font-bold text-gray-400 hover:text-white transition">
                Daftar Baru
            </button>
        </div>

        <!-- Form Login -->
        <form id="form-login" onsubmit="event.preventDefault(); alert('Login berhasil sebagai Demo Petani!'); window.location.href = '{{ route('home') }}';">
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">Alamat Email</label>
                    <input type="email" 
                           placeholder="petani@agrilens.id" 
                           value="petani@agrilens.id"
                           class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-green-400" 
                           required>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-xs font-semibold uppercase tracking-wider text-gray-300">Kata Sandi</label>
                        <a href="#" onclick="alert('Instruksi pemulihan kata sandi telah dikirimkan ke email Anda.'); return false;" class="text-xs text-green-400 hover:underline">Lupa Sandi?</a>
                    </div>
                    <input type="password" 
                           value="password123"
                           placeholder="••••••••" 
                           class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-green-400" 
                           required>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                            class="w-full bg-green-600 hover:bg-green-500 text-white font-extrabold py-3.5 rounded-2xl text-base transition duration-300 shadow-xl shadow-green-600/30">
                        Masuk ke Akun
                    </button>
                </div>
            </div>
        </form>

        <!-- Form Register -->
        <form id="form-register" class="hidden" onsubmit="event.preventDefault(); alert('Registrasi berhasil! Silakan masuk dengan akun Anda.'); switchTab('login');">
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">Nama Lengkap / Kelompok</label>
                    <input type="text" 
                           placeholder="Nama Anda" 
                           class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-green-400" 
                           required>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">Alamat Email</label>
                    <input type="email" 
                           placeholder="email@domain.com" 
                           class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-green-400" 
                           required>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">Kata Sandi (Minimal 8 Karakter)</label>
                    <input type="password" 
                           placeholder="••••••••" 
                           minlength="8"
                           class="w-full bg-slate-950 border border-white/10 rounded-2xl px-4 py-3 text-white text-sm focus:outline-none focus:border-green-400" 
                           required>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                            class="w-full bg-green-600 hover:bg-green-500 text-white font-extrabold py-3.5 rounded-2xl text-base transition duration-300 shadow-xl shadow-green-600/30">
                        Daftar Akun Petani
                    </button>
                </div>
            </div>
        </form>

        <!-- Footer Card -->
        <div class="mt-8 pt-6 border-t border-white/10 text-center">
            <a href="{{ route('home') }}" class="text-xs text-gray-400 hover:text-white transition">
                ← Kembali ke Beranda AgriLens
            </a>
        </div>

    </div>

</main>

@push('scripts')
<script>
    function switchTab(type) {
        const tabLogin = document.getElementById('tab-login');
        const tabReg = document.getElementById('tab-register');
        const formLogin = document.getElementById('form-login');
        const formReg = document.getElementById('form-register');

        if (type === 'login') {
            tabLogin.className = 'flex-1 py-2.5 rounded-xl text-sm font-bold text-white bg-green-600 transition shadow';
            tabReg.className = 'flex-1 py-2.5 rounded-xl text-sm font-bold text-gray-400 hover:text-white transition';
            formLogin.classList.remove('hidden');
            formReg.classList.add('hidden');
        } else {
            tabReg.className = 'flex-1 py-2.5 rounded-xl text-sm font-bold text-white bg-green-600 transition shadow';
            tabLogin.className = 'flex-1 py-2.5 rounded-xl text-sm font-bold text-gray-400 hover:text-white transition';
            formReg.classList.remove('hidden');
            formLogin.classList.add('hidden');
        }
    }
</script>
@endpush
@endsection

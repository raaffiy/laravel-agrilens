<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AgriLens - Smart Agriculture for a Better Future')</title>
    
    <!-- Google Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        agri: {
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Custom Styling AgriLens -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0b1120;
            background-image: 
                radial-gradient(ellipse at 50% 10%, rgba(16, 185, 129, 0.12) 0%, transparent 60%),
                linear-gradient(to bottom, rgba(11, 17, 32, 0.82), rgba(11, 17, 32, 0.92)),
                url('{{ asset('assets/bg.png') }}');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            color: #e2e8f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .backdrop-blur-xl {
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
        }
        .backdrop-blur-2xl {
            backdrop-filter: blur(36px);
            -webkit-backdrop-filter: blur(36px);
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- Header & Menu Navigasi Modern (Menggunakan Named Routes) -->
    <header class="bg-slate-950/80 backdrop-blur-2xl sticky top-0 z-50 border-b border-emerald-500/20 shadow-2xl">
        <div class="max-w-7xl mx-auto px-6 py-3.5 flex justify-between items-center">
            <!-- Logo Brand -->
            <a href="{{ route('home') }}" class="text-2xl md:text-3xl font-extrabold text-white tracking-tight flex items-center gap-2.5 group">
                <span class="text-3xl group-hover:scale-110 transition transform">🌿</span>
                <span class="tracking-tight"><span class="text-emerald-400">Agri</span>Lens</span>
            </a>

            <!-- Desktop Navigation Menu (Floating Pills) -->
            <nav class="hidden lg:flex items-center space-x-1.5 bg-slate-900/70 border border-white/10 p-1.5 rounded-2xl backdrop-blur-xl shadow-inner">
                <a href="{{ route('home') }}" 
                   class="px-4 py-2 rounded-xl text-sm font-semibold transition duration-200 {{ request()->routeIs('home') ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    Beranda
                </a>
                <a href="{{ route('module.index') }}" 
                   class="px-4 py-2 rounded-xl text-sm font-semibold transition duration-200 {{ request()->routeIs('module.*') ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    Modul Edukasi
                </a>
                <a href="{{ route('news.index') }}" 
                   class="px-4 py-2 rounded-xl text-sm font-semibold transition duration-200 {{ request()->routeIs('news.*') ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    News
                </a>
                <a href="{{ route('quiz.index') }}" 
                   class="px-4 py-2 rounded-xl text-sm font-semibold transition duration-200 {{ request()->routeIs('quiz.*') ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    Kuis & Tantangan
                </a>
                <a href="{{ route('forum.index') }}" 
                   class="px-4 py-2 rounded-xl text-sm font-semibold transition duration-200 {{ request()->routeIs('forum.*') ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    Forum
                </a>
                <a href="{{ route('lens.ai') }}" 
                   class="px-4 py-2 rounded-xl text-sm font-semibold transition duration-200 flex items-center gap-1.5 {{ request()->routeIs('lens.ai') ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 shadow-sm' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                    <span class="text-[10px] uppercase font-black bg-gradient-to-r from-emerald-400 to-green-500 text-slate-950 px-1.5 py-0.5 rounded shadow-sm">AI</span>
                    <span>Lens AI</span>
                </a>
            </nav>

            <!-- Tombol Login / Masuk (Desktop) -->
            <div class="hidden lg:block">
                <a href="{{ route('auth.login') }}" 
                   class="bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-400 hover:to-green-500 text-white font-bold py-2.5 px-6 rounded-xl transition duration-300 transform hover:scale-105 shadow-lg shadow-emerald-500/25 inline-flex items-center gap-2 text-sm">
                    <span>Masuk / Login</span>
                    <span>→</span>
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <button id="menu-toggle" type="button" class="lg:hidden text-white text-3xl focus:outline-none p-1.5 rounded-xl hover:bg-white/10" aria-label="Menu">
                ☰
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden bg-slate-950/95 backdrop-blur-2xl border-t border-emerald-500/20 px-6 py-5 flex flex-col space-y-2">
            <a href="{{ route('home') }}" class="px-4 py-2.5 rounded-xl font-medium {{ request()->routeIs('home') ? 'bg-emerald-500/20 text-emerald-400' : 'text-slate-300 hover:text-white' }}">Beranda</a>
            <a href="{{ route('module.index') }}" class="px-4 py-2.5 rounded-xl font-medium {{ request()->routeIs('module.*') ? 'bg-emerald-500/20 text-emerald-400' : 'text-slate-300 hover:text-white' }}">Modul Edukasi</a>
            <a href="{{ route('news.index') }}" class="px-4 py-2.5 rounded-xl font-medium {{ request()->routeIs('news.*') ? 'bg-emerald-500/20 text-emerald-400' : 'text-slate-300 hover:text-white' }}">News - AgriLens</a>
            <a href="{{ route('quiz.index') }}" class="px-4 py-2.5 rounded-xl font-medium {{ request()->routeIs('quiz.*') ? 'bg-emerald-500/20 text-emerald-400' : 'text-slate-300 hover:text-white' }}">Kuis & Tantangan</a>
            <a href="{{ route('forum.index') }}" class="px-4 py-2.5 rounded-xl font-medium {{ request()->routeIs('forum.*') ? 'bg-emerald-500/20 text-emerald-400' : 'text-slate-300 hover:text-white' }}">Forum Komunitas</a>
            <a href="{{ route('lens.ai') }}" class="px-4 py-2.5 rounded-xl font-medium {{ request()->routeIs('lens.ai') ? 'bg-emerald-500/20 text-emerald-400' : 'text-slate-300 hover:text-white' }}">Lens AI</a>
            <a href="{{ route('auth.login') }}" class="bg-gradient-to-r from-emerald-500 to-green-600 text-white font-bold py-3 px-6 text-center rounded-xl transition mt-3">Masuk / Login</a>
        </div>
    </header>

    {{-- Main Content Area (@yield) --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Sistem AgriLens -->
    <footer class="bg-slate-950/90 backdrop-blur-2xl border-t border-emerald-500/20 mt-28 py-12">
        <div class="max-w-7xl mx-auto px-6 text-center text-slate-400">
            <p class="text-2xl font-bold text-white flex items-center justify-center gap-2">
                <span>🌿</span> <span class="text-emerald-400">Agri</span>Lens
            </p>
            <p class="mt-2 text-slate-300 text-sm">Smart Agriculture for a Better Future</p>
            <div class="flex justify-center gap-6 mt-6 text-xs text-slate-400 flex-wrap">
                <a href="{{ route('home') }}" class="hover:text-emerald-400 transition">Beranda</a>
                <a href="{{ route('module.index') }}" class="hover:text-emerald-400 transition">Modul</a>
                <a href="{{ route('news.index') }}" class="hover:text-emerald-400 transition">Berita</a>
                <a href="{{ route('forum.index') }}" class="hover:text-emerald-400 transition">Forum</a>
                <a href="{{ route('quiz.index') }}" class="hover:text-emerald-400 transition">Kuis</a>
                <a href="{{ route('lens.ai') }}" class="hover:text-emerald-400 transition">Lens AI</a>
            </div>
            <p class="text-xs mt-8 opacity-60">&copy; {{ date('Y') }} AgriLens Project. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Script Hamburger Mobile -->
    <script>
        const toggleBtn = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        if (toggleBtn && mobileMenu) {
            toggleBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>

    @stack('scripts')
</body>
</html>

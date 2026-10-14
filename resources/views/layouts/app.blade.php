<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AgriLens')</title>
    
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
                }
            }
        }
    </script>

    <!-- Styling AgriLens -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #111827;
            background-image: url('{{ asset('assets/bg.png') }}');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            color: #e5e7eb;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .backdrop-blur-xl {
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Header / Navbar -->
    <header class="bg-black/30 backdrop-blur-xl sticky top-0 z-50 shadow-lg">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="text-3xl font-bold text-white flex items-center gap-1">
                <span>🌾</span> <span class="text-green-400">Agri</span>Lens
            </a>

            <!-- Desktop Menu (Named Routes) -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('module.index') }}" 
                   class="transition duration-300 {{ request()->routeIs('module.*') ? 'text-green-400 font-bold' : 'text-gray-300 hover:text-green-400' }}">
                    Module Edukasi
                </a>
                <a href="{{ route('news.index') }}" 
                   class="transition duration-300 {{ request()->routeIs('news.*') ? 'text-green-400 font-bold' : 'text-gray-300 hover:text-green-400' }}">
                    News - AgriLens
                </a>
                <a href="{{ route('quiz.index') }}" 
                   class="transition duration-300 {{ request()->routeIs('quiz.*') ? 'text-green-400 font-bold' : 'text-gray-300 hover:text-green-400' }}">
                    Quiz & Tantangan
                </a>
                <a href="{{ route('forum.index') }}" 
                   class="transition duration-300 {{ request()->routeIs('forum.*') ? 'text-green-400 font-bold' : 'text-gray-300 hover:text-green-400' }}">
                    Forum
                </a>
            </div>

            <!-- Tombol Dashboard (Desktop) -->
            <div class="hidden md:block">
                <a href="{{ route('admin.dashboard') }}" 
                   class="bg-emerald-500 hover:bg-emerald-400 text-slate-900 font-black py-2.5 px-7 rounded-2xl transition-all shadow-xl shadow-emerald-500/20 active:scale-95 flex items-center gap-2 text-sm">
                    <span>📊</span> Dashboard
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <button id="menu-toggle" type="button" class="md:hidden text-white text-3xl focus:outline-none" aria-label="Menu">
                ☰
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden backdrop-blur-xl md:hidden bg-black/80 border-t border-white/10">
            <div class="flex flex-col px-6 py-4 space-y-4">
                <a href="{{ route('module.index') }}" class="text-gray-300 hover:text-green-400 transition duration-300">Module Edukasi</a>
                <a href="{{ route('news.index') }}" class="text-gray-300 hover:text-green-400 transition duration-300">News - AgriLens</a>
                <a href="{{ route('quiz.index') }}" class="text-gray-300 hover:text-green-400 transition duration-300">Quiz & Tantangan</a>
                <a href="{{ route('forum.index') }}" class="text-gray-300 hover:text-green-400 transition duration-300">Forum</a>
                <a href="{{ route('admin.dashboard') }}" class="bg-emerald-500 hover:bg-emerald-400 text-slate-900 font-black py-3 px-6 text-center rounded-2xl transition-all flex items-center justify-center gap-2">
                    <span>📊</span> Dashboard
                </a>
            </div>
        </div>
    </header>

    {{-- Main Content Area (@yield) --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Sistem AgriLens -->
    <footer class="bg-black/50 mt-20">
        <div class="container mx-auto px-6 py-8 text-center text-gray-400">
            <p class="text-lg font-semibold text-white flex items-center justify-center gap-1">
                <span>🌾</span> <span class="text-green-400">Agri</span>Lens
            </p>
            <p class="mt-2 text-sm">Smart Agriculture for a Better Future</p>
            <p class="text-sm mt-4 opacity-70">&copy; {{ date('Y') }} AgriLens Project. All Rights Reserved.</p>
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

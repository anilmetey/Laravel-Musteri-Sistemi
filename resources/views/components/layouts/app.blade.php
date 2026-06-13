<!DOCTYPE html>
<html lang="tr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Premium Randevu Sistemi' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Dark Mode Initializer (Prevents Light Theme Flash) -->
    <script>
        function applyTheme() {
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
        // Apply immediately on first load
        applyTheme();
        
        // Apply after Livewire SPA navigation
        document.addEventListener('livewire:navigated', applyTheme);
    </script>

    <style>
        body { font-family: 'Outfit', sans-serif; }
        .animate-slide-rtl {
            animation: slideRtl 4s linear infinite;
        }
        @keyframes slideRtl {
            0% { background-position: 200% center; }
            100% { background-position: -200% center; }
        }
        .glow-hover {
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .glow-hover:hover {
            border-color: rgba(245, 158, 11, 0.4) !important;
            box-shadow: 0 20px 40px -15px rgba(245, 158, 11, 0.12) !important;
        }
        /* Custom Cursor styling */
        #custom-cursor {
            transition: left 0.1s ease-out, top 0.1s ease-out, transform 0.2s ease-out, background-color 0.2s ease-out, border-color 0.2s ease-out;
        }
    </style>
</head>
<body class="bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-200 antialiased min-h-screen flex flex-col relative overflow-x-hidden selection:bg-amber-500 selection:text-white transition-colors duration-300">

    <!-- Custom Cursor elements (visible on large screen) -->
    <div id="custom-cursor" class="fixed pointer-events-none w-8 h-8 rounded-full border border-amber-500/40 z-[9999] -translate-x-1/2 -translate-y-1/2 hidden lg:block"></div>
    <div id="custom-cursor-dot" class="fixed pointer-events-none w-1.5 h-1.5 rounded-full bg-amber-500 z-[9999] -translate-x-1/2 -translate-y-1/2 hidden lg:block"></div>

    <!-- Decorative background elements -->
    <div class="fixed inset-0 z-[-1] pointer-events-none bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-amber-50/40 via-slate-50 to-slate-50 dark:from-amber-950/20 dark:via-slate-950 dark:to-slate-950">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-amber-200/20 dark:bg-amber-500/5 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-blue-200/10 dark:bg-blue-500/5 rounded-full blur-[120px]"></div>
    </div>

    <!-- Header -->
    @if(request()->is('/'))
        <header class="w-full py-6 px-4 sm:px-6 lg:px-8 bg-transparent absolute top-0 z-50">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <a href="/" wire:navigate class="flex items-center gap-2 sm:gap-3 group cursor-pointer shrink-0">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-white font-bold text-lg sm:text-xl shadow-lg shadow-amber-500/20 transition-transform group-hover:scale-105">L</div>
                    <span class="text-lg sm:text-2xl font-semibold tracking-tight text-slate-900 dark:text-white">Luxe<span class="text-amber-500 font-light">Book</span></span>
                </a>
                <nav class="flex gap-3 sm:gap-6 items-center text-xs sm:text-sm font-bold text-slate-900 dark:text-white">
                    <a href="/hizmetlerimiz" wire:navigate class="relative group hover:text-amber-500 transition-colors duration-300">
                        Hizmetler
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-amber-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/uzmanlarimiz" wire:navigate class="relative group hover:text-amber-500 transition-colors duration-300">
                        Uzmanlar
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-amber-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/hediye-karti" wire:navigate class="relative group hover:text-amber-500 transition-colors duration-300">
                        Hediye Kartı
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-amber-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/iletisim" wire:navigate class="relative group hover:text-amber-500 transition-colors duration-300">
                        İletişim
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-amber-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <!-- Auth Links -->
                    @auth
                        <a href="{{ route('dashboard') }}" wire:navigate class="ml-2 px-4 py-2 bg-amber-500/20 text-amber-500 hover:bg-amber-500 hover:text-white rounded-lg transition-colors duration-300">
                            Hesabım
                        </a>
                    @else
                        <div class="ml-2 flex items-center gap-2">
                            <a href="{{ route('login') }}" wire:navigate class="px-4 py-2 text-slate-300 hover:text-amber-500 transition-colors duration-300 font-medium">
                                Giriş Yap
                            </a>
                            <a href="{{ route('register') }}" wire:navigate class="px-4 py-2 bg-amber-500 text-white hover:bg-amber-400 rounded-lg shadow-lg shadow-amber-500/20 transition-all duration-300 font-bold">
                                Kayıt Ol
                            </a>
                        </div>
                    @endauth
                    
                    <!-- Dark Mode Toggle -->
                    <button onclick="toggleTheme()" class="w-8 h-8 rounded-lg bg-white/10 backdrop-blur-md border border-white/20 text-slate-900 dark:text-amber-400 flex items-center justify-center hover:scale-105 transition-transform cursor-pointer">
                        <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707m12.728 12.728A9 9 0 115.636 5.636m12.728 12.728L12 12"></path></svg>
                        <svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    </button>
                </nav>
            </div>
        </header>
    @else
        <header class="w-full py-4 px-4 sm:px-6 lg:px-8 bg-white/90 dark:bg-slate-950/90 backdrop-blur-md border-b border-slate-100 dark:border-slate-800/80 sticky top-0 z-50 shadow-sm transition-colors duration-300">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <a href="/" wire:navigate class="flex items-center gap-2 sm:gap-3 group cursor-pointer shrink-0">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-white font-bold text-lg sm:text-xl shadow-lg shadow-amber-500/20 transition-transform group-hover:scale-105">L</div>
                    <span class="text-lg sm:text-2xl font-semibold tracking-tight text-slate-900 dark:text-white">Luxe<span class="text-amber-500 font-light">Book</span></span>
                </a>
                <nav class="flex gap-3 sm:gap-6 items-center text-xs sm:text-sm font-bold text-slate-700 dark:text-slate-300">
                    <a href="/hizmetlerimiz" wire:navigate class="relative group hover:text-amber-600 transition-colors duration-300 {{ request()->is('hizmetlerimiz') ? 'text-amber-600 font-extrabold' : '' }}">
                        Hizmetler
                        <span class="absolute -bottom-1 left-0 h-0.5 bg-amber-500 transition-all duration-300 {{ request()->is('hizmetlerimiz') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                    <a href="/uzmanlarimiz" wire:navigate class="relative group hover:text-amber-600 transition-colors duration-300 {{ request()->is('uzmanlarimiz') ? 'text-amber-600 font-extrabold' : '' }}">
                        Uzmanlar
                        <span class="absolute -bottom-1 left-0 h-0.5 bg-amber-500 transition-all duration-300 {{ request()->is('uzmanlarimiz') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                    <a href="/hediye-karti" wire:navigate class="relative group hover:text-amber-600 transition-colors duration-300 {{ request()->is('hediye-karti') ? 'text-amber-600 font-extrabold' : '' }}">
                        Hediye Kartı
                        <span class="absolute -bottom-1 left-0 h-0.5 bg-amber-500 transition-all duration-300 {{ request()->is('hediye-karti') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                    <a href="/iletisim" wire:navigate class="relative group hover:text-amber-600 transition-colors duration-300 {{ request()->is('iletisim') ? 'text-amber-600 font-extrabold' : '' }}">
                        İletişim
                        <span class="absolute -bottom-1 left-0 h-0.5 bg-amber-500 transition-all duration-300 {{ request()->is('iletisim') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>

                    <!-- Auth Links -->
                    @auth
                        <a href="{{ route('dashboard') }}" wire:navigate class="ml-2 px-4 py-2 bg-amber-50 dark:bg-amber-500/10 text-amber-600 dark:text-amber-500 hover:bg-amber-500 hover:text-white rounded-lg transition-colors duration-300 border border-amber-200 dark:border-amber-500/20">
                            Hesabım
                        </a>
                    @else
                        <div class="ml-2 flex items-center gap-2">
                            <a href="{{ route('login') }}" wire:navigate class="px-4 py-2 text-slate-600 dark:text-slate-300 hover:text-amber-500 transition-colors duration-300 font-medium">
                                Giriş Yap
                            </a>
                            <a href="{{ route('register') }}" wire:navigate class="px-4 py-2 bg-amber-500 text-white hover:bg-amber-400 rounded-lg shadow-lg shadow-amber-500/20 transition-all duration-300 font-bold">
                                Kayıt Ol
                            </a>
                        </div>
                    @endauth
                    
                    <!-- Dark Mode Toggle -->
                    <button onclick="toggleTheme()" class="w-8 h-8 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-800 dark:text-amber-400 flex items-center justify-center hover:scale-105 transition-transform border border-slate-200/50 dark:border-slate-700/50 cursor-pointer">
                        <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707m12.728 12.728A9 9 0 115.636 5.636m12.728 12.728L12 12"></path></svg>
                        <svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    </button>
                </nav>
            </div>
        </header>
    @endif

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <footer class="py-4 text-center text-slate-400 dark:text-slate-600 text-xs border-t border-slate-200/50 dark:border-slate-800/80 bg-white/50 dark:bg-slate-950/50 backdrop-blur-sm relative z-20 transition-colors duration-300">
        &copy; {{ date('Y') }} LuxeBook. Tüm hakları saklıdır.
    </footer>

    @livewireScripts

    <!-- Custom Theme & Cursor Controller Script -->
    <script>
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }

        // Custom Cursor movement
        const cursor = document.getElementById('custom-cursor');
        const cursorDot = document.getElementById('custom-cursor-dot');
        
        if (cursor && cursorDot) {
            document.addEventListener('mousemove', (e) => {
                cursor.style.left = e.clientX + 'px';
                cursor.style.top = e.clientY + 'px';
                cursorDot.style.left = e.clientX + 'px';
                cursorDot.style.top = e.clientY + 'px';
            });
            
            document.addEventListener('mousedown', () => {
                cursor.style.transform = 'translate(-50%, -50%) scale(0.75)';
                cursor.style.backgroundColor = 'rgba(245, 158, 11, 0.15)';
            });
            
            document.addEventListener('mouseup', () => {
                cursor.style.transform = 'translate(-50%, -50%) scale(1)';
                cursor.style.backgroundColor = 'transparent';
            });

            // Bind scaling events to all links & buttons dynamically
            function attachHoverEffects() {
                const interactives = document.querySelectorAll('a, button, [role="button"], input, select, textarea');
                interactives.forEach(el => {
                    el.addEventListener('mouseenter', () => {
                        cursor.style.transform = 'translate(-50%, -50%) scale(1.5)';
                        cursor.style.borderColor = '#f59e0b';
                    });
                    el.addEventListener('mouseleave', () => {
                        cursor.style.transform = 'translate(-50%, -50%) scale(1)';
                        cursor.style.borderColor = 'rgba(245, 158, 11, 0.4)';
                    });
                });
            }
            attachHoverEffects();
            
            // Re-bind when Livewire performs DOM updates
            document.addEventListener('livewire:navigated', () => {
                attachHoverEffects();
            });
        }
    </script>
</body>
</html>

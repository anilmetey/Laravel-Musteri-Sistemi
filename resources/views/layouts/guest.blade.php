<!DOCTYPE html>
<html lang="tr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LuxeBook | Kayıt & Giriş</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Dark Mode Initializer -->
    <script>
        function applyTheme() {
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
        applyTheme();
        document.addEventListener('livewire:navigated', applyTheme);
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-['Outfit'] text-slate-900 antialiased bg-slate-50 dark:bg-slate-950 transition-colors duration-300">
    
    <!-- Decorative background elements -->
    <div class="fixed inset-0 z-[-1] pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-amber-200/20 dark:bg-amber-500/5 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-blue-200/10 dark:bg-blue-500/5 rounded-full blur-[120px]"></div>
    </div>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10">
        <div>
            <a href="/" wire:navigate class="flex items-center gap-3 group cursor-pointer">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-white font-bold text-2xl shadow-lg shadow-amber-500/20 transition-transform group-hover:scale-105">L</div>
                <span class="text-3xl font-semibold tracking-tight text-slate-900 dark:text-white">Luxe<span class="text-amber-500 font-light">Book</span></span>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-10 px-8 py-8 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border border-white dark:border-slate-800 shadow-[0_20px_60px_-15px_rgba(0,0,0,0.1)] overflow-hidden sm:rounded-3xl">
            {{ $slot }}
        </div>
        
        <a href="/" wire:navigate class="mt-8 text-sm font-bold text-slate-400 hover:text-amber-500 transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Ana Sayfaya Dön
        </a>
    </div>
</body>
</html>

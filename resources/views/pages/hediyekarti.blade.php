<x-layouts.app title="Hediye Kartı - LuxeBook">
    <!-- Full Width Hero Banner -->
    <div class="relative h-72 sm:h-80 w-full overflow-hidden">
        <img src="https://images.unsplash.com/photo-1513201099705-a9746e1e201f?auto=format&fit=crop&w=1600&q=80" alt="Hediye Kartı" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/70 via-slate-900/50 to-slate-900/90"></div>
        <div class="absolute inset-0 flex items-center justify-center z-10 px-4">
            <div class="text-center">
                <span class="inline-block px-5 py-2.5 rounded-full bg-white/10 backdrop-blur-md text-amber-400 font-medium text-[10px] uppercase tracking-[0.3em] mb-4 border border-white/15">Özel Hediye</span>
                <h1 class="text-4xl sm:text-6xl font-black text-white tracking-tight leading-[1.1]">Dijital <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-orange-300 to-amber-400 bg-[length:200%_auto] animate-slide-rtl drop-shadow-[0_0_15px_rgba(245,158,11,0.3)]">Hediye Kartı</span></h1>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    @livewire('gift-card-form')
</x-layouts.app>

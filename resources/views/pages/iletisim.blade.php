<x-layouts.app title="İletişim - LuxeBook">
    <!-- Full Width Hero Banner -->
    <div class="relative h-72 sm:h-80 w-full overflow-hidden">
        <img src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?auto=format&fit=crop&w=1600&q=80" alt="İletişim" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/70 via-slate-900/50 to-slate-900/90"></div>
        <div class="absolute inset-0 flex items-center justify-center z-10 px-4">
            <div class="text-center">
                <span class="inline-block px-5 py-2.5 rounded-full bg-white/10 backdrop-blur-md text-emerald-300 font-medium text-[10px] uppercase tracking-[0.3em] mb-4 border border-white/15">İletişim</span>
                <h1 class="text-4xl sm:text-6xl font-black text-white tracking-tight leading-[1.1]">Bize <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-orange-300 to-amber-400 bg-[length:200%_auto] animate-slide-rtl drop-shadow-[0_0_15px_rgba(245,158,11,0.3)]">Ulaşın</span></h1>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="relative overflow-hidden pb-32 bg-slate-50/50 dark:bg-slate-950/30 transition-colors duration-300">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-slate-200/10 dark:bg-amber-500/5 rounded-full blur-[150px] pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 sm:px-8 relative z-10 pt-10">
            <!-- Back button (No negative margins, perfectly aligned) -->
            <a href="/" wire:navigate class="inline-flex items-center text-xs font-bold text-slate-400 hover:text-amber-600 transition-colors uppercase tracking-widest mb-10 group bg-white dark:bg-slate-900 rounded-full px-5 py-2.5 shadow-sm border border-slate-100 dark:border-slate-800">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Ana Sayfaya Dön
            </a>

            <p class="text-slate-400 dark:text-slate-500 text-lg max-w-lg mb-12 leading-relaxed font-light">Sorularınız, iş birlikleriniz veya özel talepleriniz için her zaman buradayız.</p>

            <!-- Split Layout: Form and Details -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- Left Side: Sleek Charcoal Form -->
                @livewire('contact-form')

                <!-- Right Side: Contact Info & Maps -->
                <div class="lg:col-span-5 space-y-8">
                    <!-- Contact Cards -->
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Phone Card -->
                        <div class="flex items-center gap-4 bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-100 dark:border-slate-850 shadow-sm group hover:border-slate-300 dark:hover:border-slate-700 transition-colors">
                            <div class="w-12 h-12 rounded-xl bg-slate-900 dark:bg-slate-800 flex items-center justify-center text-white shrink-0 shadow-md shadow-slate-900/10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="block text-[9px] font-black text-slate-400 uppercase tracking-widest">Telefon</span>
                                <a href="tel:08501234567" class="text-slate-900 dark:text-white font-bold hover:text-amber-600 dark:hover:text-amber-400 transition-colors text-base">0850 123 45 67</a>
                            </div>
                        </div>

                        <!-- Email Card -->
                        <div class="flex items-center gap-4 bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-100 dark:border-slate-850 shadow-sm group hover:border-slate-300 dark:hover:border-slate-700 transition-colors">
                            <div class="w-12 h-12 rounded-xl bg-slate-900 dark:bg-slate-800 flex items-center justify-center text-white shrink-0 shadow-md shadow-slate-900/10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="block text-[9px] font-black text-slate-400 uppercase tracking-widest">E-posta</span>
                                <a href="mailto:info@luxebook.com" class="text-slate-900 dark:text-white font-bold hover:text-amber-600 dark:hover:text-amber-400 transition-colors text-base">info@luxebook.com</a>
                            </div>
                        </div>

                        <!-- Address Card -->
                        <div class="flex items-center gap-4 bg-white dark:bg-slate-900 p-5 rounded-2xl border border-slate-100 dark:border-slate-850 shadow-sm group hover:border-slate-300 dark:hover:border-slate-700 transition-colors">
                            <div class="w-12 h-12 rounded-xl bg-slate-900 dark:bg-slate-800 flex items-center justify-center text-white shrink-0 shadow-md shadow-slate-900/10">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="block text-[9px] font-black text-slate-400 uppercase tracking-widest">Adres</span>
                                <span class="text-slate-900 dark:text-white font-bold text-sm">Bağdat Cad. No:123, Kadıköy, İstanbul</span>
                            </div>
                        </div>
                    </div>

                    <!-- Upgraded Luxury Map Card -->
                    <div class="bg-slate-900 rounded-3xl overflow-hidden border border-slate-850 shadow-xl relative group">
                        <div class="absolute -right-10 -bottom-10 w-36 h-36 bg-amber-500/10 rounded-full blur-[40px] pointer-events-none"></div>
                        <div class="p-6 sm:p-8 space-y-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Lokasyon</span>
                                    <h4 class="font-bold text-white text-base leading-tight mt-1">LuxeBook VIP Salonu</h4>
                                </div>
                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-amber-400 backdrop-blur-sm border border-white/10 shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                                    </svg>
                                </div>
                            </div>
                            
                            <p class="text-slate-400 text-xs leading-relaxed font-light">Suadiye Mahallesi, Bağdat Caddesi No:123, Kadıköy / İstanbul (Vakıfbank karşısı, otopark mevcuttur).</p>
                            
                            <div class="pt-4 border-t border-slate-800 flex justify-between items-center">
                                <span class="text-[9px] font-bold text-amber-500 uppercase tracking-widest">Koordinat: 40.9634, 29.0812</span>
                                <a href="https://maps.google.com" target="_blank" class="px-5 py-2.5 bg-gradient-to-r from-amber-500 to-amber-600 text-white text-xs font-bold rounded-xl shadow-md transition-all transform hover:-translate-y-0.5">
                                    Yol Tarifi Al →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Premium Partners List -->
            <div class="mt-28 border-t border-slate-200/50 dark:border-slate-800 pt-16 text-center">
                <h3 class="text-[9px] font-black text-slate-400 uppercase tracking-[0.3em] mb-12">Premium Partnerlerimiz</h3>
                <div class="flex flex-wrap items-center justify-center gap-x-12 gap-y-6 opacity-30 dark:opacity-20 grayscale hover:opacity-60 dark:hover:opacity-40 transition-opacity duration-300">
                    <span class="text-sm font-black tracking-[0.2em] text-slate-800 dark:text-slate-200 uppercase">Kérastase</span>
                    <span class="text-sm font-black tracking-[0.2em] text-slate-800 dark:text-slate-200 uppercase">Dyson</span>
                    <span class="text-sm font-black tracking-[0.2em] text-slate-800 dark:text-slate-200 uppercase">L'Oréal</span>
                    <span class="text-sm font-black tracking-[0.2em] text-slate-800 dark:text-slate-200 uppercase">Dermalogica</span>
                    <span class="text-sm font-black tracking-[0.2em] text-slate-800 dark:text-slate-200 uppercase">O·P·I</span>
                    <span class="text-sm font-black tracking-[0.2em] text-slate-800 dark:text-slate-200 uppercase">M·A·C</span>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

<x-layouts.app title="Hizmetlerimiz - LuxeBook">
    <!-- Full Width Hero Banner -->
    <div class="relative h-72 sm:h-80 w-full overflow-hidden">
        <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?auto=format&fit=crop&w=1600&q=80" alt="Hizmetlerimiz" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/70 via-slate-900/50 to-slate-900/90"></div>
        <div class="absolute inset-0 flex items-center justify-center z-10 px-4">
            <div class="text-center">
                <span class="inline-block px-5 py-2.5 rounded-full bg-white/10 backdrop-blur-md text-amber-400 font-medium text-[10px] uppercase tracking-[0.3em] mb-4 border border-white/15">Hizmetlerimiz</span>
                <h1 class="text-4xl sm:text-6xl font-black text-white tracking-tight leading-[1.1]">Premium <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-orange-300 to-amber-400 bg-[length:200%_auto] animate-slide-rtl drop-shadow-[0_0_15px_rgba(245,158,11,0.3)]">Hizmetler</span></h1>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="relative overflow-hidden pb-32 bg-slate-50/50 dark:bg-slate-950/30 transition-colors duration-300">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-amber-200/10 dark:bg-amber-500/5 rounded-full blur-[150px] pointer-events-none"></div>
        
        <div class="max-w-6xl mx-auto px-6 sm:px-8 relative z-10 pt-10">
            <!-- Back button (No negative margins, perfectly aligned) -->
            <a href="/" wire:navigate class="inline-flex items-center text-xs font-bold text-slate-400 hover:text-amber-600 transition-colors uppercase tracking-widest mb-10 group bg-white dark:bg-slate-900 rounded-full px-5 py-2.5 shadow-sm border border-slate-100 dark:border-slate-800">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Ana Sayfaya Dön
            </a>

            <p class="text-slate-400 dark:text-slate-500 text-lg max-w-2xl mb-12 leading-relaxed font-light">İhtiyaçlarınıza yönelik, yüksek kaliteli bakım ve güzellik hizmetleri sunuyoruz. Deneyimli kadromuz ve güvenilir markalarla hazırladığımız bu ortamda, kendinize vakit ayırmanın tadını çıkarın.</p>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    @php
                        $serviceMeta = [
                            'Premium Saç Kesimi & Bakım' => [
                                'image' => 'https://images.unsplash.com/photo-1560066984-138dadb4c035?auto=format&fit=crop&w=600&q=80',
                                'brands' => 'Kérastase & Dyson Airwrap ürünleri',
                                'popular' => true
                            ],
                            'Cilt Bakımı & Spa' => [
                                'image' => 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?auto=format&fit=crop&w=600&q=80',
                                'brands' => 'Dermalogica & Estée Lauder ürünleri',
                                'popular' => false
                            ],
                            'Tırnak Bakımı & Nail Art' => [
                                'image' => 'https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&w=600&q=80',
                                'brands' => 'CND Shellac & OPI premium cilalar',
                                'popular' => false
                            ],
                            'Masaj Terapisi' => [
                                'image' => 'https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?auto=format&fit=crop&w=600&q=80',
                                'brands' => 'Organik terapötik aromaterapi yağları',
                                'popular' => false
                            ],
                            'Profesyonel Makyaj' => [
                                'image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?auto=format&fit=crop&w=600&q=80',
                                'brands' => 'MAC & Kryolan profesyonel makyaj',
                                'popular' => false
                            ]
                        ];
                        
                        $meta = $serviceMeta[$service->name] ?? [
                            'image' => 'https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&w=600&q=80',
                            'brands' => 'LuxeBook Premium ürünleri',
                            'popular' => false
                        ];
                    @endphp
                    
                    <div class="group glow-hover bg-white dark:bg-slate-900 rounded-3xl overflow-hidden border border-slate-100 dark:border-slate-850 hover:border-amber-200 dark:hover:border-amber-500/50 shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1.5 flex flex-col">
                        <div class="relative h-52 overflow-hidden shrink-0">
                            <img src="{{ $meta['image'] }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                            @if($meta['popular'])
                                <span class="absolute bottom-4 left-4 bg-amber-500 text-white text-[9px] font-black px-2.5 py-1.5 rounded-full uppercase tracking-wider">Popüler</span>
                            @endif
                        </div>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors">{{ $service->name }}</h3>
                                <p class="text-slate-400 dark:text-slate-500 text-xs mt-3 leading-relaxed">{{ $service->description }}</p>
                                
                                <!-- Brand Badge -->
                                <div class="mt-4 inline-flex items-center gap-1.5 text-[10px] text-slate-500 dark:text-slate-400 font-medium bg-slate-50 dark:bg-slate-850 px-3 py-1 rounded-full border border-slate-100 dark:border-slate-800">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                    {{ $meta['brands'] }}
                                </div>
                            </div>
                            <div class="flex items-center justify-between pt-4 mt-6 border-t border-slate-50 dark:border-slate-800">
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $service->duration_minutes }} dk
                                </span>
                                <span class="font-black text-xl text-slate-900 dark:text-white">{{ number_format($service->price, 0) }} ₺</span>
                            </div>
                            <a href="/?service={{ $service->id }}" wire:navigate class="mt-5 text-[10px] font-bold text-amber-500 hover:text-white hover:bg-amber-500 transition-all duration-300 uppercase tracking-wider block text-center border border-amber-500/20 hover:border-amber-500 rounded-xl py-2.5 bg-amber-50/30 dark:bg-amber-950/10">
                                Bu Hizmet İçin Randevu Al →
                            </a>
                        </div>
                    </div>
                @endforeach

                <!-- CTA Card -->
                <div class="group relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-950 rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-1.5 flex flex-col justify-between overflow-hidden">
                    <div class="absolute -right-8 -bottom-8 w-40 h-40 bg-amber-500/10 rounded-full blur-[40px]"></div>
                    <div class="absolute -left-4 -top-4 w-24 h-24 bg-white/5 rounded-full blur-[20px]"></div>
                    <div class="relative z-10">
                        <h3 class="text-3xl font-black text-white mb-4">Kendinizi Şımartmaya Hazır mısınız?</h3>
                        <p class="text-slate-300 text-base leading-relaxed mb-8">Uzman kadromuz eşliğinde profesyonel bir hizmet almak ve kendinize zaman ayırmak için randevunuzu hemen oluşturabilirsiniz. Sizi salonumuzda ağırlamaktan memnuniyet duyarız.</p>
                    </div>
                    <a href="/" wire:navigate class="relative z-10 w-full bg-gradient-to-r from-amber-400 to-amber-600 hover:from-amber-300 hover:to-amber-500 text-white font-bold py-4 px-6 rounded-2xl shadow-lg transition-all text-sm text-center block">
                        Hemen Randevu Al →
                    </a>
                </div>
            </div>

            <!-- FAQ Section -->
            <div x-data="{ active: null }" class="space-y-4 max-w-3xl mx-auto mt-24 border-t border-slate-200/50 dark:border-slate-800 pt-16">
                <h3 class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white text-center mb-10 tracking-tight">Sıkça Sorulan Sorular</h3>
                
                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-2xl overflow-hidden shadow-sm">
                    <button @click="active = active === 1 ? null : 1" class="w-full px-6 py-5 text-left font-bold text-slate-800 dark:text-slate-200 flex justify-between items-center hover:bg-slate-50/50 dark:hover:bg-slate-850/50 transition-colors">
                        <span class="text-sm sm:text-base">Randevu iptal veya değişiklik politikanız nedir?</span>
                        <svg class="w-4 h-4 transform transition-transform duration-300" :class="active === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="active === 1" x-collapse class="px-6 pb-5 text-xs sm:text-sm text-slate-500 dark:text-slate-400 leading-relaxed bg-slate-50/20 dark:bg-slate-950/20">
                        Randevunuzu en geç 24 saat öncesine kadar hiçbir ek ücret ödemeden erteleyebilir veya iptal edebilirsiniz. Son 24 saat içinde yapılan iptallerde ücret iadesi sağlanmamaktadır.
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-2xl overflow-hidden shadow-sm">
                    <button @click="active = active === 2 ? null : 2" class="w-full px-6 py-5 text-left font-bold text-slate-800 dark:text-slate-200 flex justify-between items-center hover:bg-slate-50/50 dark:hover:bg-slate-850/50 transition-colors">
                        <span class="text-sm sm:text-base">Hizmetlerinizde hangi marka ürünleri kullanıyorsunuz?</span>
                        <svg class="w-4 h-4 transform transition-transform duration-300" :class="active === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="active === 2" x-collapse class="px-6 pb-5 text-xs sm:text-sm text-slate-500 dark:text-slate-400 leading-relaxed bg-slate-50/20 dark:bg-slate-950/20">
                        LuxeBook olarak kaliteden ödün vermiyoruz. Saç tasarımında Kérastase, makyajda MAC ve Kryolan, cilt bakımında Dermalogica ve tırnak uygulamalarında CND Shellac ile OPI gibi tamamen premium/lüks markaları tercih ediyoruz.
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-2xl overflow-hidden shadow-sm">
                    <button @click="active = active === 3 ? null : 3" class="w-full px-6 py-5 text-left font-bold text-slate-800 dark:text-slate-200 flex justify-between items-center hover:bg-slate-50/50 dark:hover:bg-slate-850/50 transition-colors">
                        <span class="text-sm sm:text-base">Randevu saatinden ne kadar önce salonda olmalıyım?</span>
                        <svg class="w-4 h-4 transform transition-transform duration-300" :class="active === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="active === 3" x-collapse class="px-6 pb-5 text-xs sm:text-sm text-slate-500 dark:text-slate-400 leading-relaxed bg-slate-50/20 dark:bg-slate-950/20">
                        Size özel hazırlanan ikramlarımızın tadını çıkarabilmeniz ve ön hazırlık seansınızı kaçırmamanız için randevu saatinizden 10-15 dakika önce salonda bulunmanızı tavsiye ederiz.
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

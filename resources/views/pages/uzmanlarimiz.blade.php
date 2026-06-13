<x-layouts.app title="Uzmanlarımız - LuxeBook">
    <!-- Full Width Hero Banner -->
    <div class="relative h-72 sm:h-80 w-full overflow-hidden">
        <img src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?auto=format&fit=crop&w=1600&q=80" alt="Uzmanlarımız" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/70 via-slate-900/50 to-slate-900/90"></div>
        <div class="absolute inset-0 flex items-center justify-center z-10 px-4">
            <div class="text-center">
                <span class="inline-block px-5 py-2.5 rounded-full bg-white/10 backdrop-blur-md text-violet-300 font-medium text-[10px] uppercase tracking-[0.3em] mb-4 border border-white/15">Ekibimiz</span>
                <h1 class="text-4xl sm:text-6xl font-black text-white tracking-tight leading-[1.1]">Uzman <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-orange-300 to-amber-400 bg-[length:200%_auto] animate-slide-rtl drop-shadow-[0_0_15px_rgba(245,158,11,0.3)]">Kadromuz</span></h1>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="relative overflow-hidden pb-32 bg-slate-50/50 dark:bg-slate-950/30 transition-colors duration-300">
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-violet-200/10 rounded-full blur-[150px] pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 sm:px-8 relative z-10 pt-10">
            <!-- Back button (No negative margins, perfectly aligned) -->
            <a href="/" wire:navigate class="inline-flex items-center text-xs font-bold text-slate-400 hover:text-amber-600 transition-colors uppercase tracking-widest mb-10 group bg-white dark:bg-slate-900 rounded-full px-5 py-2.5 shadow-sm border border-slate-100 dark:border-slate-800">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Ana Sayfaya Dön
            </a>

            <p class="text-slate-400 dark:text-slate-500 text-lg max-w-2xl mb-12 leading-relaxed font-light">Güzellik ve bakımda profesyonel standartları benimsiyoruz. Kendi alanında deneyimli, yenilikleri yakından takip eden ve müşteri memnuniyetini ön planda tutan uzman kadromuzla tanışın.</p>

            <!-- Experts Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($employees as $employee)
                    @php
                        $employeeMeta = [
                            'Elif Yıldırım' => [
                                'experience' => '12 Yıl Deneyim',
                                'role' => 'Kuaför & Stilist',
                                'specialties' => ['Balayaj', 'Keratin', 'Kesim'],
                                'rating' => 5,
                                'reviews' => '120+',
                                'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&h=500&q=80'
                            ],
                            'Ahmet Kaya' => [
                                'experience' => '8 Yıl Deneyim',
                                'role' => 'Cilt Bakım Uzmanı',
                                'specialties' => ['Cilt Analizi', 'Anti-Aging', 'Spa'],
                                'rating' => 5,
                                'reviews' => '95+',
                                'image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&h=500&q=80'
                            ],
                            'Zeynep Demir' => [
                                'experience' => '10 Yıl Deneyim',
                                'role' => 'Masaj Terapisti',
                                'specialties' => ['Derin Doku', 'Aromaterapi', 'Refleks'],
                                'rating' => 5,
                                'reviews' => '140+',
                                'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=400&h=500&q=80'
                            ],
                            'Can Özkan' => [
                                'experience' => '6 Yıl Deneyim',
                                'role' => 'Makyaj Sanatçısı',
                                'specialties' => ['Düğün', 'Moda', 'Kontür'],
                                'rating' => 4,
                                'reviews' => '80+',
                                'image' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=400&h=500&q=80'
                            ]
                        ];
                        
                        $meta = $employeeMeta[$employee->name] ?? [
                            'experience' => '5 Yıl Deneyim',
                            'role' => $employee->bio ?? 'Uzman Personel',
                            'specialties' => ['Güzellik', 'Bakım'],
                            'rating' => 5,
                            'reviews' => '10+',
                            'image' => $employee->avatar_url ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&h=500&q=80'
                        ];
                        
                        $imgUrl = $employee->avatar_url ?: $meta['image'];
                    @endphp
                    
                    <div class="group glow-hover bg-white dark:bg-slate-900 rounded-3xl overflow-hidden border border-slate-100 dark:border-slate-800 shadow-sm hover:shadow-xl transition-all duration-500 transform hover:-translate-y-1.5 flex flex-col">
                        <div class="relative aspect-[4/5] overflow-hidden shrink-0">
                            <img src="{{ $imgUrl }}" alt="{{ $employee->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            
                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white text-[10px] font-bold border border-white/30 rounded-full px-4 py-2 bg-white/10 backdrop-blur-sm tracking-wider uppercase">
                                    Portfolyo Gör →
                                </span>
                            </div>
                            
                            <div class="absolute bottom-4 left-4 right-4 text-white group-hover:opacity-0 transition-opacity duration-300">
                                <span class="bg-amber-500 text-white text-[9px] font-black px-2.5 py-1.5 rounded-full uppercase tracking-wider">{{ $meta['experience'] }}</span>
                            </div>
                        </div>
                        <div class="p-5 flex-grow flex flex-col justify-between bg-slate-50/20 dark:bg-slate-900/50">
                            <div>
                                <h3 class="text-base font-bold text-slate-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors">{{ $employee->name }}</h3>
                                <p class="text-amber-600 dark:text-amber-400 font-semibold text-xs mt-1 uppercase tracking-wider">{{ $meta['role'] }}</p>
                                
                                <!-- Specialties -->
                                <div class="mt-4 flex flex-wrap gap-1.5">
                                    @foreach($meta['specialties'] as $spec)
                                        <span class="bg-slate-100 dark:bg-slate-850 text-slate-600 dark:text-slate-400 text-[9px] font-bold px-2 py-0.5 rounded-md border border-slate-200/50 dark:border-slate-750">{{ $spec }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                                <div class="flex text-amber-400 text-xs tracking-wider">
                                    @for($i = 0; $i < 5; $i++)
                                        <span>{{ $i < $meta['rating'] ? '★' : '☆' }}</span>
                                    @endfor
                                </div>
                                <span class="text-slate-400 dark:text-slate-500 text-[10px] font-bold">{{ number_format($meta['rating'], 1) }} ({{ $meta['reviews'] }} Değerlendirme)</span>
                            </div>
                            <a href="/?employee={{ $employee->id }}" wire:navigate class="mt-5 text-[10px] font-bold text-amber-500 hover:text-white hover:bg-amber-500 transition-all duration-300 uppercase tracking-wider block text-center border border-amber-500/20 hover:border-amber-500 rounded-xl py-2.5 bg-amber-50/30 dark:bg-amber-950/10">
                                {{ $employee->name }} ile Randevu Al →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Testimonials (Müşteri Yorumları) Section -->
            <div class="mt-28 border-t border-slate-200/50 dark:border-slate-800 pt-16">
                <h3 class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white text-center mb-12 tracking-tight">Müşteri Yorumları</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 border border-slate-100 dark:border-slate-800 shadow-sm relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 text-[120px] font-black text-slate-50 dark:text-slate-800/10 select-none pointer-events-none leading-none">“</div>
                        <div class="relative z-10 space-y-4">
                            <div class="flex text-amber-400 text-xs tracking-wider">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-slate-600 dark:text-slate-400 text-sm italic leading-relaxed">"Elif Hanım saç renklendirme konusunda gerçekten çok başarılı. Uzun zamandır istediğim ama saçımın yıpranmasından korktuğum o balayaj rengini, saçıma hiç zarar vermeden tam istediğim gibi yaptı. Hem yaklaşımı hem de işçiliği çok profesyonel, salonun ortamı da çok rahat. Çok memnun kaldım."</p>
                            <div class="flex items-center gap-3">
                                <img class="w-10 h-10 rounded-full object-cover shadow-sm border border-slate-100 dark:border-slate-800" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=100&q=80" alt="Merve Şen">
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900 dark:text-white">Merve Şen</h4>
                                    <span class="text-[10px] text-slate-400">Kuaför Müşterisi</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 border border-slate-100 dark:border-slate-800 shadow-sm relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 text-[120px] font-black text-slate-50 dark:text-slate-800/10 select-none pointer-events-none leading-none">“</div>
                        <div class="relative z-10 space-y-4">
                            <div class="flex text-amber-400 text-xs tracking-wider">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-slate-600 dark:text-slate-400 text-sm italic leading-relaxed">"Cildimdeki kuruluk problemi için Ahmet Bey ile bir seans gerçekleştirdik. İşleme başlamadan önce cildimi detaylıca analiz edip kullanacağı ürünleri açıkladı. Gerekli özeni ve profesyonelliği fazlasıyla hissettirdi. Bakımdan sonra cildimdeki o gerginlik hissi tamamen geçti. Tavsiye ederim."</p>
                            <div class="flex items-center gap-3">
                                <img class="w-10 h-10 rounded-full object-cover shadow-sm border border-slate-100 dark:border-slate-800" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80" alt="Burak Öztürk">
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900 dark:text-white">Burak Öztürk</h4>
                                    <span class="text-[10px] text-slate-400">Cilt Bakım Müşterisi</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 border border-slate-100 dark:border-slate-800 shadow-sm relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 text-[120px] font-black text-slate-50 dark:text-slate-800/10 select-none pointer-events-none leading-none">“</div>
                        <div class="relative z-10 space-y-4">
                            <div class="flex text-amber-400 text-xs tracking-wider">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-slate-600 dark:text-slate-400 text-sm italic leading-relaxed">"Masa başı çalıştığım için yoğun boyun ve sırt ağrılarım vardı. Zeynep Hanım'ın yaptığı derin doku masajı gerçekten çok iyi geldi. Salonun sessizliği, ortamın temizliği ve kullanılan yağların kalitesi harikaydı. Çok rahatlamış bir şekilde ayrıldım."</p>
                            <div class="flex items-center gap-3">
                                <img class="w-10 h-10 rounded-full object-cover shadow-sm border border-slate-100 dark:border-slate-800" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Selin Demir">
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900 dark:text-white">Selin Demir</h4>
                                    <span class="text-[10px] text-slate-400">Masaj Müşterisi</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 4 -->
                    <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 border border-slate-100 dark:border-slate-800 shadow-sm relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 text-[120px] font-black text-slate-50 dark:text-slate-800/10 select-none pointer-events-none leading-none">“</div>
                        <div class="relative z-10 space-y-4">
                            <div class="flex text-amber-400 text-xs tracking-wider">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-slate-600 dark:text-slate-400 text-sm italic leading-relaxed">"Salonun genel hijyeni ve düzeni gerçekten üst seviyede. Randevu saatine sadık kalmaları ve bekleme alanındaki ilgi çok hoşuma gitti. Kız kardeşimin düğünü için Can Bey'e makyaj yaptırdık; hem çok doğal durdu hem de gece sonuna kadar hiç akmadı. Güvenle tercih edebilirsiniz."</p>
                            <div class="flex items-center gap-3">
                                <img class="w-10 h-10 rounded-full object-cover shadow-sm border border-slate-100 dark:border-slate-800" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=100&q=80" alt="Kaan Yılmaz">
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900 dark:text-white">Kaan Yılmaz</h4>
                                    <span class="text-[10px] text-slate-400">Genel Müşteri</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="mt-20 text-center">
                <a href="/" wire:navigate class="group inline-flex items-center px-10 py-4.5 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-400 hover:to-orange-400 text-white dark:text-slate-950 font-bold rounded-2xl shadow-xl transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
                    Uzmanlarımızla Randevu Alın
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>

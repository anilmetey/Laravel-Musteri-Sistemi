<div x-on:open-wizard.window="$wire.startWizard()">
    @if(!$showWizard)
        <!-- Split Screen Landing Page -->
        <div class="relative min-h-screen w-full bg-slate-50 dark:bg-slate-950 overflow-hidden lg:grid lg:grid-cols-12 items-stretch transition-colors duration-300">
            
            <!-- Left Content -->
            <div class="col-span-12 lg:col-span-5 xl:col-span-5 flex flex-col justify-center px-8 sm:px-12 lg:pl-16 xl:pl-24 lg:pr-8 py-16 lg:py-20 min-h-[60vh] lg:min-h-screen z-10 relative">
                <div class="absolute -top-40 -left-40 w-96 h-96 bg-amber-200/40 dark:bg-amber-500/5 rounded-full blur-[100px] pointer-events-none"></div>
                
                <div class="animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="inline-block px-5 py-2 rounded-full bg-amber-100 dark:bg-amber-950/40 text-amber-700 dark:text-amber-400 font-bold text-sm mb-6 border border-amber-200/50 dark:border-amber-900/40 shadow-sm uppercase tracking-widest">
                        Lüks & Konfor
                    </div>
                </div>
                
                <h1 class="animate-fade-in-up text-5xl lg:text-6xl xl:text-7xl font-black tracking-tight leading-[1.1] mb-6 transform transition-transform duration-700 hover:scale-[1.02] cursor-default" style="animation-delay: 0.2s;">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-slate-900 via-slate-600 to-slate-900 dark:from-white dark:via-slate-400 dark:to-white bg-[length:200%_auto] animate-slide-rtl">Kendinize Bir</span> <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-500 via-orange-400 to-amber-500 bg-[length:200%_auto] animate-slide-rtl drop-shadow-[0_0_15px_rgba(245,158,11,0.4)]">İyilik Yapın</span>
                </h1>
                
                <p class="animate-fade-in-up text-lg text-slate-600 dark:text-slate-400 mb-10 max-w-lg leading-relaxed" style="animation-delay: 0.3s;">
                    Sıradan bir randevunun ötesinde, size özel tasarlanmış premium bakım ve danışmanlık hizmetlerini keşfedin. Zamanınız değerli; anında yerinizi ayırtın.
                </p>
                <div class="animate-fade-in-up flex flex-col sm:flex-row gap-8 items-start sm:items-center" style="animation-delay: 0.4s;">
                    <button wire:click="startWizard" class="group relative px-8 py-4 bg-slate-900 dark:bg-amber-500 hover:bg-slate-800 dark:hover:bg-amber-400 text-white dark:text-slate-950 font-bold rounded-2xl shadow-[0_10px_40px_-10px_rgba(15,23,42,0.8)] dark:shadow-amber-500/10 transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center overflow-hidden cursor-pointer shrink-0">
                        <span class="relative z-10 flex items-center whitespace-nowrap">
                            Hemen Randevu Al
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-amber-500/20 to-transparent translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
                    </button>
                    
                    <div class="flex items-center gap-3 text-slate-500 dark:text-slate-400 text-sm font-medium">
                        <div class="flex -space-x-2.5">
                            @foreach($employees->take(5) as $employee)
                                @if($employee->avatar_url)
                                    <img class="w-10 h-10 rounded-full border-2 border-slate-50 dark:border-slate-800 object-cover shadow-md transition-transform duration-300 hover:scale-110 hover:z-20 cursor-pointer" src="{{ $employee->avatar_url }}" alt="{{ $employee->name }}" title="{{ $employee->name }} ({{ $employee->bio }})">
                                @else
                                    <div class="w-10 h-10 rounded-full border-2 border-slate-50 dark:border-slate-800 bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-300 flex items-center justify-center text-xs font-bold shadow-md transition-transform duration-300 hover:scale-110 hover:z-20 cursor-pointer" title="{{ $employee->name }} ({{ $employee->bio }})">{{ substr($employee->name, 0, 1) }}</div>
                                @endif
                            @endforeach
                            @if($employees->count() > 5)
                                <div class="w-10 h-10 rounded-full border-2 border-slate-50 dark:border-slate-800 bg-amber-500 text-white flex items-center justify-center text-xs font-bold shadow-md z-10 relative">+{{ $employees->count() - 5 }}</div>
                            @endif
                        </div>
                        <p class="leading-tight text-xs sm:text-sm text-slate-600 dark:text-slate-300 font-semibold">
                            <span class="text-amber-600 dark:text-amber-400 font-bold">{{ $employees->count() }} Premium Uzman</span><br>Hizmetinizde
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Right Image -->
            <div class="col-span-12 lg:col-span-7 xl:col-span-7 relative min-h-[400px] w-full mt-8 lg:mt-0 animate-fade-in" style="animation-delay: 0.5s;">
                <img src="/images/hero.png" alt="Premium Spa Interior" class="absolute inset-0 w-full h-full object-cover lg:rounded-tl-[4rem] shadow-2xl">
                <div class="absolute inset-0 bg-amber-500/10 mix-blend-multiply lg:rounded-tl-[4rem]"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-slate-50 via-slate-50/20 to-transparent dark:from-slate-950 dark:via-slate-950/20 z-10 hidden lg:block"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-50 via-transparent to-transparent dark:from-slate-950 z-10 lg:hidden"></div>
            </div>
        </div>
    </div>
    @else
        <!-- Wizard Flow -->
        <div class="max-w-4xl mx-auto py-12 px-4 relative z-10 min-h-screen pt-32">
            <!-- Steps Indicator -->
            <div class="mb-12">
                <div class="flex items-center justify-between relative">
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-slate-200 dark:bg-slate-800 rounded z-0"></div>
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-gradient-to-r from-amber-400 to-orange-500 rounded z-0 transition-all duration-700 ease-in-out" style="width: {{ ($step - 1) * 25 }}%"></div>
                    
                    @foreach([1 => 'Hizmet', 2 => 'Uzman', 3 => 'Tarih', 4 => 'Bilgi', 5 => 'Ödeme'] as $idx => $label)
                        <div class="relative z-10 flex flex-col items-center gap-2 sm:gap-3">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 text-sm sm:text-base rounded-full flex items-center justify-center font-bold border-4 transition-all duration-500 {{ $step >= $idx ? 'bg-amber-500 border-amber-100 dark:border-amber-950 text-white shadow-[0_0_20px_rgba(245,158,11,0.4)] scale-110' : 'bg-white dark:bg-slate-900 border-slate-200 dark:border-slate-800 text-slate-400 dark:text-slate-600' }}">
                                {{ $step > $idx ? '✓' : $idx }}
                            </div>
                            <span class="text-[10px] sm:text-xs font-bold uppercase tracking-widest {{ $step >= $idx ? 'text-amber-600 dark:text-amber-400' : 'text-slate-400 dark:text-slate-600' }}">{{ $label }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Card Container -->
            <div x-data="{ activeStep: @entangle('step') }" class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-2xl border border-white dark:border-slate-800/80 rounded-[2rem] shadow-[0_20px_60px_-15px_rgba(0,0,0,0.05)] overflow-hidden p-8 sm:p-12 transition-all duration-500 relative">
                
                <!-- Livewire Loading Overlay Spinner -->
                <div wire:loading.flex class="absolute inset-0 bg-white/70 dark:bg-slate-900/70 backdrop-blur-sm z-50 items-center justify-center transition-all duration-300">
                    <div class="flex flex-col items-center gap-4">
                        <div class="w-12 h-12 rounded-full border-4 border-amber-500 border-t-transparent animate-spin"></div>
                        <p class="text-xs font-bold text-slate-800 dark:text-slate-200 uppercase tracking-widest animate-pulse">Yükleniyor...</p>
                    </div>
                </div>

                <!-- Decorative element inside card -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-amber-50 dark:bg-amber-950/5 rounded-full blur-[80px] -z-10 pointer-events-none"></div>

                <!-- Step 1: Select Service -->
                <div x-show="activeStep === 1"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="space-y-6">
                    <h2 class="text-4xl font-bold mb-3 text-slate-900 dark:text-white tracking-tight">Hizmet Seçimi</h2>
                    <p class="text-slate-500 dark:text-slate-400 mb-10 text-lg">Almak istediğiniz hizmeti seçerek randevunuza başlayın.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($services as $service)
                            @php
                                $serviceMeta = [
                                    'Premium Saç Kesimi & Bakım' => [
                                        'image' => 'https://images.unsplash.com/photo-1560066984-138dadb4c035?auto=format&fit=crop&w=200&q=80',
                                        'popular' => true
                                    ],
                                    'Cilt Bakımı & Spa' => [
                                        'image' => 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?auto=format&fit=crop&w=200&q=80',
                                        'popular' => false
                                    ],
                                    'Tırnak Bakımı & Nail Art' => [
                                        'image' => 'https://images.unsplash.com/photo-1604654894610-df63bc536371?auto=format&fit=crop&w=200&q=80',
                                        'popular' => false
                                    ],
                                    'Masaj Terapisi' => [
                                        'image' => 'https://images.unsplash.com/photo-1600334089648-b0d9d3028eb2?auto=format&fit=crop&w=200&q=80',
                                        'popular' => false
                                    ],
                                    'Profesyonel Makyaj' => [
                                        'image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?auto=format&fit=crop&w=200&q=80',
                                        'popular' => false
                                    ]
                                ];
                                
                                $meta = $serviceMeta[$service->name] ?? [
                                    'image' => 'https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&w=200&q=80',
                                    'popular' => false
                                ];
                            @endphp
                            <div wire:click="selectService({{ $service->id }})" class="group cursor-pointer p-5 rounded-2xl border-2 border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900/50 hover:border-amber-400 dark:hover:border-amber-500 hover:shadow-2xl hover:shadow-amber-100 dark:hover:shadow-none transition-all duration-300 flex gap-5 relative overflow-hidden transform hover:-translate-y-1">
                                <div class="absolute right-0 top-0 w-24 h-24 bg-gradient-to-bl from-amber-100 dark:from-amber-950/20 to-transparent rounded-bl-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                                <div class="w-24 h-24 rounded-xl overflow-hidden shrink-0 relative shadow-sm border border-slate-100 dark:border-slate-800 bg-slate-100 dark:bg-slate-800">
                                    <img src="{{ $meta['image'] }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-black/5 dark:bg-black/10"></div>
                                    @if($meta['popular'])
                                        <span class="absolute top-2 left-2 bg-amber-500 text-white text-[8px] font-black px-1.5 py-0.5 rounded uppercase tracking-wider scale-90">Popüler</span>
                                    @endif
                                </div>
                                <div class="flex-grow flex flex-col justify-between">
                                    <div>
                                        <div class="relative z-10 flex justify-between items-start gap-2">
                                            <h3 class="text-base font-bold text-slate-800 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors pr-2 leading-tight">{{ $service->name }}</h3>
                                            <span class="bg-slate-50 dark:bg-slate-850 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700/80 text-xs py-1 px-3 rounded-full font-bold whitespace-nowrap">{{ number_format($service->price, 0) }} ₺</span>
                                        </div>
                                        <p class="relative z-10 text-slate-500 dark:text-slate-400 text-xs leading-relaxed line-clamp-2 mt-1.5">{{ $service->description }}</p>
                                    </div>
                                    <div class="relative z-10 mt-2 flex items-center text-[10px] text-slate-400 dark:text-slate-500 font-bold uppercase tracking-wider">
                                        <svg class="w-3.5 h-3.5 mr-1 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ $service->duration_minutes }} Dakika
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Step 2: Select Employee -->
                <div x-show="activeStep === 2"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="space-y-6">
                    @if($selectedService)
                        <h2 class="text-4xl font-bold mb-3 text-slate-900 dark:text-white tracking-tight">Uzman Seçimi</h2>
                        <p class="text-slate-500 dark:text-slate-400 mb-10 text-lg">Seçilen Hizmet: <span class="text-amber-600 dark:text-amber-400 font-semibold">{{ $selectedService->name }}</span></p>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach($employees as $employee)
                                <div wire:click="selectEmployee({{ $employee->id }})" class="group cursor-pointer rounded-2xl border-2 border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900/50 hover:border-amber-400 dark:hover:border-amber-500 hover:shadow-2xl hover:shadow-amber-100 dark:hover:shadow-none transition-all duration-300 text-center p-8 flex flex-col items-center transform hover:-translate-y-1">
                                    <div class="w-28 h-28 rounded-full bg-slate-100 dark:bg-slate-800 mb-5 overflow-hidden border-4 border-white dark:border-slate-900 shadow-xl shadow-slate-200/50 dark:shadow-none group-hover:border-amber-200 dark:group-hover:border-amber-500 group-hover:shadow-amber-200/50 transition-all relative">
                                        @if($employee->avatar_url)
                                            <img src="{{ $employee->avatar_url }}" alt="{{ $employee->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-400 dark:text-slate-500 text-4xl font-light">{{ substr($employee->name, 0, 1) }}</div>
                                        @endif
                                    </div>
                                    <h3 class="text-xl font-bold text-slate-800 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors">{{ $employee->name }}</h3>
                                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-2 font-medium">{{ $employee->bio ?? 'Uzman Personel' }}</p>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-12 flex justify-start pt-6 border-t border-slate-100 dark:border-slate-800">
                            <button wire:click="previousStep" class="text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors flex items-center text-sm font-bold uppercase tracking-wider cursor-pointer">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                Geri Dön
                            </button>
                        </div>
                    @endif
                </div>

                <!-- Step 3: Select Date & Time -->
                <div x-show="activeStep === 3"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="space-y-6">
                    @if($selectedEmployee && $selectedService)
                        <h2 class="text-4xl font-bold mb-3 text-slate-900 dark:text-white tracking-tight">Tarih ve Saat</h2>
                        <p class="text-slate-500 dark:text-slate-400 mb-10 text-lg"><span class="font-bold text-slate-800 dark:text-white">{{ $selectedEmployee->name }}</span> ile <span class="text-amber-600 dark:text-amber-400 font-semibold">{{ $selectedService->name }}</span> randevusu.</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <!-- Date Picker -->
                            <div class="bg-slate-50 dark:bg-slate-950/30 p-6 rounded-2xl border border-slate-100 dark:border-slate-800">
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-400 mb-4 uppercase tracking-wider">Tarih Seçin</label>
                                <input type="date" wire:model.live="date" class="w-full bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 text-slate-800 dark:text-white rounded-xl px-5 py-4 focus:outline-none focus:ring-4 focus:ring-amber-500/20 focus:border-amber-500 transition-all font-semibold shadow-sm" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}">
                            </div>
                            
                            <!-- Time Slots -->
                            <div>
                                <label class="block text-sm font-bold text-slate-700 dark:text-slate-400 mb-4 uppercase tracking-wider">Saat Seçin</label>
                                @if(empty($timeSlots))
                                    <div class="p-6 rounded-xl bg-red-50 dark:bg-red-950/20 border-2 border-red-100 dark:border-red-900/30 text-red-600 dark:text-red-400 text-sm font-semibold flex items-center">
                                        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Seçili tarihte uygun saat bulunmamaktadır.
                                    </div>
                                @else
                                    <div class="grid grid-cols-3 sm:grid-cols-4 gap-4">
                                        @foreach($timeSlots as $slot)
                                            <div class="relative">
                                                <button wire:click="selectTime('{{ $slot }}')" class="w-full py-3.5 rounded-xl border-2 border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 hover:bg-slate-900 hover:border-slate-900 dark:hover:bg-amber-500 dark:hover:border-amber-500 hover:text-white dark:hover:text-slate-950 hover:shadow-xl hover:shadow-slate-900/20 font-bold transition-all duration-300 transform hover:-translate-y-1 cursor-pointer">
                                                    {{ $slot }}
                                                </button>
                                                <!-- Popular Hours Tag indicator -->
                                                @if(in_array($slot, ['10:00', '13:00', '16:00']))
                                                    <span class="absolute -top-2 -right-1 bg-amber-500 text-white text-[8px] font-black px-1.5 py-0.5 rounded-full uppercase tracking-wider scale-90 select-none pointer-events-none">Popüler</span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                @error('time') <span class="text-red-500 text-sm mt-3 block font-bold">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="mt-12 flex justify-start pt-6 border-t border-slate-100 dark:border-slate-800">
                            <button wire:click="previousStep" class="text-slate-400 hover:text-slate-900 dark:hover:text-white transition-colors flex items-center text-sm font-bold uppercase tracking-wider cursor-pointer">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                Geri Dön
                            </button>
                        </div>
                    @endif
                </div>

                <!-- Step 4: Customer Details -->
                <div x-show="activeStep === 4"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="space-y-6">
                    @if($selectedService && $selectedEmployee)
                        <h2 class="text-4xl font-bold mb-3 text-slate-900 dark:text-white tracking-tight">Randevuyu Tamamla</h2>
                        <p class="text-slate-500 dark:text-slate-400 mb-10 text-lg">Bilgilerinizi girerek randevunuzu onaylayın.</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <!-- Form -->
                            <div class="space-y-6 bg-slate-50 dark:bg-slate-950/30 p-8 rounded-2xl border border-slate-100 dark:border-slate-800">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-400 mb-2">Ad Soyad</label>
                                    <input type="text" wire:model="customer_name" class="w-full bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 text-slate-800 dark:text-white rounded-xl px-4 py-3.5 focus:outline-none focus:ring-4 focus:ring-amber-500/20 focus:border-amber-500 transition-all font-medium placeholder:text-slate-400 placeholder:font-normal" placeholder="Örn: Ahmet Yılmaz">
                                    @error('customer_name') <span class="text-red-500 text-xs mt-2 block font-bold">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-400 mb-2">E-posta Adresi</label>
                                    <input type="email" wire:model="customer_email" class="w-full bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 text-slate-800 dark:text-white rounded-xl px-4 py-3.5 focus:outline-none focus:ring-4 focus:ring-amber-500/20 focus:border-amber-500 transition-all font-medium placeholder:text-slate-400 placeholder:font-normal" placeholder="ornek@email.com">
                                    @error('customer_email') <span class="text-red-500 text-xs mt-2 block font-bold">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-400 mb-2">Telefon Numarası</label>
                                    <input type="text" wire:model="customer_phone" class="w-full bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 text-slate-800 dark:text-white rounded-xl px-4 py-3.5 focus:outline-none focus:ring-4 focus:ring-amber-500/20 focus:border-amber-500 transition-all font-medium placeholder:text-slate-400 placeholder:font-normal" placeholder="0555 555 5555">
                                    @error('customer_phone') <span class="text-red-500 text-xs mt-2 block font-bold">{{ $message }}</span> @enderror
                                </div>

                                <!-- Promo Code Section -->
                                <div class="pt-6 border-t border-slate-200 dark:border-slate-800">
                                    <label class="block text-sm font-bold text-slate-700 dark:text-slate-400 mb-2">Promosyon Kodu</label>
                                    <div class="flex gap-2">
                                        <input type="text" wire:model.live="promoCode" class="flex-grow bg-white dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 text-slate-800 dark:text-white rounded-xl px-4 py-2 focus:outline-none focus:border-amber-500 font-semibold placeholder:text-slate-400 placeholder:font-normal uppercase text-sm" placeholder="Örn: LUXE20">
                                        <button type="button" wire:click="applyPromoCode" class="px-5 py-2 bg-slate-900 dark:bg-amber-500 hover:bg-slate-800 dark:hover:bg-amber-400 text-white dark:text-slate-950 font-bold rounded-xl text-xs transition-all duration-300 transform active:scale-95 cursor-pointer whitespace-nowrap">Uygula</button>
                                    </div>
                                    @if($promoError)
                                        <span class="text-red-500 text-xs mt-2 block font-semibold">{{ $promoError }}</span>
                                    @endif
                                    @if($promoSuccess)
                                        <span class="text-green-500 text-xs mt-2 block font-semibold">{{ $promoSuccess }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Summary Card -->
                            <div class="flex flex-col h-full">
                                <div class="bg-slate-900 text-white rounded-2xl p-8 shadow-2xl relative overflow-hidden flex-grow">
                                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-amber-500/20 rounded-full blur-[40px]"></div>
                                    <h3 class="text-xl font-bold text-white mb-6 border-b border-white/10 pb-4">Randevu Özeti</h3>
                                    
                                    <div class="space-y-5 relative z-10">
                                        <div class="flex justify-between items-center">
                                            <span class="text-slate-400 text-sm font-medium">Hizmet</span>
                                            <span class="text-white font-bold">{{ $selectedService->name }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-slate-400 text-sm font-medium">Uzman</span>
                                            <span class="text-white font-bold">{{ $selectedEmployee->name }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-slate-400 text-sm font-medium">Tarih</span>
                                            <span class="text-white font-bold">{{ \Carbon\Carbon::parse($date)->format('d.m.Y') }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-slate-400 text-sm font-medium">Saat</span>
                                            <span class="text-amber-400 font-bold text-xl">{{ $time }}</span>
                                        </div>
                                        @if($discountAmount > 0)
                                            <div class="flex justify-between items-center text-green-400 border-t border-white/5 pt-3">
                                                <span class="text-slate-400 text-sm font-medium">İndirim</span>
                                                <span class="font-bold">-{{ number_format($discountAmount, 0) }} ₺</span>
                                            </div>
                                        @endif
                                        <div class="pt-6 mt-4 border-t border-white/10 flex justify-between items-end">
                                            <span class="text-slate-400 font-bold uppercase tracking-wider text-xs">Toplam Tutar</span>
                                            <span class="text-4xl font-black text-white">{{ number_format($selectedService->price - $discountAmount, 0) }} ₺</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-6 flex gap-4">
                                    <button wire:click="previousStep" class="px-6 py-4 rounded-xl border-2 border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 font-bold hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white transition-colors cursor-pointer">
                                        Geri
                                    </button>
                                    <button wire:click="confirmBooking" class="flex-1 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-400 hover:to-amber-500 text-white font-bold py-4 px-6 rounded-xl shadow-xl shadow-amber-500/30 transition-all transform hover:-translate-y-1 relative overflow-hidden group cursor-pointer">
                                        <span class="relative z-10 flex items-center justify-center">
                                            Ödemeye Geç
                                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Step 5: Payment (Mock) -->
                <div x-show="activeStep === 5"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="space-y-6">
                    @if($selectedService && $selectedEmployee)
                        <h2 class="text-4xl font-bold mb-3 text-slate-900 dark:text-white tracking-tight">Güvenli Ödeme</h2>
                        <p class="text-slate-500 dark:text-slate-400 mb-10 text-lg">İşleminizi tamamlamak için kart bilgilerinizi girin.</p>
                        
                        <div class="max-w-md mx-auto bg-slate-50 dark:bg-slate-950/50 p-8 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-xl">
                            <!-- Card Mock -->
                            <div class="h-48 bg-gradient-to-tr from-slate-900 to-slate-800 rounded-2xl p-6 flex flex-col justify-between text-white mb-8 shadow-2xl relative overflow-hidden border border-slate-700/50">
                                <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
                                <div class="flex justify-between items-start relative z-10">
                                    <svg class="w-10 h-10 text-amber-400 opacity-80" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg>
                                    <div class="text-xs font-bold tracking-widest opacity-60">LUXEPAY</div>
                                </div>
                                <div class="relative z-10 space-y-2">
                                    <div class="text-sm opacity-80 font-mono tracking-widest">**** **** **** ****</div>
                                    <div class="flex justify-between">
                                        <div class="text-sm font-bold uppercase">{{ $customer_name ?: 'İSİM SOYİSİM' }}</div>
                                        <div class="text-sm font-mono">**/**</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Payment Form Fields (Visual only) -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">Kart Numarası</label>
                                    <input type="text" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white focus:outline-none focus:border-amber-500 transition-colors font-mono" placeholder="0000 0000 0000 0000" maxlength="19">
                                </div>
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">S.K.T</label>
                                        <input type="text" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white focus:outline-none focus:border-amber-500 transition-colors font-mono" placeholder="AA/YY" maxlength="5">
                                    </div>
                                    <div class="flex-1">
                                        <label class="block text-xs font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-2">CVV</label>
                                        <input type="text" class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 text-slate-900 dark:text-white focus:outline-none focus:border-amber-500 transition-colors font-mono" placeholder="123" maxlength="3">
                                    </div>
                                </div>
                                
                                <div class="pt-4 flex items-center justify-between font-bold text-slate-900 dark:text-white">
                                    <span>Ödenecek Tutar</span>
                                    <span class="text-2xl text-amber-500">{{ number_format($selectedService->price - $discountAmount, 0) }} ₺</span>
                                </div>
                                
                                <button wire:click="processPayment" class="w-full mt-4 bg-slate-900 dark:bg-amber-500 hover:bg-slate-800 dark:hover:bg-amber-400 text-white dark:text-slate-950 font-bold py-4 px-6 rounded-xl shadow-xl transition-all flex items-center justify-center gap-2 cursor-pointer relative overflow-hidden group">
                                    <span wire:loading.remove wire:target="processPayment">
                                        Güvenli Ödeme Yap
                                    </span>
                                    <span wire:loading wire:target="processPayment" class="flex items-center">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        İşleniyor...
                                    </span>
                                </button>
                                
                                <button wire:click="previousStep" class="w-full text-center text-sm font-bold text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 mt-4 transition-colors">
                                    Vazgeç ve Geri Dön
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Step 6: Success -->
                <div x-show="activeStep === 6"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform scale-100"
                     x-transition:leave-end="opacity-0 transform scale-95"
                     class="space-y-6">
                    @if($selectedService && $selectedEmployee)
                        <div class="text-center py-16">
                            <div class="w-28 h-28 bg-green-50 dark:bg-green-950/20 text-green-500 rounded-full flex items-center justify-center mx-auto mb-8 shadow-xl shadow-green-500/10 border-8 border-white dark:border-slate-900 relative">
                                <div class="absolute inset-0 rounded-full border-4 border-green-500 border-t-transparent animate-spin" style="animation-duration: 3s;"></div>
                                <svg class="w-12 h-12 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <h2 class="text-5xl font-black mb-4 text-slate-900 dark:text-white tracking-tight">Harika!</h2>
                            <p class="text-slate-500 dark:text-slate-400 mb-12 max-w-lg mx-auto text-xl">Randevunuz başarıyla oluşturuldu <span class="text-slate-900 dark:text-white font-bold">{{ $customer_name }}</span>. Onay e-postanız <b>{{ $customer_email }}</b> adresine gönderildi.</p>
                            
                            <div class="bg-slate-900 text-white rounded-3xl p-8 inline-block text-left mb-12 shadow-2xl relative overflow-hidden max-w-md w-full border border-white/10">
                                <div class="absolute -right-10 -bottom-10 w-44 h-44 bg-amber-500/20 rounded-full blur-[40px]"></div>
                                <div class="space-y-6 relative z-10">
                                    <!-- Date & Time Row -->
                                    <div class="flex items-center gap-4 border-b border-white/10 pb-4">
                                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-amber-400 border border-white/15">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest animate-pulse">Tarih & Saat</p>
                                            <p class="text-white font-black text-lg">{{ \Carbon\Carbon::parse($date)->format('d.m.Y') }} - {{ $time }}</p>
                                        </div>
                                    </div>
                                    
                                    <!-- Service & Expert Row -->
                                    <div class="flex items-center gap-4 border-b border-white/10 pb-4">
                                        <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center text-amber-400 border border-white/15">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Hizmet & Uzman</p>
                                            <p class="text-white font-bold text-sm">{{ $selectedService->name }}</p>
                                            <p class="text-amber-400 text-xs font-semibold">{{ $selectedEmployee->name }}</p>
                                        </div>
                                    </div>

                                    <!-- Price Row -->
                                    <div class="flex justify-between items-center pt-2">
                                        <span class="text-xs text-slate-400 font-bold uppercase tracking-wider">Ödenen Tutar</span>
                                        <span class="text-2xl font-black text-white">{{ number_format($selectedService->price - $discountAmount, 0) }} ₺</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Premium Add to Calendar & Action Options -->
                            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                                <!-- Add to Google Calendar URL -->
                                @php
                                    $gCalTitle = rawurlencode('LuxeBook Randevu: ' . $selectedService->name);
                                    $gCalDetails = rawurlencode('Uzman: ' . $selectedEmployee->name . "\nKonum: Bağdat Cad. No:123, Kadıköy");
                                    $startDT = \Carbon\Carbon::parse($date . ' ' . $time)->format('Ymd\THis');
                                    $endDT = \Carbon\Carbon::parse($date . ' ' . $time)->addMinutes($selectedService->duration_minutes)->format('Ymd\THis');
                                    $gCalURL = "https://calendar.google.com/calendar/render?action=TEMPLATE&text={$gCalTitle}&dates={$startDT}/{$endDT}&details={$gCalDetails}&sf=true&output=xml";
                                @endphp
                                
                                <a href="{{ $gCalURL }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-4 bg-slate-900 dark:bg-amber-500 hover:bg-slate-800 dark:hover:bg-amber-400 text-white dark:text-slate-950 font-bold text-sm rounded-xl shadow-md transition-colors cursor-pointer">
                                    <svg class="w-4 h-4 text-amber-400 dark:text-slate-950" fill="currentColor" viewBox="0 0 24 24"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm-5-5h5v5h-5z"/></svg>
                                    Google Takvime Ekle
                                </a>
                                
                                <button onclick="window.location.reload()" class="bg-white dark:bg-slate-800 border-2 border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-600 text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white font-bold py-4 px-8 rounded-xl shadow-sm transition-all transform hover:-translate-y-1 cursor-pointer">
                                    Yeni Bir İşlem Yap
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

            </div>

            <style>
                .animate-fade-in-up {
                    animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
                    opacity: 0;
                }
                .animate-fade-in {
                    animation: fadeIn 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
                    opacity: 0;
                }
                .animate-slide-rtl {
                    animation: slideRtl 4s linear infinite;
                }
                @keyframes slideRtl {
                    0% { background-position: 200% center; }
                    100% { background-position: -200% center; }
                }
                @keyframes fadeInUp {
                    from { opacity: 0; transform: translateY(40px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                @keyframes fadeIn {
                    from { opacity: 0; }
                    to { opacity: 1; }
                }
            </style>
        </div>
    @endif
</div>

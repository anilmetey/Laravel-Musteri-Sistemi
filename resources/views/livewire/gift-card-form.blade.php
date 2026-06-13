<div x-data="{ recipient: @entangle('recipient_name'), amount: @entangle('amount'), design: @entangle('design'), message: @entangle('message') }" class="relative overflow-hidden pb-32 bg-slate-50/50 dark:bg-slate-950/30 transition-colors duration-300">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-amber-200/10 dark:bg-amber-500/5 rounded-full blur-[150px] pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-6 sm:px-8 relative z-10 pt-10">
        <!-- Back button -->
        <a href="/" wire:navigate class="inline-flex items-center text-xs font-bold text-slate-400 hover:text-amber-600 transition-colors uppercase tracking-widest mb-10 group bg-white dark:bg-slate-900 rounded-full px-5 py-2.5 shadow-sm border border-slate-100 dark:border-slate-800">
            <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Ana Sayfaya Dön
        </a>

        <p class="text-slate-400 text-lg max-w-lg mb-12 leading-relaxed font-light">Sevdiklerinize LuxeBook'un lüks bakım deneyimini hediye edin. Kartı özelleştirin, ödemeyi yapın ve anında e-posta ile gönderin.</p>

        @if($isSuccess)
            <div class="bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 text-emerald-600 dark:text-emerald-400 px-8 py-12 rounded-[2rem] text-center mb-6 shadow-sm">
                <div class="w-20 h-20 bg-emerald-100 dark:bg-emerald-800/50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h3 class="text-3xl font-black mb-3">Siparişiniz Tamamlandı!</h3>
                <p class="text-lg font-medium opacity-80 mb-8 max-w-md mx-auto">Hediye kartınız başarıyla oluşturuldu ve alıcının kullanımına hazır. Gösterdiğiniz ilgi için teşekkür ederiz.</p>
                <button wire:click="$set('isSuccess', false)" class="px-8 py-4 bg-slate-900 dark:bg-emerald-600 text-white font-bold rounded-xl shadow-lg transition-transform hover:-translate-y-0.5 cursor-pointer">Yeni Hediye Kartı Oluştur</button>
            </div>
        @else
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left Side: Interactive Live Gift Card Mockup Preview -->
            <div class="lg:col-span-6 flex flex-col items-center justify-center space-y-8 sticky top-32">
                <h3 class="text-sm font-bold text-slate-400 uppercase tracking-widest">Hediye Kartı Önizleme</h3>
                
                <!-- Card Mockup container -->
                <div class="relative w-full max-w-[420px] aspect-[1.6/1] rounded-3xl p-8 shadow-2xl flex flex-col justify-between overflow-hidden border transition-all duration-500 transform hover:rotate-2 hover:scale-[1.02] cursor-default"
                     :class="{
                         'bg-gradient-to-br from-amber-500 via-orange-400 to-yellow-600 text-white border-amber-400 shadow-amber-500/10': design === 'gold',
                         'bg-gradient-to-br from-slate-300 via-slate-400 to-slate-600 text-white border-slate-300 shadow-slate-500/10': design === 'silver',
                         'bg-gradient-to-br from-slate-950 via-slate-800 to-slate-950 text-white border-slate-800 shadow-slate-950/20': design === 'platinum'
                     }">
                    
                    <!-- Decorative mesh circle -->
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-[30px] pointer-events-none"></div>
                    
                    <!-- Header: Logo -->
                    <div class="relative z-10 flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center font-bold text-base shadow-md"
                                 :class="{
                                     'bg-white text-amber-600': design === 'gold',
                                     'bg-white text-slate-600': design === 'silver',
                                     'bg-amber-500 text-slate-950': design === 'platinum'
                                 }">L</div>
                            <span class="font-bold text-lg tracking-tight">Luxe<span class="font-light" :class="design === 'platinum' ? 'text-amber-500' : 'opacity-80'">Book</span></span>
                        </div>
                        <span class="text-[9px] font-black uppercase tracking-[0.2em]" :class="design === 'platinum' ? 'text-amber-400' : 'text-white/80'">Vip Hediye Kartı</span>
                    </div>

                    <!-- Card Body: Message -->
                    <div class="relative z-10 py-4">
                        <p class="text-xs italic" :class="design === 'platinum' ? 'text-slate-300' : 'text-white/95'" x-text="message || 'Sevdikleriniz için harika bir mesaj yazın...'"></p>
                    </div>

                    <!-- Card Footer: Recipient & Amount -->
                    <div class="relative z-10 flex justify-between items-end border-t border-white/20 pt-4">
                        <div>
                            <span class="block text-[8px] uppercase tracking-widest" :class="design === 'platinum' ? 'text-slate-500' : 'text-white/60'">Alıcı</span>
                            <span class="font-bold text-sm" x-text="recipient || 'Sayın Alıcı'"></span>
                        </div>
                        <div class="text-right">
                            <span class="block text-[8px] uppercase tracking-widest" :class="design === 'platinum' ? 'text-slate-500' : 'text-white/60'">Miktar</span>
                            <span class="font-black text-2xl" x-text="amount + ' ₺'"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Configurer Form -->
            <div class="lg:col-span-6 bg-white dark:bg-slate-900 rounded-3xl p-8 sm:p-10 border border-slate-100 dark:border-slate-800 shadow-sm relative overflow-hidden">
                <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Kartınızı Özelleştirin</h3>
                
                <form wire:submit.prevent="submit" class="space-y-6">
                    <!-- Card Design Selector -->
                    <div>
                        <label class="block text-[10px] font-black text-slate-700 dark:text-slate-400 uppercase tracking-widest mb-3">Tasarım Seçin</label>
                        <div class="grid grid-cols-3 gap-4">
                            <button type="button" @click="design = 'gold'; $wire.set('design', 'gold')" class="py-3 rounded-xl border-2 font-bold text-xs transition-all cursor-pointer"
                                    :class="design === 'gold' ? 'border-amber-500 bg-amber-50 dark:bg-amber-950/20 text-amber-600' : 'border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 bg-white dark:bg-slate-900'">
                                Premium Gold
                            </button>
                            <button type="button" @click="design = 'silver'; $wire.set('design', 'silver')" class="py-3 rounded-xl border-2 font-bold text-xs transition-all cursor-pointer"
                                    :class="design === 'silver' ? 'border-slate-400 bg-slate-50 dark:bg-slate-800/20 text-slate-600' : 'border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 bg-white dark:bg-slate-900'">
                                Classic Silver
                            </button>
                            <button type="button" @click="design = 'platinum'; $wire.set('design', 'platinum')" class="py-3 rounded-xl border-2 font-bold text-xs transition-all cursor-pointer"
                                    :class="design === 'platinum' ? 'border-slate-950 bg-slate-100 dark:bg-slate-850 text-slate-900 dark:text-slate-200' : 'border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 bg-white dark:bg-slate-900'">
                                Vip Platinum
                            </button>
                        </div>
                    </div>

                    <!-- Card Amount Selector -->
                    <div>
                        <label class="block text-[10px] font-black text-slate-700 dark:text-slate-400 uppercase tracking-widest mb-3">Hediye Tutarı</label>
                        <div class="grid grid-cols-4 gap-3">
                            @foreach(['250', '500', '1000', '2500'] as $val)
                                <button type="button" @click="amount = '{{ $val }}'; $wire.set('amount', '{{ $val }}')" class="py-3 rounded-xl border-2 font-bold text-sm transition-all cursor-pointer"
                                        :class="amount === '{{ $val }}' ? 'border-amber-500 bg-amber-500 text-white dark:text-slate-950' : 'border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 bg-white dark:bg-slate-900'">
                                    {{ $val }} ₺
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Recipient Name -->
                    <div>
                        <label class="block text-[10px] font-black text-slate-700 dark:text-slate-400 uppercase tracking-widest mb-2">Alıcının Adı Soyadı</label>
                        <input type="text" x-model="recipient" wire:model="recipient_name" required class="w-full bg-slate-50/50 dark:bg-slate-950/30 border border-slate-200 dark:border-slate-800 focus:border-slate-800 dark:focus:border-slate-400 text-slate-800 dark:text-white rounded-xl px-4 py-3.5 focus:outline-none focus:ring-4 focus:ring-slate-800/5 transition-all font-medium" placeholder="Örn: Merve Şen">
                        @error('recipient_name') <span class="text-red-500 text-xs mt-1 block font-bold">{{ $message }}</span> @enderror
                    </div>

                    <!-- Personal Message -->
                    <div>
                        <label class="block text-[10px] font-black text-slate-700 dark:text-slate-400 uppercase tracking-widest mb-2">Hediye Mesajınız</label>
                        <textarea x-model="message" wire:model="message" rows="3" class="w-full bg-slate-50/50 dark:bg-slate-950/30 border border-slate-200 dark:border-slate-800 focus:border-slate-800 dark:focus:border-slate-400 text-slate-800 dark:text-white rounded-xl px-4 py-3.5 focus:outline-none focus:ring-4 focus:ring-slate-800/5 transition-all font-medium resize-none" placeholder="Örn: Doğum günün kutlu olsun, keyifli bir bakım dilerim!"></textarea>
                        @error('message') <span class="text-red-500 text-xs mt-1 block font-bold">{{ $message }}</span> @enderror
                    </div>

                    <!-- Credit Card Simulation details -->
                    <div class="pt-6 border-t border-slate-100 dark:border-slate-800 space-y-4">
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white">Ödeme Bilgileri</h4>
                        <div class="space-y-3">
                            <div>
                                <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Kart Numarası</label>
                                <input type="text" wire:model="cardNumber" required class="w-full bg-slate-50/50 dark:bg-slate-950/30 border border-slate-200 dark:border-slate-800 focus:border-slate-800 text-slate-800 dark:text-white rounded-xl px-4 py-3 focus:outline-none" placeholder="0000 0000 0000 0000">
                                @error('cardNumber') <span class="text-red-500 text-xs mt-1 block font-bold">{{ $message }}</span> @enderror
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Son Kullanma (AA/YY)</label>
                                    <input type="text" wire:model="cardExpiry" required class="w-full bg-slate-50/50 dark:bg-slate-950/30 border border-slate-200 dark:border-slate-800 focus:border-slate-800 text-slate-800 dark:text-white rounded-xl px-4 py-3 focus:outline-none" placeholder="12/28">
                                    @error('cardExpiry') <span class="text-red-500 text-xs mt-1 block font-bold">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-[9px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">CVC</label>
                                    <input type="text" wire:model="cardCvc" required class="w-full bg-slate-50/50 dark:bg-slate-950/30 border border-slate-200 dark:border-slate-800 focus:border-slate-800 text-slate-800 dark:text-white rounded-xl px-4 py-3 focus:outline-none" placeholder="123">
                                    @error('cardCvc') <span class="text-red-500 text-xs mt-1 block font-bold">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 dark:bg-amber-500 dark:hover:bg-amber-400 text-white dark:text-slate-950 font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer relative overflow-hidden">
                        <span wire:loading.remove>Sipariş Ver ve Gönder</span>
                        <span wire:loading>İşleniyor...</span>
                    </button>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>

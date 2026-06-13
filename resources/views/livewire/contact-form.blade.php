<div class="lg:col-span-7 bg-white dark:bg-slate-900 rounded-3xl p-8 sm:p-10 border border-slate-100 dark:border-slate-800 shadow-sm relative overflow-hidden">
    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Bize Mesaj Gönderin</h2>
    
    @if($isSuccess)
        <div class="bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 text-emerald-600 dark:text-emerald-400 px-6 py-8 rounded-2xl text-center mb-6">
            <svg class="w-12 h-12 mx-auto mb-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <h3 class="text-lg font-bold mb-2">Mesajınız Alındı!</h3>
            <p class="text-sm font-medium">En kısa sürede sizinle iletişime geçeceğiz. İlginiz için teşekkür ederiz.</p>
            <button wire:click="$set('isSuccess', false)" class="mt-6 px-6 py-2 bg-slate-900 dark:bg-emerald-600 text-white font-bold rounded-xl text-sm transition-transform hover:-translate-y-0.5 cursor-pointer">Yeni Mesaj Gönder</button>
        </div>
    @else
        <form wire:submit="submit" class="space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-700 dark:text-slate-400 uppercase tracking-widest mb-2">Ad Soyad</label>
                    <input type="text" wire:model="name" required class="w-full bg-slate-50/50 dark:bg-slate-950/30 border border-slate-200 dark:border-slate-800 focus:border-slate-800 dark:focus:border-slate-400 text-slate-800 dark:text-white rounded-xl px-4 py-3.5 focus:outline-none focus:ring-4 focus:ring-slate-800/5 transition-all font-medium" placeholder="Ahmet Yılmaz">
                    @error('name') <span class="text-red-500 text-xs mt-1 block font-bold">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-700 dark:text-slate-400 uppercase tracking-widest mb-2">E-posta Adresi</label>
                    <input type="email" wire:model="email" required class="w-full bg-slate-50/50 dark:bg-slate-950/30 border border-slate-200 dark:border-slate-800 focus:border-slate-800 dark:focus:border-slate-400 text-slate-800 dark:text-white rounded-xl px-4 py-3.5 focus:outline-none focus:ring-4 focus:ring-slate-800/5 transition-all font-medium" placeholder="ornek@email.com">
                    @error('email') <span class="text-red-500 text-xs mt-1 block font-bold">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-700 dark:text-slate-400 uppercase tracking-widest mb-2">Telefon Numarası</label>
                    <input type="tel" wire:model="phone" class="w-full bg-slate-50/50 dark:bg-slate-950/30 border border-slate-200 dark:border-slate-800 focus:border-slate-800 dark:focus:border-slate-400 text-slate-800 dark:text-white rounded-xl px-4 py-3.5 focus:outline-none focus:ring-4 focus:ring-slate-800/5 transition-all font-medium" placeholder="0555 555 55 55">
                    @error('phone') <span class="text-red-500 text-xs mt-1 block font-bold">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-700 dark:text-slate-400 uppercase tracking-widest mb-2">Konu</label>
                    <select wire:model="subject" class="w-full bg-slate-50/50 dark:bg-slate-950/30 border border-slate-200 dark:border-slate-800 focus:border-slate-800 dark:focus:border-slate-400 text-slate-800 dark:text-white rounded-xl px-4 py-3.5 focus:outline-none focus:ring-4 focus:ring-slate-800/5 transition-all font-medium">
                        <option class="dark:bg-slate-900">Genel Sorular & Bilgi</option>
                        <option class="dark:bg-slate-900">Görüş & Öneriler</option>
                        <option class="dark:bg-slate-900">Özel Hizmet Talebi</option>
                        <option class="dark:bg-slate-900">Şikayet & Destek</option>
                    </select>
                    @error('subject') <span class="text-red-500 text-xs mt-1 block font-bold">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-slate-700 dark:text-slate-400 uppercase tracking-widest mb-2">Mesajınız</label>
                <textarea rows="5" wire:model="message" required class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 focus:border-slate-800 dark:focus:border-slate-400 text-slate-800 dark:text-white rounded-xl px-4 py-3.5 focus:outline-none focus:ring-4 focus:ring-slate-800/5 transition-all font-medium resize-none" placeholder="Mesajınızı buraya yazın..."></textarea>
                @error('message') <span class="text-red-500 text-xs mt-1 block font-bold">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full bg-slate-900 dark:bg-amber-500 hover:bg-slate-800 dark:hover:bg-amber-400 text-white dark:text-slate-950 font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer relative overflow-hidden">
                <span wire:loading.remove>Mesajı Gönder</span>
                <span wire:loading>Gönderiliyor...</span>
            </button>
        </form>
    @endif
</div>

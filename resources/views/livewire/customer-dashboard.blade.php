<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;

new class extends Component {
    public $upcomingAppointments = [];
    public $pastAppointments = [];

    public function mount()
    {
        $user = Auth::user();
        
        $allAppointments = $user->appointments()
            ->with(['service', 'employee'])
            ->orderBy('start_time', 'desc')
            ->get();

        $now = now();
        
        $this->upcomingAppointments = $allAppointments->filter(fn($app) => $app->start_time >= $now)->values();
        $this->pastAppointments = $allAppointments->filter(fn($app) => $app->start_time < $now)->values();
    }

    public function logout(\App\Livewire\Actions\Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="space-y-6 sm:space-y-10">
    <!-- Header Row with Logout -->
    <div class="flex justify-between items-center bg-white dark:bg-slate-900 overflow-hidden shadow-sm rounded-2xl border border-slate-100 dark:border-slate-800 p-6">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-500/10 rounded-full flex items-center justify-center text-amber-500 font-bold text-xl">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white">Hoş Geldiniz, {{ explode(' ', Auth::user()->name)[0] }}</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <button wire:click="logout" class="flex items-center gap-2 px-4 py-2 bg-red-50 dark:bg-red-500/10 text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-500/20 rounded-xl transition-colors font-bold text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            <span class="hidden sm:inline">Çıkış Yap</span>
        </button>
    </div>

    <!-- Stats Row -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-slate-900 overflow-hidden shadow-sm rounded-2xl border border-slate-100 dark:border-slate-800 p-6 flex items-center">
            <div class="w-14 h-14 bg-amber-50 dark:bg-amber-500/10 rounded-xl flex items-center justify-center text-amber-500 mr-5">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Yaklaşan Randevular</p>
                <h3 class="text-3xl font-black text-slate-900 dark:text-white">{{ count($upcomingAppointments) }}</h3>
            </div>
        </div>
        
        <div class="bg-white dark:bg-slate-900 overflow-hidden shadow-sm rounded-2xl border border-slate-100 dark:border-slate-800 p-6 flex items-center">
            <div class="w-14 h-14 bg-slate-50 dark:bg-slate-800 rounded-xl flex items-center justify-center text-slate-500 mr-5">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
            </div>
            <div>
                <p class="text-sm font-bold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Geçmiş Randevular</p>
                <h3 class="text-3xl font-black text-slate-900 dark:text-white">{{ count($pastAppointments) }}</h3>
            </div>
        </div>
        
        <div class="bg-gradient-to-r from-amber-500 to-orange-500 overflow-hidden shadow-sm rounded-2xl p-6 flex items-center text-white relative">
            <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
            <div class="relative z-10 w-full flex justify-between items-center">
                <div>
                    <h3 class="text-xl font-bold mb-1">Yeni Randevu</h3>
                    <p class="text-amber-100 text-sm">Kendinize vakit ayırın.</p>
                </div>
                <a href="/" wire:navigate class="w-12 h-12 bg-white/20 hover:bg-white/30 transition-colors rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Upcoming Appointments -->
    <div class="bg-white dark:bg-slate-900 shadow-sm rounded-2xl border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="p-6 border-b border-slate-100 dark:border-slate-800">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Yaklaşan Randevular</h3>
        </div>
        
        <div class="p-6">
            @if(count($upcomingAppointments) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($upcomingAppointments as $app)
                        <div class="border-2 border-amber-100 dark:border-amber-500/20 bg-amber-50/50 dark:bg-amber-500/5 rounded-2xl p-5 flex gap-5 items-center relative overflow-hidden group">
                            <div class="absolute right-0 top-0 w-24 h-24 bg-amber-500/10 rounded-bl-full blur-xl"></div>
                            
                            <div class="w-16 h-16 rounded-2xl bg-white dark:bg-slate-800 flex flex-col items-center justify-center shadow-sm border border-slate-100 dark:border-slate-700 shrink-0 relative z-10">
                                <span class="text-xs font-bold text-slate-500 dark:text-slate-400 uppercase">{{ $app->start_time->translatedFormat('M') }}</span>
                                <span class="text-xl font-black text-amber-600 dark:text-amber-500">{{ $app->start_time->format('d') }}</span>
                            </div>
                            
                            <div class="relative z-10 flex-grow">
                                <h4 class="font-bold text-slate-900 dark:text-white text-lg">{{ $app->service->name }}</h4>
                                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium mt-0.5">Uzman: {{ $app->employee->name }}</p>
                                <div class="flex items-center gap-2 mt-3">
                                    <span class="bg-amber-100 dark:bg-amber-500/20 text-amber-700 dark:text-amber-400 text-xs font-bold px-2 py-1 rounded-md flex items-center">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ $app->start_time->format('H:i') }}
                                    </span>
                                    <span class="bg-emerald-100 dark:bg-emerald-500/20 text-emerald-700 dark:text-emerald-400 text-xs font-bold px-2 py-1 rounded-md">
                                        {{ ucfirst($app->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-10">
                    <div class="w-16 h-16 mx-auto bg-slate-50 dark:bg-slate-800 rounded-full flex items-center justify-center text-slate-400 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 font-medium">Yaklaşan randevunuz bulunmuyor.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Past Appointments -->
    <div class="bg-white dark:bg-slate-900 shadow-sm rounded-2xl border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="p-6 border-b border-slate-100 dark:border-slate-800">
            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Geçmiş Randevular</h3>
        </div>
        
        <div class="p-0">
            @if(count($pastAppointments) > 0)
                <div class="divide-y divide-slate-100 dark:divide-slate-800">
                    @foreach($pastAppointments as $app)
                        <div class="p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-500 shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 dark:text-slate-200">{{ $app->service->name }}</h4>
                                    <p class="text-sm text-slate-500 dark:text-slate-400">{{ $app->employee->name }}</p>
                                </div>
                            </div>
                            <div class="flex items-center sm:justify-end gap-6">
                                <div class="text-left sm:text-right">
                                    <p class="text-sm font-bold text-slate-700 dark:text-slate-300">{{ $app->start_time->translatedFormat('d F Y') }}</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">{{ $app->start_time->format('H:i') }}</p>
                                </div>
                                <span class="bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 text-xs font-bold px-2 py-1 rounded">Tamamlandı</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-10">
                    <p class="text-slate-500 dark:text-slate-400 font-medium">Geçmiş randevunuz bulunmuyor.</p>
                </div>
            @endif
        </div>
    </div>
</div>

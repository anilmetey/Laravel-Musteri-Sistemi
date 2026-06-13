<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/hizmetlerimiz', function () {
    return view('pages.hizmetlerimiz', [
        'services' => \App\Models\Service::all()
    ]);
})->name('services');

Route::get('/uzmanlarimiz', function () {
    return view('pages.uzmanlarimiz', [
        'employees' => \App\Models\Employee::all()
    ]);
})->name('experts');

Route::get('/hediye-karti', function () {
    return view('pages.hediyekarti');
})->name('gift-card');

Route::get('/iletisim', function () {
    return view('pages.iletisim');
})->name('contact');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

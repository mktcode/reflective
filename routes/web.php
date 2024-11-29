<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/billing-portal', function (Request $request) {
    if ($request->user()->hasStripeId()) {
        return $request->user()->redirectToBillingPortal();
    }

    return redirect()->route('profile');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Cashier;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/stripe/billing', function (Request $request) {
    if ($request->user()->hasStripeId()) {
        return $request->user()->redirectToBillingPortal();
    }

    return redirect()->route('profile');
})->middleware(['auth']);

Route::get('/charge-checkout', function (Request $request) {
    $checkoutSession = Cashier::stripe()->checkout->sessions->create([
        'line_items' => [
            [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => ['name' => 'T-Shirt'],
                    'unit_amount' => 1200,
                ],
                'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'payment_intent_data' => ['application_fee_amount' => 10],
        'success_url' => route('dashboard'),
        'cancel_url' => route('profile'),
    ], ['stripe_account' => $request->user()->getStripeAccountId()]);
    return redirect($checkoutSession->url);
})->middleware(['auth'])->name('charge-checkout');

require __DIR__.'/auth.php';

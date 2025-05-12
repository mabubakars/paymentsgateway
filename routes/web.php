<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('stripe', [StripeController::class, 'index']);
Route::post('stripe/create-charge', [StripeController::class, 'createCharge'])->name('stripe.create-charge');

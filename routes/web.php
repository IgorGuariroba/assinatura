<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\Subscription\SubscriptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[SiteController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function (){
    Route::get('/inscricao', [SubscriptionController::class, 'checkout'])->name('subscription.checkout');
    Route::get('/assinatura', [SubscriptionController::class, 'account'])->name('subscription.account');
    Route::get('/ativa', [SubscriptionController::class, 'resume'])->name('subscription.resume');

    Route::middleware(['subscription'])->group(function (){
        Route::get('/premium', [SubscriptionController::class, 'premium'])->name('subscription.premium');
        Route::post('/store', [SubscriptionController::class, 'store'])->name('subscription.store');
        Route::get('/invoice/{invoice}', [SubscriptionController::class, 'invoiceDownload'])->name('subscription.invoice.download');
        Route::get('/cancela', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
    });
});

require __DIR__.'/auth.php';

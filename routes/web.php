<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function (){
    Route::get('/inscricao', [SubscriptionController::class, 'checkout'], function (){})->name('subscription.checkout');
    Route::get('/inscricao', [SubscriptionController::class, 'premium'], function (){})->name('subscription.premium');
});

require __DIR__.'/auth.php';

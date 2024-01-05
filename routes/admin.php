<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix(env('ADMIN_PREFIX'))
    ->middleware(['auth', 'verified', 'admin'])
    ->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('get__admin_index');
        Route::get('/send-auth-code', [AdminController::class, 'sendTelegramCodeForAuth'])->name('get__admin_send-auth-code');
        Route::post('/check-auth-code', [AdminController::class, 'checkAuthCode'])->name('post__admin_check-auth-code');
})->name('admin');

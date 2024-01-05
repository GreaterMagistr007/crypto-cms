<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix(env('ADMIN_PREFIX'))
    ->middleware(['auth', 'verified', 'admin'])
    ->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('get__admin_index');
        Route::patch('/send-auth-code', [AdminController::class, 'send_telegram_code_for_auth'])->name('patch__admin_send-auth-code');
});

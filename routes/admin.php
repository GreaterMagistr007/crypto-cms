<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix(env('ADMIN_PREFIX'))
    ->middleware(['auth', 'verified', 'admin'])
    ->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('get_admin_index');
});

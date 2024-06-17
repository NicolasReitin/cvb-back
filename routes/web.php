<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::post('/cvb-login', [UserController::class, 'login']);

Route::post('/cvb-logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

require __DIR__.'/auth.php';

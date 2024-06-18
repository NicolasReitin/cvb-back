<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [
        'Laravel' => app()->version(),
        'name' => 'Romain'
    ];
});

require __DIR__.'/auth.php';


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontakController;

Route::get('/', function () {
    return view('welcome'); // route langsung ke view tanpa controller
});

Route::resource('kontaks', KontakController::class); // route resource ke KontakController

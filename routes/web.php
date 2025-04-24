<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoyageurController;
use App\Http\Controllers\SejourController;
use App\Http\Controllers\HebergementController;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'voyageurs' => VoyageurController::class,
    'sejours' => SejourController::class,
    'hebergements' => HebergementController::class,
]);
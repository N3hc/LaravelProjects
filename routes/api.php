<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\DuenoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('animales', AnimalController::class);
Route::apiResource('duenos', DuenoController::class);

Route::get('/test', function () {
    return response()->json(['message' => 'OK']);
});
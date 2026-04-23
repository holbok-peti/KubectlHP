<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SzamlaloController;

Route::post('/szamlalo', [SzamlaloController::class, 'store']);
Route::get('/szamlalo', [SzamlaloController::class, 'index']);

<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;

Route::resource('/', ContatoController::class);

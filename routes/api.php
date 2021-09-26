<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('usuario',App\Http\Controllers\UsuarioController::class)->only(['index','store','show','update','destroy']);
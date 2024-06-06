<?php

use ManoCode\Oa\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('oa', [Controllers\OaController::class, 'index']);

Route::any('oa/login', [Controllers\LoginController::class, 'login']);

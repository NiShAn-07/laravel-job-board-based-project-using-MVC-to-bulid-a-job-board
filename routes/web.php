<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JopController;
use App\Http\Controllers\IndexController;

Route::get('/' , [IndexController::class , 'Index']);

Route::get('/job', [JopController::class , 'index']) ;

Route::get('/contact', [IndexController::class , 'contact']) ;

Route::get('/about', [IndexController::class , 'about']) ;
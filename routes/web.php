<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JopController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/job', [JopController::class , 'index']) ;
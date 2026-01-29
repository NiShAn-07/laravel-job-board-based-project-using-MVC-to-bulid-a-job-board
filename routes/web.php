<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JopController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;


// Public Routes
Route::get('/' , IndexController::class ); // invokable controller
Route::get('/about', AboutController::class) ; // invokable controller

Route::get('/job', action: [JopController::class , 'index']) ;


Route::get('/signup', [AuthController::class, 'ShowSignupForm'])->name('signup') ;
Route::post('/signup', [AuthController::class, 'Signup']) ;

Route::get('/login', [AuthController::class, 'ShowLoginForm'])->name('login') ;
Route::post('/login', [AuthController::class, 'Login']) ;

Route::post('/logout', [AuthController::class,'logout'])->name('logout') ;



// Pivate Routes
Route::middleware('auth')->group(function () { // auth is a built-in middleware that checks if the user is logged in

        Route::resource('/blog', PostController::class) ;
        Route::resource('comments', CommentController::class) ;
        Route::resource('tags', CommentController::class) ;

}) ;

Route::middleware('OnlyMe')->group(function () {

    Route::get('/contact', ContactController::class) ; // invokable controller

}) ;
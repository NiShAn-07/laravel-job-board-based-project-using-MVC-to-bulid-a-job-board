<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JopController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

// Home Route
Route::get('/' , IndexController::class ); // invokable controller
Route::get('/about', AboutController::class) ; // invokable controller
Route::get('/contact', ContactController::class) ;// invokable controller

Route::get('/job', [JopController::class , 'index']) ;


// Blog Routes
Route::resource('blog' , PostController::class) ; //this line create all routes for blog (index, create, store, show, edit, update, destroy)
// comments Routes
Route::resource('comments', CommentController::class) ;
// Tags Routes
Route::resource('tags', CommentController::class) ;
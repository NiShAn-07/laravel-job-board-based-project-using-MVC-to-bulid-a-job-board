<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JopController;
use App\Http\Controllers\IndexController;

// Home Route
Route::get('/' , [IndexController::class , 'Index']);

// Job Routes
Route::get('/job', [JopController::class , 'index']) ;

// Static Pages
Route::get('/contact', [IndexController::class , 'contact']) ;
Route::get('/about', [IndexController::class , 'about']) ;


// Blog Routes
Route::get('/blog' , [PostController::class , 'index']) ;

Route::get('/blog/create', [PostController::class ,'create']) ; //this must be before the show route
Route::get('/blog/delete' , [PostController::class , 'delete']) ;
Route::get('/blog/{id}' , [PostController::class , 'show']) ;


// comments Routes
Route::get('/comments', [CommentController::class ,'index']) ;
Route::get('/comments/create', [CommentController::class ,'create']) ;       



// Tags Routes
Route::get('/tag' , [App\Http\Controllers\TagController::class , 'index']) ;
Route::get('/tag/create', [App\Http\Controllers\TagController::class ,'create']) ;
Route::get('/tag/test-many', [App\Http\Controllers\TagController::class ,'testManyToMany']) ;
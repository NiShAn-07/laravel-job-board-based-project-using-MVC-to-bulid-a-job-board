<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JopController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;


// Public Routes
Route::get('/' , IndexController::class ); // invokable controller
Route::get('/about', AboutController::class) ; // invokable controller
Route::get('/contact', ContactController::class) ; // invokable controller
Route::get('/job', action: [JopController::class , 'index']) ;


Route::get('/signup', [AuthController::class, 'ShowSignupForm'])->name('signup') ;
Route::post('/signup', [AuthController::class, 'Signup']) ;

Route::get('/login', [AuthController::class, 'ShowLoginForm'])->name('login') ;
Route::post('/login', [AuthController::class, 'Login']) ;

Route::post('/logout', [AuthController::class,'logout'])->name('logout') ;



// Pivate Routes
Route::middleware('auth')->group(function () { // auth is a built-in middleware that checks if the user is logged in


Route::middleware('role:admin')->group(function () {
   
        Route::delete('/blog/{post}' , [PostController::class , 'destroy']);
});


Route::middleware('role:editor,admin')->group(function () {
        Route::get('/blog/create' , [PostController::class , 'create']);
        Route::post('/blog' , [PostController::class , 'store']);
        
   Route::middleware('can:update,post')->group(function () {
          Route::get('/blog/{post}/edit' , [PostController::class , 'edit'])->can('update', 'post');
          Route::put('/blog/{post}' , [PostController::class , 'update'])->can('update', 'post');

   });
        
        Route::resource('tag', TagController::class) ;
// 
});


// viewer, editor, admin can access these routes
Route::middleware('role:viewer,editor,admin')->group(function () {
        Route::get('/blog' , [PostController::class , 'index']);
        Route::get('/blog/{post}' , [PostController::class , 'show']);
        Route::resource('comments', CommentController::class) ;
});






}) ;

// Route::middleware('OnlyMe')->group(function () {

//     Route::get('/contact', ContactController::class) ; // invokable controller

// }) ;
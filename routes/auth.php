<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/', function () {
        return view('index');
    });

    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');


    Route::get('cadastro', [AuthController::class, 'register'])->name('register');
    Route::post('store', [AuthController::class, 'store'])->name('store');

});


Route::middleware('auth')->group(function () {
    Route::resource('artigos', PostController::class)->names('post')->parameters(['artigos' => 'post']);

    Route::post('comment/{post}/{user}', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('comment/{comment}/apagar', [CommentController::class, 'destroy'])->name('comment.destroy');


    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

});

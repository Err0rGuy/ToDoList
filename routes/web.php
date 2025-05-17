<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');

Route::get('/more', function (){
    return view('learn_more');
})->name('learn.more');

Route::get('/signup', function (){
    return view('signup');
})->name('signup');


Route::resource('tasks', TaskController::class);

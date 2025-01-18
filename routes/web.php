<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index')
    ->name('index');

Route::view('/dashboard', 'admins.dashboard')
    ->name('admins.dashboard');

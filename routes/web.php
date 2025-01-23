<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')
    ->name('index');

Route::name('admins.')
    ->prefix('dashboard')
    ->group(function () {
        Route::view('/', 'admins.dashboard')
            ->name('dashboard');

        Route::resources([
            '/categories' => AdminCategoryController::class,
        ]);
    });

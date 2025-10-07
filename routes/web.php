<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Admin\Auth\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::prefix('admin')->group(function () {
    Route::get('login', Login::class)->name('admin.login');

    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard.dashboard');
    })->name('dashboard');

    Route::prefix('categories')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.categories.index');
        })->name('categories.index');
        Route::get('create', function () {
            return view('admin.pages.categories.create');
        })->name('categories.create');
        Route::get('edit/{id}', function ($id) {
            return view('admin.pages.categories.edit', compact('id'));
        })->name('categories.edit');
        Route::get('view/{id}', function ($id) {
            return view('admin.pages.categories.view', compact('id'));
        })->name('categories.view');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.products.index');
        })->name('products.index');
        Route::get('create', function () {
            return view('admin.pages.products.create');
        })->name('products.create');
        Route::get('edit/{id}', function ($id) {
            return view('admin.pages.products.edit', compact('id'));
        })->name('products.edit');
        Route::get('view/{id}', function ($id) {
            return view('admin.pages.products.view', compact('id'));
        })->name('products.view');
    });

    Route::get('settings', function () {
        return view('admin.pages.settings.company.profile');
    })->name('settings');
});

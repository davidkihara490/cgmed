<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Livewire\Admin\Auth\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/category/{sectionType}', [HomeController::class, 'show'])->name('section-type.show');

Route::get('/product/{product}', [HomeController::class, 'showProduct'])->name('product.show');

Route::get('/contact-form/{contact}',  [ContactController::class, 'showContactForm'])->name('contact');
Route::get('/sub-category/{category}',  [HomeController::class, 'showCategory'])->name('category.show');

Route::get('user/create-account', function () {
    return view('auth.create-account');
})->name('create-account');

Route::get('user/login', function () {
    return view('auth.login');
})->name('login');

Route::post('logout', [HomeController::class, 'logout'])->name('logout');

// Route::get('/contact-form', [ContactController::class, 'showContactForm'])->name('contact.form');

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
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

    Route::prefix('sub-categories')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.sub-categories.index');
        })->name('sub-categories.index');
        Route::get('create', function () {
            return view('admin.pages.sub-categories.create');
        })->name('sub-categories.create');
        Route::get('edit/{id}', function ($id) {
            return view('admin.pages.sub-categories.edit', compact('id'));
        })->name('sub-categories.edit');
        Route::get('view/{id}', function ($id) {
            return view('admin.pages.sub-categories.view', compact('id'));
        })->name('sub-categories.view');
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

    Route::prefix('sections')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.sections.index');
        })->name('sections.index');
        Route::get('create', function () {
            return view('admin.pages.sections.create');
        })->name('sections.create');
        Route::get('edit/{id}', function ($id) {
            return view('admin.pages.sections.edit', compact('id'));
        })->name('sections.edit');
        Route::get('view/{id}', function ($id) {
            return view('admin.pages.sections.view', compact('id'));
        })->name('sections.view');
    });

    Route::prefix('sub-sections')->group(function () {
        Route::get('/', function () {
            return view('admin.pages.sub-sections.index');
        })->name('sub-sections.index');
        Route::get('create', function () {
            return view('admin.pages.sub-sections.create');
        })->name('sub-sections.create');
        Route::get('edit/{id}', function ($id) {
            return view('admin.pages.sub-sections.edit', compact('id'));
        })->name('sub-sections.edit');
        Route::get('view/{id}', function ($id) {
            return view('admin.pages.sub-sections.view', compact('id'));
        })->name('sub-sections.view');
    });

    Route::get('settings', function () {
        return view('admin.pages.settings.company.profile');
    })->name('settings');
    // Route::get('settings', function () {
    //     return view('admin.pages.settings.company.profile');
    // })->name('settings');

    Route::get('about', function () {
        return view('admin.pages.about.about');
    })->name('about');
});

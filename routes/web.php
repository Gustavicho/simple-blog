<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::view('/about', 'about')->name('about');

// search
Route::get('/tags/{tag:name}', TagController::class);
Route::get('/categories/{category:name}', CategoryController::class);

Route::controller(ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('articles.index');
    Route::get('/articles/create', 'create')
        ->middleware('auth')->name('articles.create');

    Route::post('/articles', 'store')
        ->middleware('auth')->name('articles.store');

    Route::get('/articles/{article}', 'show')->name('articles.show');
    Route::get('/articles/{article}/edit', 'edit')
        ->middleware('auth')->name('articles.edit');

    Route::patch('/articles/{article}', 'update')
        ->middleware('auth')->name('articles.update');
    Route::delete('/articles/{article}', 'destroy')
        ->middleware('auth')->name('articles.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

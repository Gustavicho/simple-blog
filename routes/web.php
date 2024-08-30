<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::view('/about', 'about')->name('about');

// search
Route::get('/tags/{tag:name}', TagController::class);
Route::get('/categories/{category:name}', CategoryController::class);

Route::controller(ArticleController::class)->group(function () {
    Route::get('/', 'index')->name('articles.index');
    Route::get('/articles/create', 'create')
        ->middleware('auth')
        ->can('create', Article::class)
        ->name('articles.create');

    Route::post('/articles', 'store')
        ->middleware('auth')
        ->can('store', Article::class)
        ->name('articles.store');

    Route::get('/articles/{article}', 'show')->name('articles.show');
    Route::get('/articles/{article}/edit', 'edit')
        ->middleware('auth')
        ->can('edit', 'article')
        ->name('articles.edit');

    Route::patch('/articles/{article}', 'update')
        ->middleware('auth')
        ->can('update', 'article')
        ->name('articles.update');

    Route::delete('/articles/{article}', 'destroy')
        ->middleware('auth')
        ->can('delete', 'article')
        ->name('articles.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

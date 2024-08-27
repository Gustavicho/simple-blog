<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\User;

it('belongs to a user', function () {
    $user = User::factory()->create();
    $art = Article::factory()->create([
        'user_id' => $user->id,
    ]);

    expect($art->user)->toBeInstanceOf(User::class);
});

it('belongs to a category', function () {
    $art = Article::factory()->create();
    $art->addCategoty('test');

    expect($art->category)->toBeInstanceOf(Category::class);
});

it('has many tags', function () {
    $art = Article::factory()->create();
    $art->addTag('test');
    $art->addTag('test2');

    expect($art->tags)->toHaveCount(2);
});

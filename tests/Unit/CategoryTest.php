<?php

use App\Models\Article;
use App\Models\Category;

it('has many articles', function () {
    $category = Category::factory()->create();
    $arts = Article::factory(3)->create();

    foreach ($arts as $art) {
        $art->addCategory('laravel');
    }

    expect($category->articles)->toHaveCount(3);
});

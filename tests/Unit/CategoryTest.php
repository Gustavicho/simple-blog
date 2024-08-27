<?php

use App\Models\Article;
use App\Models\Category;

it('has many articles', function () {
    $category = Category::factory()->create();
    $arts = Article::factory()->count(3)->make();
    $category->articles()->saveMany($arts);

    expect($category->articles)->toHaveCount(3);
});

<?php

use App\Models\Article;
use App\Models\Tag;

it('has many articles', function () {
    $tag = Tag::factory()->create();
    $tag->articles()->saveMany(Article::factory()->count(3)->make());

    expect($tag->articles)->toHaveCount(3);
});

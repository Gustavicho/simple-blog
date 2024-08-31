<?php

namespace App\Http\Controllers;

use App\Models\Article;

class SearchController extends Controller
{
    public function __invoke()
    {
        return view('results', [
            'articles' => Article::query()
            ->where('title', 'like', '%'.request('q').'%')
            ->with(['category', 'tags', 'user'])
            ->simplePaginate(10),
        ]);
    }
}

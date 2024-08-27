<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function index()
    {
        return view('home', [
            'articles' => Article::query()->with(['category', 'tags'])->get(),
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function __invoke(Category $category)
    {
        return view('results', [
            'articles' => $category->articles()->with('category', 'tags')->simplePaginate(10),
        ]);
    }
}

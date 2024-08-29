<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::latest()->with(['category', 'tags'])->get(),
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {
        $validatedData = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required'],
            'category' => ['nullable', 'string', 'max:255'],
            'tags' => ['nullable'],
        ]);

        $validatedData['user_id'] = Auth::user()->id;
        $article = Article::create(Arr::except($validatedData, ['tags', 'category']));

        if ($validatedData['category'] !== null) {
            $article->addCategory($validatedData['category']);
        }
        if (request()->has('tags')) {
            $tags = explode(',', request('tags'));
            foreach ($tags as $tag) {
                $article->addTag(trim($tag));
            }
        }

        return redirect('/');
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Article $article)
    {
        $validatedData = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'text' => ['required'],
            'category' => ['nullable', 'string', 'max:255'],
            'tags' => ['nullable'],
        ]);

        $article->update(Arr::except($validatedData, ['tags', 'category']));
        if ($validatedData['category'] !== null) {
            $article->addCategory($validatedData['category']);
        }
        if (request()->has('tags')) {
            $tags = explode(',', request('tags'));
            foreach ($tags as $tag) {
                $article->addTag(trim($tag));
            }
        }

        return redirect('/articles/'.$article->id);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/');
    }
}

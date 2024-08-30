<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::latest()->with(['category', 'tags', 'user'])->get(),
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        Gate::authorize('create', Article::class);

        return view('articles.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(StoreArticleRequest $request)
    {
        $validatedData = $request->validated();

        $article = Auth::user()->articles->create(
            $validatedData->except(['image', 'tags', 'category'])
        );

        if ($validatedData['image'] !== null) {
            $imgPath = request('image')->store('images', 'public');
            $article->update(['image' => $imgPath]);
        }

        $this->addTagAndCategory($article, $validatedData);

        return redirect()->route('articles.show', $article->id);
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        Gate::authorize('view', $article);

        return view('articles.edit', [
            'article' => $article,
            'categories' => Category::all(),
        ]);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validatedData = $request->validated();

        $article->update($validatedData->except(['image', 'tags', 'category']));

        if ($validatedData['image'] !== null) {
            $imgPath = request('image')->store('images', 'public');
            $article->update(['image' => $imgPath]);
        }

        $this->updateTagAndCategory($article, $validatedData);

        return redirect()->route('articles.show', $article->id);
    }

    public function destroy(Article $article)
    {
        Gate::authorize('destroy', $article);

        $article->delete();

        return redirect('/');
    }

    protected function addTagAndCategory(Article $article, array $validatedData): void
    {
        if ($validatedData['category'] !== null) {
            $article->addCategory($validatedData['category']);
        }

        if ($validatedData['tags'] !== null) {
            $tags = explode(',', $validatedData['tags']);
            foreach ($tags as $tag) {
                $article->addTag(trim($tag));
            }
        }
    }

    protected function updateTagAndCategory(Article $article, array $validatedData): void
    {
        if ($validatedData['category'] !== null) {
            $article->updateCategory($validatedData['category']);
        }

        if ($validatedData['tags'] !== null) {
            $article->updateTag(explode(',', $validatedData['tags']));
        }
    }
}

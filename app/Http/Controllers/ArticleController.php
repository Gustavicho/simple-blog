<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Arr;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::latest()->with(['category', 'tags', 'user'])->simplePaginate(5),
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('articles.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(StoreArticleRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = $request->user()->id;
        $validatedData['image'] = null;

        $article = Article::create(Arr::except($validatedData, ['image', 'tags', 'category']));

        $this->addImage($article, $validatedData);
        $this->addTagAndCategory($article, $validatedData);

        return redirect()->route('articles.show', $article->id);
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article,
            'categories' => Category::all(),
        ]);
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = $request->user()->id;
        $validatedData['image'] = null;

        $article->update(Arr::except($validatedData, ['image', 'tags', 'category']));

        $this->addImage($article, $validatedData);
        $this->updateTagAndCategory($article, $validatedData);

        return redirect()->route('articles.show', $article->id);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }

    protected function addImage(Article $article, array $validatedData): void
    {
        if ($validatedData['image']) {
            $imgPath = request('image')->store('images', 'public');
            $article->update(['image' => $imgPath]);
        }
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

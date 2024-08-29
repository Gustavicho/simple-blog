<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'image', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function addCategory(string $name): self
    {
        $category = Category::firstOrCreate(['name' => $name]);

        $this->category()->associate($category);
        $this->save();

        return $this;
    }

    public function updateCategory(string $name): self
    {
        $this->category()->dissociate();
        $this->addCategory($name);

        return $this;
    }

    public function hasCategory(): bool
    {
        return $this->category !== null;
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addTag(string $name): self
    {
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag);

        return $this;
    }

    public function updateTag(array $names): self
    {
        $this->tags()->detach();
        foreach ($names as $name) {
            $this->addTag($name);
        }

        return $this;
    }

    public function hasTags(): bool
    {
        return $this->tags->isNotEmpty();
    }
}

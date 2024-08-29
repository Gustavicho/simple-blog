<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\File;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('update', Article::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:articles,title'],
            'content' => ['required'],
            'image' => ['nullable', File::image()],
            'category' => ['nullable', 'string', 'max:255'],
            'tags' => ['nullable'],
        ];
    }

    public function mensage(): array
    {
        return [
            'title' => ['required' => 'Must have a title', 'unique' => 'That\'s title already exists'],
            'content.required' => ['Must have a content'],
            'image.image' => ['Only images files are allowed'],
        ];
    }
}

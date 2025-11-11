<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('posts.create');
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:post_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'published_at' => 'nullable|date',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }
}
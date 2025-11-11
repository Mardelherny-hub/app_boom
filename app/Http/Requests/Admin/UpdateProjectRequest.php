<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('projects.edit');
    }

    public function rules(): array
    {
        $projectId = $this->route('project');
        
        return [
            'category_id' => 'required|exists:project_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug,' . $projectId,
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'client' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'featured' => 'boolean',
            'published_at' => 'nullable|date',
        ];
    }
}
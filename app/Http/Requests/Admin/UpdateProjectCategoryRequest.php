<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('projects.edit');
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'integer|min:0',
        ];
    }
}
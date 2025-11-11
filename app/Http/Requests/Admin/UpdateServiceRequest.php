<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('services.edit');
    }

   public function rules(): array
    {
        $serviceId = $this->route('service');
        
        return [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $serviceId,
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon_file' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:1024',
            'featured' => 'boolean',
            'order' => 'integer|min:0',
            'published_at' => 'nullable|date',
        ];
    }
}
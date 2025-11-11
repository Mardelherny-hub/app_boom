@props(['label', 'name', 'accept' => 'image/*', 'current' => null, 'required' => false])

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
        @if($required)
            <span class="text-red-500">*</span>
        @endif
    </label>
    
    @if($current)
        <div class="mb-2">
            <img src="{{ $current }}" alt="Current" class="h-20 w-20 object-cover rounded border">
            <p class="text-xs text-gray-500 mt-1">Current image</p>
        </div>
    @endif
    
    <input 
        type="file" 
        name="{{ $name }}" 
        id="{{ $name }}"
        accept="{{ $accept }}"
        {{ $attributes->merge(['class' => 'block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100']) }}
        {{ $required ? 'required' : '' }}
    >
    
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
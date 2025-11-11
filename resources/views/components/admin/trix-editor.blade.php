@props(['name', 'value' => '', 'label' => '', 'required' => false])

<div class="mb-4">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input 
        id="{{ $name }}" 
        type="hidden" 
        name="{{ $name }}" 
        value="{{ old($name, $value) }}"
    >
    
    <trix-editor 
        input="{{ $name }}"
        class="trix-content border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        {{ $attributes }}
    ></trix-editor>

    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

@once
    @push('styles')
    <style>
        trix-toolbar .trix-button-group--file-tools .trix-button--icon-attach {
            display: none;
        }
        
        .trix-content {
            min-height: 300px;
        }
        
        trix-editor {
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem;
        }
        
        trix-editor:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 1px #6366f1;
        }
    </style>
    @endpush
@endonce
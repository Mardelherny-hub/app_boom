<x-admin-layout>
    <x-slot name="header">Settings</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow">
            <form method="POST" action="{{ route('admin.settings.update') }}">
                @csrf
                @method('PUT')

                @foreach($settings as $group => $groupSettings)
                    <div class="border-b border-gray-200 last:border-b-0">
                        <div class="bg-gray-50 px-6 py-3">
                            <h3 class="text-sm font-semibold text-gray-900 uppercase">{{ ucfirst($group) }}</h3>
                        </div>
                        
                        <div class="px-6 py-4 space-y-4">
                            @foreach($groupSettings as $setting)
                                <div>
                                    <label for="setting_{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-1">
                                        {{ $setting->label ?? ucfirst(str_replace('_', ' ', $setting->key)) }}
                                    </label>

                                    @if($setting->type === 'boolean')
                                        <label class="flex items-center">
                                            <input 
                                                type="checkbox" 
                                                name="settings[{{ $setting->key }}]" 
                                                value="1"
                                                {{ $setting->value ? 'checked' : '' }}
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                            >
                                            <span class="ml-2 text-sm text-gray-600">Enable</span>
                                        </label>

                                    @elseif($setting->type === 'text')
                                        <textarea 
                                            name="settings[{{ $setting->key }}]" 
                                            id="setting_{{ $setting->key }}"
                                            rows="3"
                                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        >{{ old('settings.'.$setting->key, $setting->value) }}</textarea>

                                    @else
                                        <input 
                                            type="{{ $setting->type === 'number' ? 'number' : 'text' }}" 
                                            name="settings[{{ $setting->key }}]" 
                                            id="setting_{{ $setting->key }}"
                                            value="{{ old('settings.'.$setting->key, $setting->value) }}"
                                            class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        >
                                    @endif

                                    @error('settings.'.$setting->key)
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="px-6 py-4 bg-gray-50">
                    <x-admin.button type="submit" variant="primary">
                        Save Settings
                    </x-admin.button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
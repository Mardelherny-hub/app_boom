<x-admin-layout>
    <x-slot name="header">Edit User</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <x-admin.form-input
                    label="Name"
                    name="name"
                    :value="$user->name"
                    required
                />

                <x-admin.form-input
                    label="Email"
                    name="email"
                    type="email"
                    :value="$user->email"
                    required
                />

                <x-admin.form-input
                    label="Phone"
                    name="phone"
                    type="tel"
                    :value="$user->phone"
                />

                <x-admin.form-input
                    label="Password"
                    name="password"
                    type="password"
                    placeholder="Leave blank to keep current password"
                />

                <x-admin.form-input
                    label="Confirm Password"
                    name="password_confirmation"
                    type="password"
                />

                <x-admin.form-select
                    label="Role"
                    name="role"
                    required
                >
                    <option value="">Select a role</option>
                    <option value="super_admin" {{ $user->hasRole('super_admin') ? 'selected' : '' }}>Super Admin</option>
                    <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                    <option value="editor" {{ $user->hasRole('editor') ? 'selected' : '' }}>Editor</option>
                    <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>User</option>
                </x-admin.form-select>

                <x-admin.form-textarea
                    label="Bio"
                    name="bio"
                    :value="$user->bio"
                    rows="3"
                />

                <div class="flex space-x-3">
                    <x-admin.button type="submit" variant="primary">
                        Update User
                    </x-admin.button>

                    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm font-medium transition">
                        Cancel
                    </a>

                    @if($user->id !== auth()->id())
                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?')" class="ml-auto">
                            @csrf
                            @method('DELETE')
                            <x-admin.button type="submit" variant="danger">
                                Delete User
                            </x-admin.button>
                        </form>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
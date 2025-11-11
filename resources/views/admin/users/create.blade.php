<x-admin-layout>
    <x-slot name="header">Create User</x-slot>

    <div class="max-w-4xl">
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <x-admin.form-input
                    label="Name"
                    name="name"
                    required
                />

                <x-admin.form-input
                    label="Email"
                    name="email"
                    type="email"
                    required
                />

                <x-admin.form-input
                    label="Phone"
                    name="phone"
                    type="tel"
                />

                <x-admin.form-input
                    label="Password"
                    name="password"
                    type="password"
                    required
                />

                <x-admin.form-input
                    label="Confirm Password"
                    name="password_confirmation"
                    type="password"
                    required
                />

                <x-admin.form-select
                    label="Role"
                    name="role"
                    required
                >
                    <option value="">Select a role</option>
                    <option value="super_admin">Super Admin</option>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                    <option value="user">User</option>
                </x-admin.form-select>

                <x-admin.form-textarea
                    label="Bio"
                    name="bio"
                    rows="3"
                />

                <div class="flex space-x-3">
                    <x-admin.button type="submit" variant="primary">
                        Create User
                    </x-admin.button>

                    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg text-sm font-medium transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
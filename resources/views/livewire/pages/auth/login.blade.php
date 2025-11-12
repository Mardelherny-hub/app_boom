<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        // Redirect según permisos
        $user = Auth::user();
        
        if ($user->can('services.view') || $user->can('posts.view') || $user->can('users.view')) {
            $this->redirectRoute('admin.dashboard');
        } else {
            $this->redirectRoute('dashboard');
        }
    }
}; ?>

<div>
    <!-- Título -->
    <h2 class="text-2xl font-bold text-center mb-2" style="color: #3C3C3B;">¡Bienvenido!</h2>
    <p class="text-center text-gray-600 mb-6">Ingresá a tu panel de administración</p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-5">
        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium mb-2" style="color: #3C3C3B;">
                Email
            </label>
            <input 
                wire:model="form.email" 
                id="email" 
                type="email" 
                required 
                autofocus
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#E94C23] focus:ring-2 focus:ring-[#E94C23] focus:ring-opacity-20 outline-none transition-all"
                placeholder="tu@email.com"
            />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium mb-2" style="color: #3C3C3B;">
                Contraseña
            </label>
            <input 
                wire:model="form.password" 
                id="password" 
                type="password" 
                required
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#E94C23] focus:ring-2 focus:ring-[#E94C23] focus:ring-opacity-20 outline-none transition-all"
                placeholder="••••••••"
            />
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot -->
        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center space-x-2 cursor-pointer" style="color: #3C3C3B;">
                <input 
                    wire:model="form.remember" 
                    id="remember" 
                    type="checkbox" 
                    class="rounded border-gray-300 text-[#E94C23] focus:ring-[#E94C23]"
                />
                <span>Recordarme</span>
            </label>
            
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-[#E94C23] hover:underline">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button 
            type="submit" 
            class="w-full bg-[#E94C23] text-white py-3 rounded-lg font-medium hover:bg-opacity-90 transition-all transform hover:scale-[1.02] shadow-lg"
        >
            Ingresar
        </button>
    </form>
</div>
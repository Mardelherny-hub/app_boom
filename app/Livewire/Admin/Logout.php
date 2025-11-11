<?php

namespace App\Livewire\Admin;

use App\Livewire\Actions\Logout as LogoutAction;
use Livewire\Component;

class Logout extends Component
{
    public function logout(LogoutAction $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return <<<'HTML'
        <button wire:click="logout" type="button" class="text-gray-400 hover:text-white transition">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
        </button>
        HTML;
    }
}
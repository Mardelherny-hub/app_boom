<?php

namespace App\Livewire\Admin;

use App\Livewire\Actions\Logout as LogoutAction;
use Livewire\Component;

class Logout extends Component
{
    public function logout()
    {
        logger('Logout clicked!'); // Para debug
        
        $logoutAction = new LogoutAction();
        $logoutAction();
        
        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.admin.logout');
    }
}
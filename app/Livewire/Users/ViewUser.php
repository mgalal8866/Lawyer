<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class ViewUser extends Component
{
    protected $listeners = ['user'=>'$refresh'];

    public function render()
    {
        $users=User::whereType(0)->get();
        return view('users.view-user',compact('users'));
    }
}

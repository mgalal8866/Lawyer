<?php

namespace App\Livewire\Lawyer;

use App\Models\User;
use Livewire\Component;

class ViewLawyer extends Component
{
    public function render()
    {
        $users=User::whereType(1)->get();
        return view('lawyer.view-lawyer',compact('users'));
    }
}

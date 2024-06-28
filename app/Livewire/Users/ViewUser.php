<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class ViewUser extends Component
{
    protected $listeners = ['user'=>'$refresh'];
    public $search;
    public function render()
    {
        $query = User::where('type', 0);

        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('phone', 'like', '%' . $this->search . '%');
            });
        }
        $users = $query->get();
        return view('users.view-user',compact('users'));
    }
}

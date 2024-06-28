<?php

namespace App\Livewire\Lawyer;

use App\Models\User;
use Livewire\Component;

class ViewLawyer extends Component
{
    protected $listeners = ['user'=>'$refresh'];
    public $search;

    public function activetoggle($id)
    {
        $CC = User::find($id);
        if($CC->active == 1){
            $CC->update(['active' => 0 ]);
        }
        else{
            $CC->update(['active'=>1]);
        }
    }
    public function render()
    {

        $query = User::whereType(1);
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('phone', 'like', '%' . $this->search . '%');
            });
        }
        $users = $query->get();
        return view('lawyer.view-lawyer',compact('users'));
    }
}

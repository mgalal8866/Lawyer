<?php

namespace App\Livewire;

use App\Models\setting as ModelsSetting;
use Livewire\Component;

class Setting extends Component
{
    public $price_point;
    public function save()
    {
        ModelsSetting::update(['id'=>1],['price'=> $this->price_point]);
        $this->dispatch('swal', message: 'تم التعديل بنجاح');
    }

    public function render()
    {
        return view('setting');
    }
}

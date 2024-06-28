<?php

namespace App\Livewire;

use App\Models\setting as ModelsSetting;
use Livewire\Component;

class Setting extends Component
{
    public $price_point;
    public function save()
    {
        $set = ModelsSetting::find(1);
        $set->price = $this->price_point;
        $set->save();
        $this->dispatch('swal', message: 'تم التعديل بنجاح');
    }

    public function render()
    {
        return view('setting');
    }
}

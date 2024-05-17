<?php

namespace App\Livewire\Users;

use App\Models\Area;
use App\Models\City;
use App\Models\specialist;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class EditUser extends Component
{
    protected $listeners = ['edit' => 'edit'];
    public $header, $edit, $id = null, $name, $description, $city_id, $area_id, $gender, $point, $specialist_id, $type, $area = [], $phone;


    public function setEdit($data)
    {
        dd($data);
        $replyId = $data['id'];

    }
    public function edit($id = null,$type = '0')
    {


        $this->edit = false;
        $this->type = $type;
        if ($id != null) {

            $tra = User::find($id);
            $this->area = Area::where('city_id', $tra->city_id)->get();
            $this->id            = $tra->id;
            $this->name              = $tra->name;
            $this->phone             = $tra->phone;
            $this->city_id           = $tra->city_id;
            $this->gender            = $tra->gender;
            $this->point             = $tra->point ?? '0.00';
            $this->type              = $tra->type;

            $this->area_id           = $tra->area_id;

            if ($tra->type == '1') {
                $this->description       = $tra->description;
                $this->specialist_id     = $tra->specialist_id;
            }
            $this->edit = true;
            // $this->active = $tra->active == 1 ? true : false;
            // $this->header = __('tran.edit') . ' ' . __('tran.user');

        } else {
            $this->resetExcept('type');
            $this->edit = false;
        }

        $this->header =  __('tran.add') . ' ' .  (($this->type == 0) ? __('tran.user') : __('tran.lawyer'));
        $this->dispatch('openmodel');
    }
    public function updatedCityId($val)
    {

        $this->area = Area::where('city_id', $val)->get();
    }
    public function save()
    {
        $data = [
            'name'       => $this->name,
            'gender'     => $this->gender,
            'type'       => $this->type,
            'point'      => $this->point,
            'area_id'    => $this->area_id,
            'city_id'    => $this->city_id,
            'gender'     => $this->gender,
        ];
        if ($this->edit = false) {
            $data['phone'] = $this->phone;
        }
        if ($this->type == 1) {
            $data['specialist_id']   = $this->specialist_id;
            $data['description']    = $this->description;
        }

        $CFC = User::updateOrCreate(['id' => $this->id], $data);

        $this->dispatch('swal', message: 'تم التعديل بنجاح');
        $this->dispatch('closemodel');
        $this->dispatch('user');
    }
    public function render()
    {
        $countrylist = City::get();
        $specialist = specialist::get();
        return view('users.edit-user', compact(['countrylist', 'specialist']));
    }
}

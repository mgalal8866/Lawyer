<?php

namespace App\Livewire\Notification;

use App\Models\Notification;
use Livewire\Component;

class ViewNotification extends Component
{
    protected $listeners = ['notification_refresh'=>'$refresh'];


    public function render()
    {
        $notifcations = Notification::get();
        return view('notification.view-notification',compact('notifcations'));
    }
}

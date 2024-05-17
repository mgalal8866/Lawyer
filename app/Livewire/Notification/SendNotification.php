<?php

namespace App\Livewire\Notification;

use App\Models\Issue;
use App\Models\Notification;
use Livewire\Component;
use Livewire\WithFileUploads;

class SendNotification extends Component
{
    use WithFileUploads;

    protected $listeners = ['edit' => 'edit'];
    public $title, $body, $redirect, $issue_id;
    public function edit($id = null)
    {

        $this->dispatch('openmodel');
    }
    protected $rules = [
        'name' => 'required',

    ];
    public function save()
    {
        $notif =  Notification::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);
        if ($this->issue_id != null) {
            $is =  Issue::find($this->issue_id);
            $notif->redirect = $is->id;
            $notif->type = $is->type;
            $notif->save();
        }
        $this->dispatch('closemodel');
        $this->dispatch('notification_refresh');
    }
    public function render()
    {
        $issuess = Issue::get();
        return view('notification.send-notification', compact('issuess'));
    }
}

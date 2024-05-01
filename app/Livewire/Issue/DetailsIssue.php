<?php

namespace App\Livewire\Issue;

use App\Models\Issue;
use Livewire\Component;

class DetailsIssue extends Component
{
    public $issue;
    public function  mount($id)
    {
        $this->issue =  Issue::with(['answer' => function ($q) {
            $q->orderByDesc('status');
        }])->find($id);
    }
    public function render()
    {
        return view('issue.details-issue');
    }
}

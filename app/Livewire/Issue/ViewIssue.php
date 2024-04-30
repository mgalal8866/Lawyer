<?php

namespace App\Livewire\Issue;

use App\Models\Issue;
use Livewire\Component;
use Livewire\WithPagination;

class ViewIssue extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $type =1;
    public function render()
    {
        $issues=Issue::with(['user'])->whereType($this->type)->paginate(1);
        return view('issue.view-issue',compact('issues'));
    }
}

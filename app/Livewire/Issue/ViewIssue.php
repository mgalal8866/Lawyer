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
        $issues=Issue::with(['user'])->withCount('answer')->whereType($this->type)->paginate(20);
        return view('issue.view-issue',compact('issues'));
    }
}

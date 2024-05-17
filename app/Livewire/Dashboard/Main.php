<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use App\Models\Issue;
use Livewire\Component;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class Main extends Component
{
    public function render()
    {
        // abort_if(Gate::denies('question_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


       $data['users']  =  User::whereType('0')->count();
       $data['lawyer'] =  User::whereType('1')->count();
       $data['issue']  =  Issue::whereType('1')->count();
       $data['issue_dont_have_offers']  =  Issue::whereType('1')->doesntHave('answer')->count();
       $data['issue_has_offers']  =  Issue::whereType('1')->has('answer')->count();
       $data['question']  =  Issue::whereType('0')->count();
       $data['question_dont_have'] = Issue::whereType('0')->doesntHave('answer')->count();
       $data['question_has_answer'] = Issue::whereType('0')->has('answer')->count();
       $data['lawyer_has_max_offers'] = User::whereType('1')->has('offers')->withCount('offers')->orderByDesc('offers_count')->take(1)->get();

        return view('dashboard.main',compact('data'));
    }
}

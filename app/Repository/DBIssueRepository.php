<?php

namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Issue;
use App\Repositoryinterface\IssueRepositoryinterface;
use Illuminate\Http\Request;

class DBIssueRepository implements IssueRepositoryinterface
{

    protected Model $model;
    protected $request;

    public function __construct(Issue $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function newissue()
    {
        dd($this->request->input('type',''));
        $data = $this->model->create([
            'title' => $this->request->title,
            'body' => $this->request->body,
            'user_id' => Auth::guard('api')->user()->id,
        ]);
        return $data;
    }

    public function myissue()
    {
        $data =  $this->model->whereUserId(Auth::guard('api')->user()->id)->get();
        return  $data;
    }
}

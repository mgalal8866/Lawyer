<?php

namespace App\Repository;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Repositoryinterface\IssueAnswerRepositoryinterface;

class DBIssueAnswerRepository implements IssueAnswerRepositoryinterface
{

    protected Model $model;
    protected $request;

    public function __construct(Answer $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function newanswer()
    {
        $data = $this->model->create([
            'title' => $this->request->title,
            'body' => $this->request->body,
            'user_id' => Auth::guard('api')->user()->id,
        ]);
        return $data;
    }

    public function myanswer()
    {
        $data =  $this->model->whereUserId(Auth::guard('api')->user()->id)->get();
        return  $data;
    }
}

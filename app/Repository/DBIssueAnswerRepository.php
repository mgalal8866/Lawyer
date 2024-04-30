<?php

namespace App\Repository;

use App\Models\Answer;
use App\Models\IssueOffers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Repositoryinterface\IssueAnswerRepositoryinterface;

class DBIssueAnswerRepository implements IssueAnswerRepositoryinterface
{

    protected Model $model;
    protected $request;

    public function __construct(IssueOffers $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function newanswer()
    {
        $type = $this->request->input('type', '');
        $data = [
            'issue_id' => $this->request->issue_id,
            'reply'    => $this->request->reply,
            'user_id'  => Auth::guard('api')->user()->id,
            'deferred' => $this->request->deferred,
        ];
        if($this->request->price){
            $data['price'] = $this->request->price;
        }
        $data = $this->model->create($data);
        return $data;
    }

    public function myanswer()
    {
        $data =  $this->model->whereUserId(Auth::guard('api')->user()->id)->with(['user','user.comments'])->get();
        return  $data;
    }

    public function accept_offer($id)
    {
        $data =  $this->model->find($id);
        $data->status = 1;
        $data->save();
        if($data){

            return  true;
        }else{

            return  false;
        }
    }
}

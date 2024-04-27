<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\LoginUserResource;
use App\Repositoryinterface\QuestionRepositoryinterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DBQuestionRepository implements QuestionRepositoryinterface
{

    protected Model $model;
    protected $request;

    public function __construct(User $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
    public function newquestion($data)
    {


        return Resp($data, 'Success', 200, true);
    }
    public function getquestion($request)
    {
        // $data= ['phone'=>$request->phone,'password'=>$request->password];
    //  return  $this->credentials($data);
    }

}

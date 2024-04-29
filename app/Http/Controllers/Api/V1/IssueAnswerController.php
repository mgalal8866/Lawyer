<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\IssueAnswerResource;
use App\Repositoryinterface\IssueAnswerRepositoryinterface;

class IssueAnswerController extends Controller
{
    private $answer;
    public function __construct(IssueAnswerRepositoryinterface $answer)
    {
        $this->answer = $answer;
    }

    public function newanswer(Request $request)
    {
        $data = $this->answer->newanswer();
        if ($data) {
            return   Resp(new IssueAnswerResource($data), 'success');
        } else {
            return   Resp('', 'not ', 400);
        }
    }


    public function myanswer()
    {
        $data = $this->answer->myanswer();
        if ($data) {
            return   Resp(IssueAnswerResource::collection($data), 'success');
        } else {
            return   Resp('', 'not ', 400);
        }
    }

}

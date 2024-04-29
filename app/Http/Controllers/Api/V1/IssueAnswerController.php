<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\answerResource;
use App\Repositoryinterface\AnswerRepositoryinterface;

class IssueAnswerController extends Controller
{
    private $answer;
    public function __construct(AnswerRepositoryinterface $answer)
    {
        $this->answer = $answer;
    }

    public function newanswer(Request $request)
    {
        $data = $this->answer->newanswer();
        if ($data) {
            return   Resp(new answerResource($data), 'success');
        } else {
            return   Resp('', 'not ', 400);
        }
    }


    public function myanswer()
    {
        $data = $this->answer->myanswer();
        if ($data) {
            return   Resp(answerResource::collection($data), 'success');
        } else {
            return   Resp('', 'not ', 400);
        }
    }

}

<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\IssueAnswerResource;
use App\Http\Resources\AcceptedOffersResource;
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
            return   Resp(new IssueAnswerResource($data), 'تم الاضافه بنجاح');
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
    public function accept_offer($id)
    {
        $data = $this->answer->accept_offer($id);
        if ($data) {
            return   Resp('', 'تم قبول العرض بنجاح');
        } else {
            return   Resp('', 'error', 400);
        }
    }
    public function my_accept_offer()
    {
        $data = $this->answer->my_accept_offer();
        if ($data) {
            return   Resp( AcceptedOffersResource::collection($data), 'success');
        } else {
            return   Resp('', 'error', 400);
        }
    }
    public function my_accept_offer_lawyer()
    {
        $data = $this->answer->my_accept_offer_lawyer();
        if ($data) {
            return   Resp( AcceptedOffersResource::collection($data), 'success');
        } else {
            return   Resp('', 'error', 400);
        }
    }

}

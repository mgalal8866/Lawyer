<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentsResource;
use App\Http\Resources\SpecialistsResource;
use App\Models\specialist;
use App\Repositoryinterface\CommentRepositoryinterface;

class CommentsController extends Controller
{
    private $Comment;
    public function __construct(CommentRepositoryinterface $Comment)
    {
        $this->Comment = $Comment;
    }


    public function new_comment(Request $request)
    {
        $data =$this->Comment->new_comment();
        if ($data) {
           return Resp(new CommentsResource( $data), 'تم اضافه التعليق');
        } else {
            return Resp('', 'error',400,false);
        }
    }
    public function get_comment_byid($id)
    {
        $data =$this->Comment->get_Comment_id($id);
        if ($data) {
           return Resp(CommentsResource::collection($data), 'success');
        } else {
            return Resp('', 'عدد نقاطك اقل من المطلوب يرجى اعاده شحن النقاط',400,false);
        }
    }

}

<?php

namespace App\Repository;

use App\Models\Comments;
use App\Models\CommentFiles;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Repositoryinterface\CommentRepositoryinterface;

class DBCommentRepository implements CommentRepositoryinterface
{
    use  ImageProcessing;
    protected Model $model;
    protected $request;

    public function __construct(Comments $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function new_comment()
    {
        $rating = $this->request->input('rating', '');
        $comment = $this->request->input('comment', '');
        $lawyer_id = $this->request->input('user_id', '');
        $data = [
            'user_id'         => Auth::guard('api')->user()->id,
            'lawyer_id'       => $lawyer_id,
            'rating'          => $rating,
            'comment'         => $comment
            ];
        $data = $this->model->create($data);
        return $data;
    }


    public function get_Comment_id($id)
    {
        $data =  $this->model->whereLawyerId($id)->get();
        return  $data;
    }
}

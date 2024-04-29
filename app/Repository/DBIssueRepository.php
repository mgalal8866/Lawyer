<?php

namespace App\Repository;

use App\Models\Issue;
use App\Models\IssueFiles;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Repositoryinterface\IssueRepositoryinterface;

class DBIssueRepository implements IssueRepositoryinterface
{
    use  ImageProcessing;
    protected Model $model;
    protected $request;

    public function __construct(Issue $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function newissue()
    {
        $type = $this->request->input('type', '');
        $data = [
            'title'         => $this->request->title,
            'body'          => $this->request->body,
            'user_id'       => Auth::guard('api')->user()->id,
            'type'          => $type == 'issue' ? 1 : 0
            ];

        if ($this->request->specialist_id != null) {
            $data['specialist_id'] = $this->request->specialist;
        }
        $data = $this->model->create($data);

        if ($this->request->files) {
            foreach($this->request->files as $item){
                $dataX = $this->saveImageAndThumbnail($item, false, 'images');
                IssueFiles::create(['name'=>$dataX['image'],'issue_id'=>$data->id]);
            }
        }

        return $data;
    }

    public function myissue()
    {
        $type = $this->request->input('type', '');
        $type = $type =='issue'?1:0;
        $data =  $this->model->whereType($type)->whereUserId(Auth::guard('api')->user()->id)->get();
        return  $data;
    }
}

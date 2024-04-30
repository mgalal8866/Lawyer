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
            'type'          => $type == 'issue' ? 1 : 0,
            'status'        => 1
        ];
        if ($this->request->specialist != null) {
            $data['specialist_id'] = $this->request->specialist;
        }
        $data = $this->model->create($data);

        $files = $this->request->file('files');

        if ($files) {
            foreach ($files as $item) {
                $file =  uploadfile($item, "files/");
                IssueFiles::create(['name' => $file, 'issue_id' => $data->id]);
            }
        }

        return $data;
    }

    public function delete_issue($id)
    {

        $data =  $this->model->find($id);
        if ($data != null) {
            $data->delete();
            return  true;
        } else {
            return  false;
        }
    }
    public function myissue()
    {
        $type = $this->request->input('type', '');
        $type = $type == 'issue' ? 1 : 0;
        $data =  $this->model->withCount(['answer'])->whereType($type)->whereUserId(Auth::guard('api')->user()->id)->get();
        return  $data;
    }
    public function get_all_issue()
    {
        $type = $this->request->input('type', '');
        $type = $type == 'issue' ? 1 : 0;
        $data =  $this->model->whereType($type)->get();
        return  $data;
    }
    public function get_issue_id($id)
    {

        $data =  $this->model->whereId($id)->withCount(['answer'])->with(['answer', 'files'])->get();
        return  $data;
    }
}

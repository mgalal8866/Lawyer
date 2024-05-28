<?php

namespace App\Repository;

use App\Models\Issue;
use App\Models\IssueFiles;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\IssueResource;
use App\Models\User;
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
        $type = $type == 'issue' ? 1 : 0;
        if( $type == 0 ){
            if (Auth::guard('api')->user() < env('POINT',5)) {
                return   Resp('', 'نقاطك اقل من المطلوب يرجى اعاده شحن النقاط ', 200);
            } else {
                $point = Auth::guard('api')->user() -  env('POINT');
                $user = User::find(Auth::guard('api')->user()->id);
                $user->point = $point;
                $user->save();
            }
        }

        $data = [
            'title'         => $this->request->title,
            'body'          => $this->request->body,
            'user_id'       => Auth::guard('api')->user()->id,
            'type'          => $type ,
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



        $data =  $this->model->withCount(['answer'])->whereType($type)->whereUserId(Auth::guard('api')->user()->id)->orderBy('created_at', 'DESC')->get();
      return  $data;

    }
    public function get_all_issue()
    {
        $type = $this->request->input('type', '');
        $type = $type == 'issue' ? 1 : 0;
        $data =  $this->model->whereType($type)->orderBy('created_at', 'DESC')->get();
        return  $data;
    }
    public function get_all_issue_by_city()
    {
        $city_id =  Auth::guard('api')->user()->city_id;
        $type = $this->request->input('type', '');
        $type = $type == 'issue' ? 1 : 0;
        $data =  $this->model->whereType($type)->whereHas('user', function ($q) use ($city_id) {
            $q->where('city_id', $city_id);
        })->orderBy('created_at', 'DESC')->get();
        return  $data;
    }
    public function get_issue_id($id)
    {

        $data =  $this->model->whereId($id)->withCount(['answer'])->with(['answer', 'files'])->orderBy('created_at', 'DESC')->get();
        return  $data;
    }
}

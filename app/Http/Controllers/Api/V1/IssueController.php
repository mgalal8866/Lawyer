<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\IssueResource;
use App\Http\Resources\IssueColleResource;
use App\Http\Resources\IssueLawyerResource;
use App\Repositoryinterface\IssueRepositoryinterface;

class IssueController extends Controller
{
    private $issue;
    public function __construct(IssueRepositoryinterface $issue)
    {
        $this->issue = $issue;
    }

    public function newissue(Request $request)
    {
        $data = $this->issue->newissue();
        if ($data) {
            return   Resp(new IssueResource($data), 'success');
        } else {
            return   Resp('', 'not ', 400);
        }
    }
    public function get_all_issue()
    {
        $data = $this->issue->get_all_issue();
        if ($data) {
            return   Resp(IssueColleResource::Collection($data), 'success');
        } else {
            return   Resp('', 'not ', 400);
        }
    }


    public function myissue()
    {
        $data = $this->issue->myissue();
        if ($data) {
            return   Resp(IssueResource::collection($data), 'success');
        } else {
            return   Resp('', 'not ', 400);
        }
    }
    public function get_issue_id($id)
    {

        $data = $this->issue->get_issue_id($id);
        if ($data) {
            return   Resp(IssueResource::collection($data), 'success');
        } else {
            return   Resp('', 'not ', 400);
        }
    }
    public function delete_issue($id)
    {

        $data = $this->issue->delete_issue($id);
        if ($data) {
            return   Resp('', 'تم حذف  بنجاح');
        } else {
            return   Resp('', 'لم يتم الحذف ', 400);
        }
    }

}

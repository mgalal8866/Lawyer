<?php

namespace App\Repository;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Traits\ImageProcessing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Repositoryinterface\NotificationRepositoryinterface;

class DBNotificationRepository implements NotificationRepositoryinterface
{
    use  ImageProcessing;
    protected Model $model;
    protected $request;

    public function __construct(Notification $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function get_my_notification()
    {

        $data =$this->model->where('user_id', Auth::guard('api')->user()->id)->orWhereNull('user_id')->get();
        return $data;
    }

 }

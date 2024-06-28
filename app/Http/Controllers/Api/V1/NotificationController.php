<?php

namespace App\Http\Controllers\Api\V1;



use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Repositoryinterface\NotificationRepositoryinterface;

class NotificationController extends Controller
{
    private $Notification;
    public function __construct(NotificationRepositoryinterface $Notification)
    {
        $this->Notification = $Notification;
    }


    public function get_my_notification()
    {

        $data = $this->Notification->get_my_notification();
        if ($data) {
            return   Resp(NotificationResource::collection($data), 'success');
        } else {
            return   Resp('', 'not ', 400);
        }
    }
    public function checkactive()
    {

        return $this->Notification->checkactive();

    }

}

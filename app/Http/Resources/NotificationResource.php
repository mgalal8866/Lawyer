<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class NotificationResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id??'',
            'title'     => $this->title??'',
            'body'      => $this->body??'',
            'redirect'  => $this->redirect??'',
            'type'      => $this->type==1?'issue':'question',
            'date'      =>\Carbon\Carbon::parse($this->created_at)->translatedFormat('l j F Y -  H:i a') ,
        ];
    }
}

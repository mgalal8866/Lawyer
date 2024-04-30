<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class CommentsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        $data=[
            'id'           => $this->id??'',
            'user_id'      => $this->user_id??'',
            'user_name'    => $this->user->name??'',
            'lawyer_id'    => $this->lawyer_id??'',
            'lawyer_name'  => $this->lawyer->name??'',
            'rating'       => $this->rating??'',
            'comment'      => $this->comment??'',
        ];
        return  $data;
    }
}

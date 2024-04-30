<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class IssueAnswerResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        $data=[
            'id'         => $this->id??'',
            'reply'      => $this->reply??'',
            'user_id'    => $this->user_id??'',
            'user_name'      => $this->user->name??'',
        ];

        if( $this->price){
            $data['price'] = $this->price;
        }
        return  $data;
    }
}

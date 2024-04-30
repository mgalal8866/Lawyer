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
            'user_name'  => $this->user->name??'',
            'rating'     => $this->user->comments != null? number_format($this->user->comments->sum('rating')/$this->user->comments->count(),2):'0',
            // 'rating'     => $this->user->comments,
            'deferred'   => $this->deferred??'',
        ];

        if( $this->price){
            $data['price'] = $this->price;
        }
        return  $data;
    }
}

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
            'user_image' => $this->user->imageurl??'',
            'rating'     => ($this->user->comments->count() > 0) ? number_format($this->user->comments->sum('rating')/$this->user->comments->count(),2):'0',
            'status'     => $this->status?$this->status->getLabelText():'',
            'deferred'   => $this->deferred??'',
            'created_at'      => \Carbon\Carbon::parse($this->created_at)->translatedFormat('l j F Y -  H:i a'),

        ];

        if( $this->price){
            $data['price'] = $this->price;
        }
        return  $data;
    }
}

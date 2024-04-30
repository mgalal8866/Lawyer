<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class IssueResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id??'',
            'title'     => $this->title??'',
            'body'      => $this->body??'',
            'offers'    =>'0',
            'status'    => 'مفعل',
            'created_at'=> $this->created_at??'',
            'files'=> $this->files??'',
            'answers'=>IssueAnswerResource::collection( $this->answer??''),
        ];
    }
}

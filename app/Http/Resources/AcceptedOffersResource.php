<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class AcceptedOffersResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'issue_id'  => $this->issue->title ?? '',
            'user_name' =>  $this->issue->user->name ?? '',
            'title' =>  $this->issue->title?? '',
            'body' =>  $this->issue->body ?? '',
            'price' =>  $this->price ?? '',
            'deferred' =>  $this->deferred ?? '',
            'created_at'      => \Carbon\Carbon::parse($this->issue->created_at)->translatedFormat('l j F Y -  H:i a'),

        ];
    }
}

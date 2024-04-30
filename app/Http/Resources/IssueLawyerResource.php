<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class IssueLawyerResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id ?? '',
            'title'     => $this->title ?? '',
            'body'      => $this->body ?? '',
            'specialist_id'      => $this->specialist_id ?? '',
            'specialist'      => $this->specialist->name ?? '',
            'user_id'    => $this->user_id,
            'user_name'    => $this->user->name,
            'status'    => $this->status->getLabelText(),
            'created_at'      => \Carbon\Carbon::parse($this->created_at)->translatedFormat('l j F Y -  H:i a'),

        ];
    }
}

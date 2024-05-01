<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class BookingResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'     => $this->id??'',
            'user_name'      => $this->user->name??'',
            'lawyer_name'    => $this->lawyer->name??'',
            'user_id'    => $this->user_id??'',
            'lawyer_id'      => $this->lawyer_id??'',
            'lawyer_image'   => $this->lawyer->imageurl??'',
            'answer'     => $this->answer??'',
            'created_at'     => \Carbon\Carbon::parse($this->created_at)->translatedFormat('l j F Y -  H:i a'),
            'status' => $this->status == 0?'0':$this->status,

        ];
    }
}

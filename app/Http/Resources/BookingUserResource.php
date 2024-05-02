<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class BookingUserResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'     => $this->id??'',
            'lawyer_name'    => $this->lawyer->name??'',
            'lawyer_phone'    => $this->lawyer->phone??'',
            'lawyer_id'      => $this->lawyer_id??'',
            'lawyer_image'   => $this->lawyer->imageurl??'',
            'answer'     => $this->answer??'',
            'description'     => $this->description??'',
            'created_at'     => \Carbon\Carbon::parse($this->created_at)->translatedFormat('l j F Y -  H:i a'),
            'status' => $this->status->getLabelText(),

        ];
    }
}

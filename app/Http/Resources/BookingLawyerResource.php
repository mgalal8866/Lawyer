<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class BookingLawyerResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'     => $this->id??'',
            'user_name'      => $this->user->name??'',
            'user_phone'     => $this->user->user_phone??'',
            'answer'     => $this->answer??'',
            'created_at'     => \Carbon\Carbon::parse($this->created_at)->translatedFormat('l j F Y -  H:i a'),
            'status' => $this->status->getLabelText(),

        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class LoginUserResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id??'',
            'name'      => $this->name??'',
            'image'     => $this->image??'',
            'city_id'   => $this->city_id??'',
            'city'      => $this->city->name??'',
            'area_id'   => $this->area_id??'',
            'area'      => $this->area->name??'',
            'points'    => $this->point??'',
            'gender'    => $this->gender??'',
            'type'      => $this->type??'',
            'specialist'      => $this->specialist_id->name??'',
            'description'      => $this->description??'',
            'rating'      => '5.0',
            'token'     => $this->token??'',
        ];
    }
}

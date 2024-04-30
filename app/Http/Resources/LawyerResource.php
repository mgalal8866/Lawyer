<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class LawyerResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id??'',
            'name'      => $this->name??'',
            'image'     => $this->imageurl??'',
            'city_id'   => $this->city_id??'',
            'city'      => $this->city->name??'',
            'area_id'   => $this->area_id??'',
            'area'      => $this->area->name??'',
            'gender'    => $this->gender??'',
            'specialist' => $this->specialist_id->name??'',
            'description'      => $this->description??'',
            'rating'      => $this->comments != null ?number_format($this->comments->sum('rating')/$this->comments->count(),2):'',
        ];
    }
}

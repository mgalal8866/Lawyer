<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class BookingdataLawyerResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id??'',
            'name'      => $this->name??'',
            'image'     => $this->imageurl??'',
            'phone'     => $this->phone??'',
            'specialist' => $this->specialist->name??'',
            'description' => $this->description??'',
            'rating'      => ($this->comments->count() > 0) ?number_format($this->comments->sum('rating')/$this->comments->count(),2):'',
        ];
    }
}

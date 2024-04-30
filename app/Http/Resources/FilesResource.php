<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class FilesResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        $data=[
            'id'         => $this->id??'',
            'file'       => $this->nameurl??'',
        ];
        return  $data;
    }
}

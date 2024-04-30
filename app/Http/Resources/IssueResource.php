<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class IssueResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id ?? '',
            'title'     => $this->title ?? '',
            'body'      => $this->body ?? '',
            'offers'    => $this->answer_count != 0 ? number_format($this->answer_count, 0) : '0',
            'status'    => $this->status->getLabelText(),
            'created_at'      => \Carbon\Carbon::parse($this->created_at)->translatedFormat('l j F Y -  H:i a'),
            'files'     => FilesResource::collection($this->files) ?? '',
            'answers'   => IssueAnswerResource::collection($this->answer ?? ''),
        ];
    }
}

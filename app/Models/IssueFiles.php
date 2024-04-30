<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueFiles extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getNameurlAttribute()
    {
        return $this->name?path('','') . $this->name: path('','').'no-imag.png';
    }
}

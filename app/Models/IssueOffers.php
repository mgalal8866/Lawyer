<?php

namespace App\Models;

use App\Enum\StatusOffer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueOffers extends Model
{

    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'status' => StatusOffer::class
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function issue()
    {
        return $this->belongsTo(issue::class, 'issue_id');
    }
}

<?php

namespace App\Models;

use App\Models\User;
use App\Models\Issue;
use App\Enum\StatusOffer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsTo(Issue::class, 'issue_id');
    }
}

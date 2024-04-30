<?php

namespace App\Models;

use App\Models\User;
use App\Models\IssueFiles;
use App\Models\IssueOffers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Issue extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function answer()
    {
        return $this->hasMany(IssueOffers::class, 'issue_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function files()
    {
        return $this->hasMany(IssueFiles::class, 'issue_id');
    }
    public function specialist()
    {
        return $this->belongsTo(specialist::class, 'specialist_id');
    }
}

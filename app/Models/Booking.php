<?php

namespace App\Models;

use App\Enum\StatusBooking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $casts = [
        'status' => StatusBooking::class
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function lawyer()
    {
        return $this->belongsTo(User::class, 'lawyer_id');
    }
}

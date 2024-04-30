<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\File;
class User extends Authenticatable  implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function specialist()
    {
        return $this->belongsTo(specialist::class);
    }
    public function comments()
    {
        return $this->belongsTo(Comments::class, 'lawyer_id');
    }
    public function getImageurlAttribute()
    {
        $p =  '/files' . '/' ;
        $path = asset($p) ;
        if (!File::exists($path)) {
            mkdir($path, 0777, true);
        }
        return $this->image? $path. '/'. $this->image: path('','').'no-imag.png';


        return $this->image?path('','category') . $this->image: path('','').'no-imag.png';
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}

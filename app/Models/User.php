<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'username',
        'email',
        'password',
        'fullname',
        'image',
        'phone_number'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function socialAccount()
    {
        return $this->hasMany(SocialAccountUser::class);
    }
    public function userKnowladge()
    {
        return $this->hasMany(UserKnowledge::class);
    }
    public function userProject()
    {
        return $this->hasMany(Project::class);
    }
    
    public function aboutUser()
    {
        return $this->hasOne(AboutUser::class);
    }

    public static function getWithAboutUser(int $userId)
    {
        return self::with('aboutUser')->find($userId);
    }
}

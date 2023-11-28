<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAccountUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'social_account_link',
        'user_id',
        'social_media_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function social_media()
    {
        return $this->hasMany(SocialMedia::class, 'id');
    }
}

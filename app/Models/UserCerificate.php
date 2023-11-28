<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCerificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'link_certificate',
        'image_certificate',
        'company_certificate',
        'date_reached',
        'expires_date',
        'user_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}

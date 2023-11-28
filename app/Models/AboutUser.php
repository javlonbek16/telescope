<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_job',
        'interest_topic',
        'cv_file',
        'user_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}

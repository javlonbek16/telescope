<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKnowledge extends Model
{
    use HasFactory;
    protected $fillable = [
        'knowledge_name',
        'perecent_know',
        'user_id'
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}

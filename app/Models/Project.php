<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_name',
        'project_description',
        'project_link',
        'project_image',
        'user_id'
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class, 'id');
    }
}

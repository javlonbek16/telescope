<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telescope_entries extends Model
{
    use HasFactory;
    protected $connection ='mysql_second';
}

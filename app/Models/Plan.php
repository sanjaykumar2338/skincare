<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{   
    public $timestamps = false;
    protected $table = 'plans';
    
    use HasFactory;
}

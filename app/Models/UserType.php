<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;
    
    public function userGroup()
    {
        return $this->belongsTo('App\Models\User','user_type','id');
    }
}

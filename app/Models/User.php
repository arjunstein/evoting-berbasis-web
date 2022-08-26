<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    // public function pemilih()
    // {
    // 	return $this->hasOne('App\Models\M_pemilih','user_id','id');
    // }
}

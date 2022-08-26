<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_pemilih extends Model
{
    protected $table = 'm_pemilih';
    
    public function pengguna()
    {
    	return $this->belongsTo('App\Models\User','user_id','id');
    }
    
}


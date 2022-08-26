<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $table = 'kandidat';
    public function caketu()
    {
    	return $this->belongsTo('App\Models\M_pemilih','calon_ketua','id');
    }
    public function cawaket()
    {
    	return $this->belongsTo('App\Models\M_pemilih','calon_wakil','id');
    }
}

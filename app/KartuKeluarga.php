<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table = 'kartu_keluarga';

    public function jorong(){
    	return $this->belongsTo('App\Jorong','jorong_id','id');
    }
}

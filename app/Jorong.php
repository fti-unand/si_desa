<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jorong extends Model
{
    protected $table = 'jorong';

    public function kk(){
    	return $this->hasMany('App\KartuKeluarga','id','jorong_id');
    }
}

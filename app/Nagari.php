<?php

namespace App;
use App\Sarana;

use Illuminate\Database\Eloquent\Model;

class Nagari extends Model
{
    protected $table = 'nagari';

    public function sarana(){
    	return $this->hasMany('App\Sarana','id','nagari_id');

    }
}

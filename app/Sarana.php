<?php

namespace App;
use App\Nagari;

use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
     protected $table = 'sarana';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nagari_id', 'nama', 'keterangan', 'tahun_bangun', 'foto', 'create_at' , 'update_at'
    ];


    public function nagari(){
    	return $this->belongsTo('App\Nagari','nagari_id','id');

    }



}

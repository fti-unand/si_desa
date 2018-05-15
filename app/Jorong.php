<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jorong extends Model
{
    protected $table = 'jorong';

    protected $fillable = [
        'id',
        'nagari_id',
        'nama',
        'luas_wilayah',
    ];

    public function kartu_keluarga(){
      return $this->hasMany('App\Models\KartuKeluarga');
    }

    public function nagari(){
      return $this->belongsTo('App\Models\Nagari');
    }
}

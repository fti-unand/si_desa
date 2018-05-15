<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table = 'kartu_keluarga';

    protected $fillable = [
        'id',
        'jorong_id',
        'no_kk',
        'alamat',
    ];

    public function penduduk(){
      return $this->hasMany('App\Models\Penduduk');
    }

    public function jorong(){
      return $this->belongsTo('App\Models\Jorong');
    }
}

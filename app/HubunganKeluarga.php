<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HubunganKeluarga extends Model
{
    protected $table = 'hubungan_keluarga';

    protected $fillable =[
        'id',
        'nama'
    ];

    public function penduduk(){
      return $this->hasMany('App\Models\Penduduk');
    }
}

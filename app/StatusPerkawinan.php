<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPerkawinan extends Model
{
    protected $table = 'status_perkawinan';

    protected $fillable =[
        'id',
        'nama'
    ];

    public function penduduk(){
      return $this->hasMany('App\Models\Penduduk');
    }
}

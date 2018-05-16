<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agama;

class Penduduk extends Model
{
    protected $table = 'penduduk';

    public $fillable= 
    [
     'kartu_keluarga_id',
     'nik',
     'nama',
     'tempat_lahir',
     'tanggal_lahir',
    ];

    public function agamas(){
    	return $this->belongsTo(\App\Agama::class,'agama_id','id');
    }
}

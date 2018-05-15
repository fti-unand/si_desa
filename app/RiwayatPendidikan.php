<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    protected $table = 'pendidikan_penduduk';

    public function jenjang()
    {
        return $this->hasOne('App\JenjangPendidikan','id','jenjang_id');
    }

    public function penduduk()
    {
        return $this->hasOne('App\Penduduk','id','penduduk_id');
    }
}

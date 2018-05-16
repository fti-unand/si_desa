<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table = 'kartu_keluarga';

    public $fillable=
    [
     'jorong_id',
     'no_kk',
     'alamat',
     'tanggal_kk'
    ];
}

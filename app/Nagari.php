<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nagari extends Model
{
    protected $table = 'nagari';

    protected $fillable = [
        'id',
        'nama',
        'alamat_kantor',
        'luas',
        'sk_pendirian',
        'tanggal_sk',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kodepos'
    ];

    public function jorong(){
      return $this->hasMany('App\Models\Jorong');
    }
}

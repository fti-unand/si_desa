<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';

    protected $fillable = [
        'id',
        'kartu_keluarga_id',
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'tanggal_meninggal',
        'jenis_kelamin',
        'kewarganegaraan',
        'photo',
        'status_perkawinan_id',
        'status_penduduk_id',
        'agama_id',
        'hubungan_keluarga_id',
        'ayah_id',
        'ibu_id'

    ];

    public function kartu_keluarga(){
      return $this->belongsTo('App\Models\KartuKeluarga');
    }

    public function status_perkawinan(){
      return $this->belongsTo('App\Models\StatusPerkawinan');
    }

    public function status_penduduk(){
      return $this->belongsTo('App\Models\StatusPenduduk');
    }

    public function agama(){
      return $this->belongsTo('App\Models\Agama');
    }

    public function hubungan_keluarga(){
      return $this->belongsTo('App\Models\HubunganKeluarga');
    }

    public function penduduk(){
      return $this->hasMany('App\Models\Penduduk');
    }
}

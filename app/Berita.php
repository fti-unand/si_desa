<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
     protected $table = 'berita';
     protected $fillable = [
        'nagari_id', 'judul', 'tanggal_terbit', 'isi', 'foto'
    ];

    /*return $this->belongsTo('App\Berita','nagari_id','id');	*/


	public function nagari()
    {
        return $this->belongsTo('App\Nagari','nagari_id','id');
    }
}

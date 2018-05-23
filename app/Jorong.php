<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jorong extends Model
{
    protected $table = 'jorong';

    protected $fillable = [
        'nagari_id','nama','luas_wilayah'
    ];

    public function nagari()
    {
        return $this->belongsTo(Nagari::class, 'nagari_id');
    }
}

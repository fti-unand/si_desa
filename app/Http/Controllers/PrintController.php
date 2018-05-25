<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KartuKeluarga;
use App\Penduduk;
use DB;

class PrintController extends Controller
{
    //
    public function print($id){
    	// $kartukeluarga = DB::select('select * from kartu_keluarga where id = ?',[$id]);
    	// $namas=Penduduk::where('kartu_keluarga_id', $id)->get();
    	// $namakeluarga=Penduduk::where('kartu_keluarga_id', $id)->where('hubungan_keluarga_id','1')->get();

      // $kk = DB::table('penduduk')
      //             ->join('kartu_keluarga', 'penduduk.kartu_keluarga_id', '=', 'kartu_keluarga.id')
      //             ->where('penduduk.kartu_keluarga_id',$id)
      //             ->get();

      $kk = DB::table('kartu_keluarga')
            ->where('id',$id)
            ->get();
      $namaKeluarga = DB::table('penduduk')
            ->where([
              ['kartu_keluarga_id', '=', $id],
              ['hubungan_keluarga_id', '=', '1'],
            ])
            ->get();
      $nama = DB::table('penduduk')
            ->where('kartu_keluarga_id',$id)
            ->get();

    	return view('laporans.print', compact('kk','namaKeluarga','penduduk'));
    }
}

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
    	$kartukeluarga = DB::select('select * from kartu_keluarga where id = ?',[$id]);
    	$namas=penduduk::where('kartu_keluarga_id', $id)->get();
    	$namakeluarga=penduduk::where('kartu_keluarga_id', $id)->where('hubungan_keluarga_id','1')->get();

    	return view('laporans.print', compact('kartukeluarga','namas','namakeluarga'));
    }
}

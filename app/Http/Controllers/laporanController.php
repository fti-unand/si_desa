<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use App\KartuKeluarga;


class laporanController extends Controller
{
    //
    public function index(){

    	$penduduks = KartuKeluarga::all();
    	// dd($penduduks);

    	return view('laporans.index', compact('penduduks'));
    }
}

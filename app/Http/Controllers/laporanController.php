<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use App\KartuKeluarga;
use App\Nagari;


class laporanController extends Controller
{
    //
    public function index(){

    	$kartukeluarga = KartuKeluarga::all();

      $penduduk = Penduduk::all();
      $hitungPenduduk = count($penduduk);

      $nagari = Nagari::all();

    	return view('laporans.index', compact('kartukeluarga','hitungPenduduk','nagari'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RiwayatPendidikan;
use App\JenjangPendidikan;
use App\Penduduk;

class RiwayatPendidikanController extends Controller
{
    public function index(){
        $pendidikans = RiwayatPendidikan::all();
        return view('admin.pendidikan.index',compact('pendidikans'));
    }

    public function create(){
        $jenjang = JenjangPendidikan::pluck('nama','id');
        $penduduk = Penduduk::pluck('nama','id');
        return view('admin.pendidikan.create',compact('jenjang','penduduk'));
    }

    public function store(Request $request){
        $pendidikan = new RiwayatPendidikan();
        $pendidikan->jenjang_id = $request->jenjang_id;
        $pendidikan->penduduk_id = $request->penduduk_id;
        $pendidikan->nama_institusi = $request->nama_institusi;
        $pendidikan->tahun_mulai = $request->tahun_mulai;
        $pendidikan->tahun_selesai = $request->tahun_selesai;
        $pendidikan->save();

        toast()->success('Berhasil menambahkan data riwayat pendidikan');
        return redirect(route('pendidikans.index'));
    }

    public function edit($id){
        $pendidikan = RiwayatPendidikan::find($id);
        $jenjang = JenjangPendidikan::pluck('nama','id');
        $penduduk = Penduduk::pluck('nama','id');
        return view('admin.pendidikan.edit',compact('jenjang','penduduk','pendidikan'));
    }

    public function update($id,Request $request){
        $pendidikan = RiwayatPendidikan::find($id);
        $pendidikan->jenjang_id = $request->jenjang_id;
        $pendidikan->penduduk_id = $request->penduduk_id;
        $pendidikan->nama_institusi = $request->nama_institusi;
        $pendidikan->tahun_mulai = $request->tahun_mulai;
        $pendidikan->tahun_selesai = $request->tahun_selesai;
        $pendidikan->save();

        toast()->success('Berhasil mengubah data riwayat pendidikan');
        return redirect(route('pendidikans.index'));
    }

    public function show($id){
        $pendidikan = RiwayatPendidikan::find($id);
        return view('admin.pendidikan.show',compact('pendidikan'));
    }

    public function destroy($id){
        $pendidikan = RiwayatPendidikan::find($id);
        $pendidikan->delete();
        toast()->success('Berhasil menghapus data riwayat pendidikan');
        return redirect(route('pendidikans.index'));
    }
}

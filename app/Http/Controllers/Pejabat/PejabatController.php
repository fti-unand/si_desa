<?php

namespace App\Http\Controllers\Pejabat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Pejabat as Pejabat;
use App\Nagari as Nagari;
use App\Jabatan as Jabatan;

class PejabatController extends Controller
{

    public function index()
    {
      $data = Pejabat::all();
      $nagari = Nagari::pluck('nama','id');
      $jabatan = Jabatan::pluck('nama','id');
      return view('admin/pejabat.pejabat',compact('data','nagari','jabatan'));
    }

    public function create()
    {
      $data = Pejabat::all();
      $nagari = Nagari::pluck('nama','id');
      $jabatan = Jabatan::pluck('nama','id');
      return view('admin/pejabat.tambah',compact('data','nagari','jabatan'));
    }

    public function store(Request $request){
      $datapejabat = Pejabat::all();
      $jabatan = Jabatan::pluck('nama','id');
      $nagari = Nagari::pluck('nama','id');

      if($request->hasFile('fotosk'))
      {
        $destination = "upload";
        $fotosk = $request->file('fotosk');
        $fotosk->move($destination, $fotosk->getClientOriginalName());
      }

      $datapejabat = [
        'nagari_id' => $request->input('nagari'),
        'jabatan_id' => $request->input('jabatan'),
        'nama' => $request->input('namapejabat'),
        'sk_no' => $request->input('nosk'),
        'tanggal_sk' => $request->input('tglsk'),
        'mulai_tanggal' => $request->input('mulaitgl'),
        'sampai_tanggal' => $request->input('sampaitgl'),
        'file_sk' => $fotosk->getClientOriginalName()
      ];
      // $datapejabat->nama = $request->input('namapejabat');
      // $datapejabat->nagari_id = $request->input('nagari');
      // $datapejabat->jabatan_id = $request->input('jabatan');
      // $datapejabat->sk_no = $request->input('nosk');
      // $datapejabat->tanggal_sk = $request->input('tglsk');
      // $datapejabat->mulai_tanggal = $request->input('mulaitgl');
      // $datapejabat->sampai_tanggal = $request->input('sampaitgl');

      $save = \App\Pejabat::insert($datapejabat);

      return redirect()->route('pejabat.index');
    }

    // public function detailpejabat()
    // {
    //   return view('admin/pejabat.detailpejabat');
    // }

    public function show($id)
    {
      $datapejabatid = Pejabat::find($id);
      // $data = Pejabat::all();
      $nagari = Nagari::pluck('nama','id');
      $jabatan = Jabatan::pluck('nama','id');
      return view('admin/pejabat.detailpejabat',compact('data','nagari','jabatan','datapejabatid'));

    }

    public function edit($id)
    {
      $data = Pejabat::all();
      $datapejabatid = \App\Pejabat::find($id);
      $nagari = Nagari::all()->pluck('nama','id');
      $jabatan = Jabatan::all()->pluck('nama','id');
      return view('admin/pejabat.edit',compact('datapejabatid','nagari','jabatan','data'));
    }

    public function update(Request $request, $id)
    {
      Pejabat::find($id);
      $datapejabat = [
        'nagari_id' => $request->input('nagari'),
          'jabatan_id' => $request->input('jabatan'),
          'nama' => $request->input('namapejabat'),
          'sk_no' => $request->input('nosk'),
          'tanggal_sk' => $request->input('tglsk'),
          'mulai_tanggal' => $request->input('mulaitgl'),
          'sampai_tanggal' => $request->input('sampaitgl')
      ];

      $update = \App\Pejabat::where('id',$id)->update($datapejabat);
      return redirect()->route('pejabat.index');
    }

    public function destroy($id)
    {
      Pejabat::find($id);
      $delete = \App\Pejabat::where('id',$id)->delete();
      // $delete = Pejabat::where('id',$id)->first();
      // $delete->delete();
      return redirect()->route('pejabat.index')->with('alert-success','data berhasil dihapus');
    }
}

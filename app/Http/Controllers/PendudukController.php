<?php

namespace App\Http\Controllers;
use DB;
use App\Penduduk;
use Illuminate\Http\Request;
use App\KartuKeluarga;
use App\StatusPenduduk;
use App\StatusPerkawinan;
use App\Agama;
use App\HubunganKeluarga;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agama=Agama::pluck('nama','id');
        $penduduk=Penduduk::all();
        $status_perkawinan = StatusPerkawinan::pluck('nama', 'id');

        return view('penduduk.index', ['penduduk'=> $penduduk],compact('agama','status_perkawinan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kartu_keluarga = KartuKeluarga::select('id', 'no_kk')->pluck('no_kk', 'id')->sortBy('no_kk');
        $status_perkawinan = StatusPerkawinan::select('id', 'nama')->pluck('nama', 'id')->sortBy('nama');
        $status_penduduk = StatusPenduduk::select('id', 'nama')->pluck('nama', 'id')->sortBy('nama');
        $agama = Agama::select('id', 'nama')->pluck('nama', 'id')->sortBy('nama');
        $hubungan_keluarga = HubunganKeluarga::select('id', 'nama')->pluck('nama', 'id')->sortBy('nama');
        $p = Penduduk::select('id', 'nik','nama')->pluck('nik','nama', 'id')->sortBy('nama');
        $ayah = Penduduk::where('jenis_kelamin','=','1')->pluck('nama','nik','id');
        $ibu = Penduduk::where('jenis_kelamin','=','2')->pluck('nama','nik','id');
        return view('penduduk.create', compact('ibu','ayah','kartu_keluarga','status_penduduk', 'status_perkawinan', 'agama', 'hubungan_keluarga','p'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([

        'kartu_keluarga_id'=> 'required',
        'nik'=> 'required',
        'nama'=> 'required',
        'tempat_lahir'=> 'required',
        'tanggal_lahir'=> 'required',
        'tanggal_meninggal',
        'jenis_kelamin'=> 'required',
        'kewarganegaraan'=> 'required',
        'photo',
        'status_perkawinan_id'=> 'required',
        'status_penduduk_id'=> 'required',
        'agama_id'=> 'required',
        'hubungan_keluarga_id'=> 'required',
        'ayah_id'=> 'required',
        'ibu_id'=> 'required'
          
      ]);

        $penduduk = new Penduduk();
        $penduduk->nik = $request->nik;
        $penduduk->kartu_keluarga_id = $request->kartu_keluarga_id;
        $penduduk->nama = $request->nama;
        $penduduk->tempat_lahir = $request->tempat_lahir;
        $penduduk->tanggal_lahir = $request->tanggal_lahir;
        $penduduk->tanggal_meninggal = $request->tanggal_meninggal;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->kewarganegaraan = $request->kewarganegaraan;
        $penduduk->photo = $request->photo;
        $penduduk->status_perkawinan_id = $request->status_perkawinan_id;
        $penduduk->status_penduduk_id = $request->status_penduduk_id;
        $penduduk->agama_id = $request->agama_id;
        $penduduk->hubungan_keluarga_id = $request->hubungan_keluarga_id;
        $penduduk->ayah_id = $request->ayah_id;
        $penduduk->ibu_id = $request->ibu_id;
        //form tidak ada input kegiatan

        $penduduk->save();
        return redirect()->route('penduduk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduk $penduduk)
    {
        $penduduk = Penduduk::find($penduduk->id);
        $kartu_keluarga = KartuKeluarga::pluck('no_kk', 'id');
        $status_penduduk = StatusPenduduk::pluck('nama', 'id');
        $hubungan_keluarga = HubunganKeluarga::pluck('nama', 'id');
        $agama=Agama::pluck('nama','id');
        $status_perkawinan=StatusPerkawinan::pluck('nama','id');
        $p = Penduduk::pluck('nama','id');

        return view('penduduk.show',['penduduk'=> $penduduk], compact('p','kartu_keluarga','status_penduduk', 'status_perkawinan', 'agama', 'hubungan_keluarga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        $kartu_keluarga = KartuKeluarga::select('id', 'no_kk')->pluck('no_kk', 'id')->sortBy('no_kk');
        $status_perkawinan = StatusPerkawinan::select('id', 'nama')->pluck('nama', 'id')->sortBy('nama');
        $status_penduduk = StatusPenduduk::select('id', 'nama')->pluck('nama', 'id')->sortBy('nama');
        $agama = Agama::select('id', 'nama')->pluck('nama', 'id')->sortBy('nama');
        $hubungan_keluarga = HubunganKeluarga::select('id', 'nama')->pluck('nama', 'id')->sortBy('nama');
        $penduduk = Penduduk::find($penduduk->id);
        $ayah = Penduduk::where('jenis_kelamin','=','1')->pluck('nama','nik','id');
        $ibu = Penduduk::where('jenis_kelamin','=','2')->pluck('nama','nik','id');
        return view('penduduk.edit',['penduduk'=> $penduduk],compact('ayah','ibu','kartu_keluarga','status_penduduk', 'status_perkawinan', 'agama', 'hubungan_keluarga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $pendudukUpdate = Penduduk :: where ('id', $penduduk->id)
        ->update([
            'nik'=>$request->input('nik'),
            'kartu_keluarga_id' => $request->input('kartu_keluarga_id'),
            'nama' => $request->input('nama'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'tanggal_meninggal' => $request->input('tanggal_meninggal'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'kewarganegaraan' => $request->input('kewarganegaraan'),
            'photo' => $request->input('photo'),
            'status_perkawinan_id' => $request->input('status_perkawinan_id'),
            'status_penduduk_id' => $request->input('status_penduduk_id'),
            'agama_id' => $request->input('agama_id'),
            'hubungan_keluarga_id' => $request->input('hubungan_keluarga_id'),
            'ayah_id' => $request->input('ayah_id'),
            'ibu_id' => $request->input('ibu_id')
        ]);

        if($pendudukUpdate){
            return redirect()->route('penduduk.show',['penduduk'=>$penduduk->id])
            ->with('success','Data penduduk terupdate');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penduduk = Penduduk::find($id);
        $penduduk->delete();
        toast()->success('Data penduduk berhasil dihapus');

        return redirect()->route('penduduk.index');
    }
}

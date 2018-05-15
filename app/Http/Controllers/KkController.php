<?php

namespace App\Http\Controllers;

use App\KartuKeluarga;
use App\Jorong;
use Illuminate\Http\Request;

class KkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kks = KartuKeluarga::all();

        return view('kks.index', compact('kks'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jorong = Jorong::all()->pluck('nama','id');
        return view('kks.create', compact('jorong'));
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
            'no_kk' => 'required',
            'alamat' => 'required',
            'tanggal_kk' => 'required',
            'jorong_id' => 'required'
        ]);

        $kk = new KartuKeluarga();
        $kk->jorong_id = $request->input('jorong_id');
        $kk->no_kk = $request->input('no_kk');
        $kk->alamat = $request->input('alamat');
        $kk->tanggal_kk = $request->input('tanggal_kk');

        if ($kk->save()) {
            toast()->success('Berhasil menambahkan data KK');
            return redirect()->route('kks.index');
        } else {
            toast()->error('Data KK tidak dapat ditambahkan');
            return redirect()->route('kks.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KartuKeluarga  $kartuKeluarga
     * @return \Illuminate\Http\Response
     */
    public function show(KartuKeluarga $kk)
    {
        $kk = KartuKeluarga::find($kk->id);

        return view('kks.show', compact('kk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KartuKeluarga  $kartuKeluarga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kk = KartuKeluarga::find($id);
        $jorong = Jorong::all()->pluck('nama','id');
        return view('kks.edit', compact('kk','jorong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KartuKeluarga  $kartuKeluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_kk' => 'required',
            'alamat' => 'required',
            'tanggal_kk' => 'required',
            'jorong_id' => 'required'
        ]);

        $kk = KartuKeluarga::find($id);
        $kk->jorong_id = $request->input('jorong_id');
        $kk->no_kk = $request->input('no_kk');
        $kk->alamat = $request->input('alamat');
        $kk->tanggal_kk = $request->input('tanggal_kk');

        if ($kk->save()) {
            toast()->success('Berhasil menambahkan data KK');
            return redirect()->route('kks.index');
        } else {
            toast()->error('Data KK tidak dapat ditambahkan');
            return redirect()->route('kks.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KartuKeluarga  $kartuKeluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kk = KartuKeluarga::find($id);
        $kk->delete();
        toast()->success('Data KK berhasil dihapus');
        return redirect()->route('kks.index');
    }
}

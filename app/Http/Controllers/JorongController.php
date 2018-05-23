<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jorong;
use App\Nagari;

class JorongController extends Controller
{
    public function index()
    {
        $jorongs = Jorong::all();

        return view('admin.jorong.index', compact('jorongs'));
    }

    public function create()
    {
        $nagaris = Nagari::pluck('nama', 'id');
        return view('admin.jorong.create', compact('nagaris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nagari_id' => 'required',
            'nama' => 'required',
            'luas_wilayah' => 'required'
        ]);
        $jorongs = new Jorong;

        $jorongs->create($request->except('_token'));
        toast()->success('Berhasil menambahkan data jorong');
        return redirect()->route('jorongs.index');
    }

    public function show($id)
    {
        $jorongs = Jorong::find($id);
        return view('admin.jorong.show', compact('jorongs'));
    }

    public function edit($id)
    {
        $jorongs = Jorong::find($id);
        $nagaris = Nagari::pluck('nama', 'id');
        return view('admin.jorong.edit', compact('jorongs', 'nagaris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nagari_id' => 'required',
            'nama' => 'required',
            'luas_wilayah' => 'required'
        ]);

        $jorongs = Jorong::find($id);
        $jorongs->nagari_id = $request->input('nagari_id');
        $jorongs->nama = $request->input('nama');
        $jorongs->luas_wilayah = $request->input('luas_wilayah');

        if ($jorongs->save()) {
            toast()->success('Berhasil memperbaharui data jorong');
            return redirect()->route('jorongs.index');
        } else {
            toast()->error('Data jorong tidak dapat diperbaharui');
            return redirect()->route('jorongs.edit', ['id' => $jorongs->id]);
        }
    }

    public function destroy($id)
    {
        $jorongs = Jorong::find($id);
        $jorongs->delete();
        toast()->success('Data jorong berhasil dihapus');

        return redirect()->route('jorongs.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use App\Nagari;
use Storage;

class BeritaController extends Controller
{
     public function index()
    {
        $beritas = Berita::all();
        return view('beritas.index', compact('beritas'));
    }

    public function create()
    {
        $nagari = Nagari::pluck('nama','id');
        return view('beritas.create',compact('nagari'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal_terbit' => 'required',
            'isi' => 'required',
            'foto' => 'required'
        ]);

        $berita = new Berita();
        $berita->nagari_id = $request->input('nagari_id');
        $berita->judul = $request->input('judul');
        $berita->tanggal_terbit = $request->input('tanggal_terbit');
        $berita->isi = $request->input('isi');
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $fileName = "fileName".time().'.'.request()->foto->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/foto');
            $imagePath = $destinationPath. "/".  $fileName;
            $image->move($destinationPath, $fileName);
        }
        $berita->foto = 'storage/foto/'.$fileName;
        $berita->save();

        return redirect(route('beritas.index'));
    }



       public function show($id)
    {
        $berita = Berita::find($id);
       /* $roles = $user->getRoleNames();*/
        return view('beritas.show', compact('berita'/*, 'roles'*/));
    }

public function edit($id)
    {
        $berita = Berita::find($id);
        $nagari = Nagari::pluck('nama','id');
        return view('beritas.edit', compact('berita','nagari'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal_terbit' => 'required',
            'isi' => 'required',
            'foto' => 'required'
        ]);

        $berita = Berita::find($id);
        $berita->nagari_id = $request->input('nagari_id');
        $berita->judul = $request->input('judul');
        $berita->tanggal_terbit = $request->input('tanggal_terbit');
        $berita->isi = $request->input('isi');
        if ($request->hasFile('foto')) {
            Storage::delete(str_replace('storage', 'public', $berita->foto));
            // Storage::delete('public/foto/fileName1526294333.png');
            $image = $request->file('foto');
            $fileName = "fileName".time().'.'.request()->foto->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/foto');
            $imagePath = $destinationPath. "/".  $fileName;
            $image->move($destinationPath, $fileName);
            $berita->foto = 'storage/foto/'.$fileName;
        }
        $berita->save();

        if ($berita->save()) {
            toast()->success('Berhasil memperbaharui data berita');
            return redirect(route('beritas.index'));
        } else {
            toast()->error('Data berita tidak dapat diperbaharui');
            return redirect()->route('beritas.edit', ['id' => $berita->id]);
        }
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        if (isset($berita->foto)) {
            Storage::delete(str_replace('storage', 'public', $berita->foto));
        }
        $berita->delete();
        toast()->success('Berhasil menghapus data berita');
        return redirect(route('beritas.index'));
    }


}



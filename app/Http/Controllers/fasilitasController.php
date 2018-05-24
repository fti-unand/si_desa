<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sarana;
use App\Nagari;
use Illuminate\Http\File;

class fasilitasController extends Controller
{
    public function index()
    {
        $Sarana = Sarana::all();

        return view('fasilitas.index', compact('Sarana'));
    }

    public function create()
    {
        $nagari = Nagari::all()->pluck('nama', 'id');

        return view('fasilitas.create', compact('nagari'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nagari' => 'required',
            'nama' => 'required',
            'tahun_bangun' => 'required',
            'foto' => 'required'
        ]);

        $sarana = new Sarana();
        $sarana->nagari_id = $request->input('nagari');
        $sarana->nama = $request->input('nama');
        $sarana->keterangan = $request->input('keterangan');
        $sarana->tahun_bangun = $request->input('tahun_bangun');
   
 

        if ($request->hasFile('foto') && $request->input('foto')->isvalid()) {
            $path = config('central.path.avatars');

            $fileext = $request->photo->extension();
            $filename = uniqid("avatars-") . '.' . $fileext;

            //Real File
            $filepath = $request->file('photo')->storeAs($path, $filename, 'local');

            //Avatar File
            $realpath = storage_path('app/' . $filepath);
            Image::make($realpath)
                ->resize(null, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path(config('central.path.avatars') . '/' . $filename));

            $user->avatar = $filename;
        }

        if ($sarana->save()) {
            toast()->success('Berhasil menambahkan data sarana');
            
            return redirect()->route('fasilitas.index');
        } else {
            toast()->error('Data sarana tidak dapat ditambahkan');
            return redirect()->route('fasilitas.create');
        }
    }

    public function show($id)
    {
        $sarana = Sarana::find($id);
       
        return view('fasilitas.show', compact('sarana'));
    }

public function edit($id)
    {
        $sarana = Sarana::find($id);
        $nagari = Nagari::all()->pluck('nama', 'id');
   
        return view('fasilitas.edit', compact('sarana','nagari'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        	'nagari' => 'required',
            'nama' => 'required',
            'tahun_bangun' => 'required',
          
        ]);

        $sarana = Sarana::find($id);
        $sarana->nagari_id = $request->input('nagari');
        $sarana->nama = $request->input('nama');
        $sarana->keterangan = $request->input('keterangan');
        $sarana->tahun_bangun = $request->input('tahun_bangun');

     	 if ($request->hasFile('foto') && $request->input('foto')) {
            $path = config('central.path.avatars');

            $fileext = $request->photo->extension();
            $filename = uniqid("avatars-") . '.' . $fileext;

            //Real File
            $filepath = $request->file('photo')->storeAs($path, $filename, 'local');

            //Avatar File
            $realpath = storage_path('app/' . $filepath);
            Image::make($realpath)
                ->resize(null, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path(config('central.path.avatars') . '/' . $filename));

            $user->avatar = $filename;
        }

        if ($sarana->save()) {
            toast()->success('Berhasil memperbaharui data user');
          
            return redirect()->route('fasilitas.index');
        } else {
            toast()->error('Data user tidak dapat diperbaharui');
            return redirect()->route('fasilitas.edit', ['id' => $sarana->id]);
        }
    }
    public function destroy($id)
    
    {
        $sarana = Sarana::find($id);
        $sarana->delete();
        toast()->success('Data user berhasil dihapus');

        return redirect()->route('fasilitas.index');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}

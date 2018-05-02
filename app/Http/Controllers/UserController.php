<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');

        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user = new User();
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');

        if ($user->save()) {
            toast()->success('Berhasil menambahkan data user');
            $user->assignRole($request->input('role'));
            return redirect()->route('user.index');
        } else {
            toast()->error('Data user tidak dapat ditambahkan');
            return redirect()->route('user.create');
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        $roles = $user->getRoleNames();
        return view('admin.users.show', compact('user', 'roles'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $user_roles = $user->getRoleNames();
        $roles = Role::all()->pluck('name', 'id');

        return view('admin.users.edit', compact('user', 'roles', 'user_roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user = User::find($id);
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');

        if ($user->save()) {
            toast()->success('Berhasil memperbaharui data user');
            $user->assignRole($request->input('role'));
            return redirect()->route('user.index');
        } else {
            toast()->error('Data user tidak dapat diperbaharui');
            return redirect()->route('user.edit', ['id' => $user->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        toast()->success('Data user berhasil dihapus');

        return redirect()->route('user.index');
    }
}

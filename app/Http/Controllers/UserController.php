<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('home.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('home.user.tambah', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'notelp' => 'required',
            'level' => 'required'
        ]);

         User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'notelp' => $request->notelp,
            'level' => $request->level,
        ]);
        return redirect('/user')->with('success','User Berhasil Ditambahkan!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('home.user.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'notelp' => 'required',
            'level' => 'required'
        ]);

        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'notelp' => $request->notelp,
            'level'=> $request->level,
        ]);
        return redirect('/user')->with('success', 'User Berhasil Di Edit!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $user = User::find($id);
    $user->delete();
    return redirect('/user')->with('success', 'User Berhasil Di Hapus!!!');
    }
}

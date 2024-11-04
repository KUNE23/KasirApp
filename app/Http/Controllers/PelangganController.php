<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('home.pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.pelanggan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'notelp' => 'required',
            'alamat' => 'required'
        ]);

            Pelanggan::create([
                'nama_pelanggan' =>$request->nama_pelanggan,
                'notelp' =>$request->notelp,
                'alamat' =>$request->alamat,
       ]);
       return redirect('/pelanggan')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('home.pelanggan.edit', compact('pelanggan'));
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
        $pelanggan = Pelanggan::find($id);

        $request->validate([
            'nama_pelanggan' => 'required',
            'notelp' => 'required|numeric',
            'alamat' => 'required'
        ]);

        $pelanggan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'notelp' => $request->notelp,
            'alamat' => $request->alamat
        ]);

        return redirect('/pelanggan')->with('success','Data Pelanggan Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::find($id);

        $pelanggan->delete();
        return redirect('/pelanggan')->with('success', 'Data Berhasil Di Hapus');
    }
}

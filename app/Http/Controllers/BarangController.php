<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penjualan;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
       

        return view('home.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.barang.tambah');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi file
        $request->validate([
            'nama_barang' => 'required',
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:9048',
            'stok' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'barcode' => 'required',
        ]);
        
        // Simpan file
        $imagepath = $request->file('photo')->store('products', 'public');
    // $imagepath = $request->file('photo');
    // $imagepath->storeAs('products', $imagepath->hashName(), 'public');
        
         Barang::create([
        'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'photo' => $imagepath,
            'barcode' => $request->barcode,
        ]);

        return redirect('/barang')->with('success','Data Barang Berhasil Ditambahkan');
    }
    
    /**
     * Display the speciwied resource.
     */
    public function show(string $id)
    {
        $barang = Barang::find($id);
        return view('home.barang.edit', compact('barang'));
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
        $barang = Barang::find($id);

        $request->validate([
            'nama_barang' => 'required',
            'photo' => 'required|file|mimes:jpg,png,jpeg|max:9048',
            'stok' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'barcode' => 'required',
        ]);

        $imagepath = $request->file('photo')->store('products', 'public');
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'photo' => $imagepath
        ]);
        return redirect('/barang')->with('success','Berhasil Di Edit');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }
}

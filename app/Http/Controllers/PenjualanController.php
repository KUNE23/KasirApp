<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::orderBy('id', 'desc')->get();
        return view('home.penjualan.index', compact('penjualan'));

    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
   

        Penjualan::create([
            'id_user' => Auth::user()->id,
            'status' => 'Belum Selesai',
            'total' => 0,
            'diskon' => 0,
            'bayar' => 0,
        'kembali' => 0,
        'id_barang' => 0,
        ]);
        
        return redirect()->back();
    }
    
    public function transaksi($id)
    {
       
        $penjualan = Penjualan::find($id);
        $detailpenjualan = DetailPenjualan::where('nobon', $id)
        ->select('id_barang', 'nobon', 'harga', Db::raw('count(*) as total'))
        ->groupBy('id_barang', 'nobon', 'harga')
        ->get();
        
        $barangCounts = $detailpenjualan->pluck('total','id_barang');
        
        return view('home.penjualan.tambah', compact('detailpenjualan', 'barangCounts', 'penjualan'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($barang->stok < $request->jumlah) {
            return redirect('/penjualan')->with('error', 'Stok barang tidak cukup !!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
        $id_penjualan = Penjualan::find($id);
        $penjualan = Penjualan::where('id_penjualan', $id);
        $barang = Barang::all();
        $detailpenjualan = DetailPenjualan::find($id);
        return view('home.penjualan.detail', compact('penjualan','barang', 'detailpenjualan','id_penjualan'));
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
        
        $penjualan = Penjualan::find($id);
        $total = $penjualan->total;
        
        $bayar = request()->input('bayar');
        $diskon = request()->input('diskon');
        
        
        $request->validate([
            'bayar' => 'required',
        ]);
        
        if($bayar < $request->ttl + $request->dds) {
            return redirect()->back()->with('gagal', 'Uang Tidak Mencukupi');
            
        } else {
            // dd($bayar, $request->ttl);

            $penjualan->update([
                'kembali' => $request->bayar - $request->ttl + $request->dds,
                'total' =>$request->ttl,
                'status' =>'Selesai',
                'bayar' =>$request->bayar,
                'diskon' =>$request->dds,
            ]); 
            return redirect('/penjualan')->with('success','Pembayaran Berhasil');   

        }
     
    }
    

    public function cetak($id)
    {
        $penjualan = Penjualan::with(['barang','user'])
->where($id);
$user = User::all();
$barang = Barang::all();
$penjualan = Penjualan::find($id);
$penjualan = Penjualan::where('id_penjualan', $id);

// $barang = Barang::all();

// $detailpenjualan = DetailPenjualan::all();
// $penjualan = Penjualan::find($id);
        return view('home.penjualan.struk', compact('penjualan', 'barang'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

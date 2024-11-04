<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\DetailPenjualan;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

class DetailpenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {

    //    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    // 
    }

    /**
     * Store a newly created resource in storage.
     */

    // public function store(Request $request)
    // {
    //     $barcode = $request->input('id_barang');
    //     $scan = Barang::where('barcode', $barcode)->first();

    //     if($scan) {
            
    //         $qty = $request->input('qty');

    //         for ($i = 0; $i < $qty; $i++) {
            
            
    //     } return redirect()->back();
        
    //         } else {
    //             return redirect()->back()->with('error', 'Barang Tidak Ditemukan');
    //         } 

    //             $id = $request->id_barang;
    //             $barang = Barang::find($id);
                
    //             if($barang->stok < $request->jumlah) {
    //                 return redirect('/penjualan')->with('error', 'Stok barang tidak memenuhi !!');
    //             }
    //             $barang->decrement('stok', $request->jumlah);
    //             DetailPenjualan::create([
    //                 'nobon' => $request->nobon,
    //                 'id_barang' => $scan->id,
    //                 'harga' => $scan->harga,
    //                 'jumlah' => $qty,
    //             ]);
    //             return redirect()->back()->with('success', 'Stok berhasil diperbarui.');
    // }
    
    public function store(Request $request)
    {
    //    $request->validate([
    //     'id_barang' => 'required',
    //    ]);

    //    $id = $request->id_barang;
    //    $barang = Barang::find($id);
    //    dd($id);
        
        $barcode = $request->input('id_barang');
        $scan = Barang::where('barcode', $barcode)->first();
        
        // $request->validate([
        //     'nobon' => 'required',
        //     'id_barang' => 'required',   
        //     'harga' => 'required'
        // ]);
        // if($scan) {
         
        $qty = $request->input('qty');
       
            if($scan->stok < $qty) {
            return redirect()->back()->with('failed', 'Stock Barang Tidak Mencukupi');

            } else { 
            
            for ($i = 0; $i < $qty; $i++) {
                DetailPenjualan::create([
                    'nobon' => $request->nobon,
                    'id_barang' => $scan->id,
                    'harga' => $scan->harga,
                    'jumlah' => $qty,
                ]);
                $scan->decrement('stok', (int)$qty);
        
            return redirect()->back()->with('success','Barang Berhasil Dimasukan Ke Keranjang');
        }
        // } else {
        //     return redirect()->back()->with('error', 'Barang not found');
        // }
       
    // }
}
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penjualan = Penjualan::find($id);
        return view('update', compact('penjualan'));
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
        //  $detailpenjualan = DetailPenjualan::find($id);
        
        // $detailpenjualan->update([
        //     'total' =>1,
        //     'status' =>'selesai',
        // ]);
        // return redirect('/penjualan')->with('success', 'Berhasil');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_barang, $nobon)
    {
        $detail = DetailPenjualan::where('nobon', $nobon)
        ->where('id_barang', $id_barang);

        if ($detail) {
        $detail->delete();
    return redirect()->back()->with('success', 'Barang Berhasil Dihapus');
    } else {
        return redirect('/');
    }
}
}
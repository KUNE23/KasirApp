@extends('layouts.master')
@section('title','Penjualan')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Tambah Data Penjualan</h3>
                            <a class="btn btn-primary" href="/penjualan">Kembali</a>    
                            <div class="card-body">
                                <form action="/penjualan/scan" method="post">
                                    @csrf   
                                        <div class="mb-3">
                                            <input
                                                type="hidden"
                                                name="nobon"
                                                value="{{ $penjualan->id }}"
                                                id=""
                                            />
                                           
                                        </div>
                                        <div class="mb-3">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="id_barang"
                                                placeholder="Kode Barang"
                                                autofocus
                                                id="id_barang"
                                            />
                                            @if (session('error'))
                                                <p style="color : red"><i>Barang Tidak Ditemukan</i></p>
                                                @endif
                                           
                                        </div>
                                        <div class="col-1">
                                            <div class="mb-3">
                                             
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    name="qty"
                                                    min="1"
                                                    id="qty"
                                                    value="1"
                                                    required
                                                    aria-describedby="helpId"
                                                    placeholder=""
                                                />
                                               
                                            </div>
                                            <div class="col-md-1">
                                                <button type="submit" class="btn btn-primary">Check</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                </div>
                </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No. Bon</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Sub Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @foreach ($detailpenjualan as $detailpenjualan)
                            @php 
                            
                            $subtotal =
                            $detailpenjualan->barang->harga *
                            ($barangCounts[$detailpenjualan->id_barang] ?? 0);
                            
                            $total += $subtotal;
                            @endphp
                            
                            <tr class="">
                                <td>{{ $detailpenjualan->nobon }}</td>
                                <td>{{ $detailpenjualan->barang->nama_barang }}</td>
                                <td>{{ number_format($detailpenjualan->barang->harga) }}</td>
                                <td>{{ $barangCounts[$detailpenjualan->id_barang] ?? 0 }}</td>
                                <td>
                                    {{ $detailpenjualan->barang->harga * ($barangCounts[$detailpenjualan->id_barang] ?? 0) }}
                                </td>
                                <td>
                                    <a href="/detailpenjualan/delete/{{ $detailpenjualan->id_barang }}/{{ $detailpenjualan->nobon }}"
                                    class="btn btn-danger"><i class="fas fa-trash"></i></a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form action="/penjualan/update/{{ $penjualan->id}}" method="post">
                    <input type="hidden" value="{{$total}}" name="ttl">
                                @csrf   
                            <div class="mb-3">
                                <label for="" class="form-label">Bayar</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="bayar"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                            </div>
                            <div class="mb-3">
                                <label for="total" class="form-label">Total Belanja</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="subtotal"
                                    value="{{ $total }}"
                                    id="subtotal"
                                    aria-describedby="helpId"
                                    placeholder=""
                                    readonly
                                    />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Diskon</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="dds"
                                    id="dds"
                                    value="0"
                                    aria-describedby="helpId"
                                    placeholder=""
                                 />
                            </div>
                            Total
                            <h1 style="color: black">   
                                Rp. {{ number_format($total) }}
                                <br>
                                </h1>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <br>    
                        </form>
                </div>
            </div>
        </div>
</div>
@endsection

<script>
    @if(session('failed'))
    Swal.fire({
    icon: "failed",
    title: "Gagal",
    text: "{{ session('failed') }}",
    showConfirmButton: false,
    timer: 4000
  });
  @endif
  </script>
<script>
    @if(session('gagal'))
    Swal.fire({
    icon: "gagal",
    title: "Gagal",
    text: "{{ session('gagal') }}",
    showConfirmButton: false,
    timer: 4000
  });
  @endif
  </script>


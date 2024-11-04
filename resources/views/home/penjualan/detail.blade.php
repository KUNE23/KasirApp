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
              <h3>Halaman Detail Penjualan</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
                <!-- /.col-6 -->
                
                <div class="col-6">
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <div><h1>{{ $penjualan->barang->nama_barang }}</h1></div>
                        <hr>
                        <div>Rp. {{ number_format($penjualan->Barang->harga_jual) }}</div>
                        <div>{{ $penjualan->created_at }}</div>
                        <hr>
                        <div>Jumlah : {{ $penjualan->jumlah }}</div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <a class="btn btn-warning" href="/penjualan">Kembali</a>
                  <td><a class="btn btn-dark" href="/penjualan/receipt/{{ $penjualan->id }}">Struk</a></td>
                </div>
                <!-- /.col-6 -->
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
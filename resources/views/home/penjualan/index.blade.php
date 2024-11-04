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
                            <h3>Halaman Penjualan</h3>
                            <a class="btn btn-primary "href="/penjualan/tambah"
                            onclick="return confirm('Yakin Mau Buat Data Baru?')">Tambah</a>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Kasir</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Bayar</th>
                                                <th scope="col">Diskon</th>
                                                <th scope="col">Kembali</th>
                                                <th scope="col">Tanggal Transaksi</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            @foreach($penjualan as $penjualan)
                                            <tr class="">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $penjualan->user->nama }}</td>
                                                <td>{{ number_format($penjualan->total) }}</td>
                                                <td>{{ number_format($penjualan->bayar) }}</td>
                                                <td>{{ number_format($penjualan->diskon) }}</td>
                                                <td>{{ number_format($penjualan->kembali) }}</td>
                                                <td>{{ $penjualan->created_at }}</td>
                                                <td>{{$penjualan->status}}</td>
                                                <td>
                                                    @if ($penjualan->status == 'Belum Selesai')
                                                    <a class="btn btn-primary"
                                                    href="/penjualan/transaksi/{{ $penjualan->id }}">Lengkapi Transaksi
                                                </a>
                                                @else ($penjualan->status == 'Selesai')
                                                <a class="btn btn-primary" href="/penjualan"
                                                onclick="return confirm('Masih Dalam Pengembangan!!!')">Detail</a>
                                                @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
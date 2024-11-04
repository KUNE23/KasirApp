@extends('layouts.master')
@section('title','penjualan')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Hitung Uang</h3>
                            <a class="btn btn-primary" href="/penjualan/transaksi/{{ $penjualan->id }}">Kembali</a>
                        </div>
                            <div class="card-body">
                            <form action="/penjualan/update/{{ $penjualan->id}}" method="post">
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
                                    name="total"
                                    value="{{ $penjualan->total }}"
                                    id="total"
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Diskon</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="diskon"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
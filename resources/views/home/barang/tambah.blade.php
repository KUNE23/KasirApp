@extends('layouts.master')
@section('title','Barang')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Tambah Data Barang</h3>
                            <a class="btn btn-primary" href="/barang">Kembali</a>
                            <div class="card-body">
                            <form action="/barang/simpan" method="post" enctype="multipart/form-data">
                                @csrf   
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Barang</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nama_barang"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('nama_barang')
                                <div class="alert alert-danger mt-2">
                                 {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Harga</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="harga"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('harga')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Satuan</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="satuan"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('satuan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Stok</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="stok"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('stok')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">photo</label>
                                <input
                                    type="file"
                                    class="form-control"
                                    name="photo"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('photo')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Barcode</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="barcode"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('barcode')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
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
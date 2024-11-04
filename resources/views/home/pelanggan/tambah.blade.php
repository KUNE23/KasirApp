@extends('layouts.master')
@section('title','Pelanggan')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3>Halaman Tambah Data Pelanggan</h3>  
                          <a class="btn btn-primary" href="/pelanggan">Kembali</a>
                        <div class="card-body">
                        <form action="/pelanggan/simpan" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Pelanggan</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nama_pelanggan"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                />
                                @error('nama_pelanggan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">No Telepon</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    name="notelp"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                    />
                                    @error('notelp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Alamat</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="alamat"
                                    id=""
                                    aria-describedby="helpId"
                                    placeholder=""
                                    />
                                    @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">Simpan</button>
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
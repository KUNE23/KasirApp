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
                        <h3>Halaman Edit Data Pelanggan</h3>
                        <a class="btn btn-primary" href="/pelanggan">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form action="/pelanggan/update/{{ $pelanggan->id }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama Pelanggan</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nama_pelanggan"
                                        id=""
                                        value="{{ $pelanggan->nama_pelanggan}} "
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                   @error('nama_pelanggan')
                                   <div class="alert alet-danger mt-2">
                                    {{ $message }}
                                   </div>
                                   @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">No Telpon</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="notelp"
                                        id=""
                                    value=" {{ $pelanggan->notelp }}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                   @error('notelp')
                                   <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                   </div>
                                   @enderror
                                   <div class="mb-3">
                                    <label for="" class="form-label">Alamat</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="alamat"
                                        id=""
                                        value="{{ $pelanggan->alamat }}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                   </div>
                                   
                                </div>
                                <button class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection
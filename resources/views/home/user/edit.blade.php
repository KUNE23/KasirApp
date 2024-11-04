@extends('layouts.master')
@section('title','User')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Data Edit User</h3>
                            <a class="btn btn-primary" href="/user">Kembali</a>
                            <div class="card-body">
                            <form action="/user/update/{{$user->id}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">Nama User</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nama"
                                        id=""
                                        value="{{$user->nama}}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="username"
                                        id=""
                                        value="{{$user->username}}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('username')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">No Telpon</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="notelp"
                                        id=""
                                        value="{{$user->notelp}}"
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
                                    <label for="" class="form-label">Level</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="level"
                                        id=""
                                        value="{{$user->level}}"
                                        aria-describedby="helpId"
                                        placeholder=""
                                    />
                                    @error('level')
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
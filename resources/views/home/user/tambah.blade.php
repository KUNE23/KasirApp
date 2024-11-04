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
                            <h3>Halaman Tambah Data User</h3>
                            <a class="btn btn-primary" href="/user">Kembali</a>
                            <div class="card-body">
                                <form action="/user/simpan" method="post">
                                    @csrf
                      <div class="mb-3">
                        <label for="" class="form-label">Nama User</label>
                        <input
                            type="text"
                            class="form-control"
                            name="nama"
                            id=""
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
                        <label for="" class="form-label">Password</label>
                        <input
                            type="text"
                            class="form-control"
                            name="password"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                                    @error('password')
                                        <div class="alert alert-danger mt-2">
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
                                            aria-describedby="helpId"
                                            placeholder=""
                                        />
                                        
                                        @error('notelp')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <!-- <div class="mb-3">
                                    <label for="" class="form-label">Level</label>
                                    <select name="level" id="" class="form-control">
                                        <option value="">Pilih Level</option>
                                        @foreach($user as $user)
                                        <option value="{{ $user->level }}">Admin</option>
                                        <option value="{{ $user->level }}">kasir</option>
                                        @endforeach
                                    </select> -->
                                    <div class="mb-3">
                                        <label for="" class="form-label">Levelda</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="level"
                                            id=""
                                            aria-describedby="helpId"
                                            placeholder=""
                                        />
                                        
    @error('level')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
</div>
<button class="btn btn-primary" type="submit">Save</button>

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
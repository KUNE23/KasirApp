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
                        <h3>Halaman Data Pelanggan</h3>
                        <a class="btn btn-primary" href="/pelanggan/tambah">Tambah</a>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>

                                        <tr class="">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">No Telpon</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Aksi</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach($pelanggan as $pelanggan)
                                        <tr class="">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pelanggan->nama_pelanggan }}</td>
                                            <td>{{ $pelanggan->notelp }}</td>
                                            <td>{{ $pelanggan->alamat }}</td>
                                            <td><a class="btn btn-danger" href="/pelanggan/delete/{{ $pelanggan->id }}"
                                            type="submit" onclick="konfirmasihapus(event,'{{$pelanggan->id}}')">Hapus</a>
                                            <a class="btn btn-warning" href="/pelanggan/show/{{ $pelanggan->id }}">Edit</a>
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
    </section>
</div>
<script>
    function konfirmasihapus(event, id) {
        event.preventDefault(); // Prevent the default link click behavior
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                }).then(() => {
                    // Navigate to the delete URL after the confirmation
                    window.location.href = '/user/delete/' + id;
                });
            }
        });
    }
</script>   
@endsection
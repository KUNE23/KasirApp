@extends('layouts.master')
@section ('title', 'User')
@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h3>Halaman Data User</h3>
                        <a class="btn btn-primary" href="/user/tambah">Tambah</a>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered table-stripped table-bordered data">
                                    <thead>
                               <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">No Telpon</th>
                                <th scope="col">Level</th>
                                <th scope="col">Action</th> 
</tr>
</thead>
<tbody>
@foreach($user as $user)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{$user->nama}}</td>
    <td>{{ $user->username}}</td>
    <td>{{$user->notelp}}</td>
    <td>{{$user->level}}</td>
    <td><a class="btn btn-warning" href="/user/show/{{$user->id}}">Edit</a>
        <a class="btn btn-danger" href="/user/delete/{{$user->id}}" 
        type="submit" onclick="konfirmasihapus(event, '{{ $user->id}}' )">Delete</a></td>
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
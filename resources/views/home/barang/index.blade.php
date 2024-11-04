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
                            <h3>Halaman Data Barang</h3>
                            <a class="btn btn-primary" href="/barang/tambah">Tambah</a>
                            <div class="card-body">
 <div clas="table-responsive">
<table class="table table-bordered table-stripped table-bordered data">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga</th>
            <th scope="col">Satuan</th>
            <th scope="col">Stok</th>
            <th scope="col">Photo</th>
            <th scope="col">Action</th>
</tr>
</thead>
</div>
<tbody>
    @foreach($barang as $barang)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $barang->nama_barang }}</td>
        <td>Rp. {{ number_format($barang->harga) }}</td>
        <td>{{ $barang->satuan }}</td>
        <td>{{ $barang->stok }}</td>
        <td class="text-center">
             <img src="{{  asset('/storage/' . $barang->photo) }}"
            class="rounded" style="width: 150px">
        </td>
        <td><a class="btn btn-primary" href="/barang/show/{{$barang->id}}">Edit</a>
            <a class="btn btn-danger" href="/barang/delete/{{$barang->id}}"
            type="submit" onclick="konfirmasihapus(event, '{{ $barang->id }} ')">Delete</a>
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
                window.location.href = '/barang/delete/' + id;
            });
        }
    });
}
</script>

@endsection

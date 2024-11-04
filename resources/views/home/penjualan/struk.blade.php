**Struk Belanja**

**Kasir:** 
**ID Penjualan:** {{ $penjualan->id  }}
**Waktu:** {{ $penjualan->created_at }}

**Daftar Barang:**

| Nama Barang | Jumlah | Harga | Subtotal |
| --- | --- | --- | --- |
@foreach($penjualan->barang as $barang)
| {{ $barang->nama }} | {{ $barang->jumlah }} | {{ $barang->harga }} | {{ $barang->subtotal }} |
@endforeach

**Total:** {{ $penjualan->total }}
**Diskon:** {{ $penjualan->diskon }}
**Kembalian:** {{ $penjualan->kembalian }}

**Terima Kasih Atas Pembelian Anda!**
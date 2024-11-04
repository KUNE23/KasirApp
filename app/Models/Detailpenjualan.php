<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpenjualan extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function Penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'nobon', 'id');
    }

    public function Barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }
}

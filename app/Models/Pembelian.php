<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'nota_belis';

    protected $fillable = [
        'kode_nota',
        'supplier_id',
        'toko_id',
        'tgl_pesan',
        'tgl_terima',
        'tgl_bayar',
        'status',
        'grand_total',
        'keterangan',
    ];

    public function produktokos()
    {
        return $this->belongsToMany(ProdukToko::class, 'nota_beli_details', 'id', 'id');
    }

    public function pelanggans()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }



}

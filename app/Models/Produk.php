<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class,'detail_transaksis','id', 'id');
    }

    public function merks()
    {
        return $this->belongsTo(Merk::class);
    }

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function ruangans()
    {
        return $this->belongsToMany(Ruangan::class, 'produk_ruangans');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    use HasFactory;

    protected $table = 'nota_beli_details';

    public $timestamps = false;

    protected $fillable = [
        'nota_beli_id',
        'produk_id',
        'harga',
        'qty',
        'subtotal',
    ];
}

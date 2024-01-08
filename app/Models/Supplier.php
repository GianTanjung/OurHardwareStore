<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'no_hp',
        'email',
        'alamat',
        'kecamatan',
        'kota',
        'provinsi',
        'negara',
        'kode_pos',
        'keterangan',
    ];

    public function pembelians()
    {
        return $this->hasMany(Pembelian::class);
    }
}

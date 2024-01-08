<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama',
        'no_hp',
        'alamat',
        'kode_pos',
        'kecamatan',
        'kota',
        'provinsi',
        'negara',
        'poin',
        'saldo',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

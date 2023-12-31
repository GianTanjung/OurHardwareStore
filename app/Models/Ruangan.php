<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'nama',
    ];

    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'produk_ruangans');
    }
}

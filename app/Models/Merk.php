<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'foto_merk',
    ];

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}

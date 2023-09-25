<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

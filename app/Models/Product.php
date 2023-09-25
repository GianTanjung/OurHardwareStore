<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'produks';
    // protected $primaryKey = 'id';
    // public $incrementing = true;
    // protected $keyType = 'integer';
    use HasFactory;

    public function transaksis()
    {
        return $this->belongsToMany(Transaksi::class);
    }

    public function merks()
    {
        return $this->belongsTo(Merk::class);
    }
}

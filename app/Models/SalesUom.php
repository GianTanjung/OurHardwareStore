<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesUom extends Model
{
    use HasFactory;
    protected $table = 'sales_uoms';

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use HasFactory;
    protected $table = 'riwayat_dompets';
    protected $fillable = [
        'dana',
        'arus',
        'validasi_topup',
        'tanggal',
        'bukti_transfer',
        'pelanggan_id',
    ];

    public function pelanggans()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}

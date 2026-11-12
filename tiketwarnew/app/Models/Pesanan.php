<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesanan extends Model
{
    public const MENUNGGU_BAYAR = 'menunggu_bayar';
    public const LUNAS = 'lunas';
    public const BATAL = 'batal';

    protected $fillable = [
        'konser_id',
        'nama_pemesan',
        'email',
        'jumlah',
        'harga_satuan',
        'total',
        'status',
    ];

    public function konser(): BelongsTo
    {
        return $this->belongsTo(Konser::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Konser extends Model
{
    protected $fillable = [ // BARU
        'promotor_id',
        'nama',
        'kota',
        'harga',
        'sisa',
        'tanggal',
    ];

    public function promotor(): BelongsTo // BARU: satu konser, satu promotor
    {
        return $this->belongsTo(Promotor::class);
    }
}
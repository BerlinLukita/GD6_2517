<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Konser extends Model
{
    protected $fillable = [
        'promotor_id',
        'nama',
        'kota',
        'harga',
        'sisa',
        'tanggal',
        'deskripsi',
    ];

    public function promotor(): BelongsTo
    {
        return $this->belongsTo(Promotor::class);
    }
}

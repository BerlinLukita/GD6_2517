<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Konser extends Model
{
    protected $fillable = [
        'promotor_id',
        'nama',
        'kota',
        'harga',
        'sisa',
        'tanggal',
    ];

    public function promotor(): BelongsTo
    {
        return $this->belongsTo(Promotor::class);
    }

    public function pesanans(): HasMany
    {
        return $this->hasMany(Pesanan::class);
    }
}
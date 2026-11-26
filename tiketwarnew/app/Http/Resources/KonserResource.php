<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KonserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
    return [
        'id' => $this->id,
        'nama' => $this->nama,
        'kota' => $this->kota,
        'harga' => $this->harga,
        'sisa' => $this->sisa,
        'tanggal' => $this->tanggal,
        'promotor' => $this->whenLoaded('promotor', fn () => $this->promotor->nama),
        ];
    }
}


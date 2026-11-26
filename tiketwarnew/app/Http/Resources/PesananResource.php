<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PesananResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'konser_id'     => $this->konser_id,
            'nama_pemesan'  => $this->nama_pemesan,
            'email'         => $this->email,
            'jumlah'        => $this->jumlah,
            'harga_satuan'  => $this->harga_satuan,
            'total'         => $this->total,
            'status'        => $this->status,
            'dibuat'        => $this->created_at?->toDateTimeString(),
        ];
    }
}
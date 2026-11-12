<?php

namespace Database\Seeders;

use App\Models\Konser;
use App\Models\Pesanan;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        $coldplay = $this->cariKonser('Coldplay - Music of the Spheres');
        $dwdm = $this->cariKonser('Dewa 19 - Pesta Rakyat');
        $pantai = $this->cariKonser('Festival Musik Pantai');
       $akustik = $this->cariKonser('Malam Akustik Kota');

        $this->buat(
            $coldplay, 'Budi Santoso', 'budi@gmail.test', 2, Pesanan::LUNAS, 6
        );

        $this->buat(
            $dwdm, 'Rina Wijaya', 'rina@gmail.test', 4, Pesanan::LUNAS, 5
        );

        $this->buat(
            $pantai, 'Agus Pratama', 'agus@gmail.test', 2, Pesanan::BATAL, 4
        );

        $this->buat(
            $coldplay, 'Siti Aminah', 'siti@gmail.test', 1, Pesanan::MENUNGGU_BAYAR, 3
        );

        $this->buat(
            $akustik, 'Dedi Lestari', 'dedi@gmail.test', 3, Pesanan::LUNAS, 2
        );

        $this->buat(
            $dwdm, 'Hendra Gunawan', 'hendra@gmail.test', 2, Pesanan::MENUNGGU_BAYAR, 1
        );
    }

    private function cariKonser(string $nama): Konser
    {
        return Konser::where('nama', $nama)->firstOrFail();
    }

    private function buat(
        Konser $konser,
        string $nama,
        string $email,
        int $jumlah,
        string $status,
        int $hariLalu
    ): void {
        $pesanan = new Pesanan([
            'konser_id' => $konser->id,
            'nama_pemesan' => $nama,
            'email' => $email,
            'jumlah' => $jumlah,
            'harga_satuan' => $konser->harga,
            'total' => $konser->harga * $jumlah,
            'status' => $status,
        ]);

        $pesanan->created_at = now()->subDays($hariLalu);
        $pesanan->save();

        // Pesanan yang tidak batal sudah memakai stok konser.
        if ($status !== Pesanan::BATAL) {
            $konser->decrement('sisa', $jumlah);
        }
    }
}

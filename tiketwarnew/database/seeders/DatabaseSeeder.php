<?php

namespace Database\Seeders;

use App\Models\Konser;
use App\Models\Promotor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $nusantara = Promotor::create([
            'nama' => 'Nusantara Live',
            'kontak' => 'kontak@nusantaralive.test',
        ]);

        $harmoni = Promotor::create([
            'nama' => 'Harmoni Entertainment',
            'kontak' => 'info@harmoni.test',
        ]);

        $jogja = Promotor::create([
            'nama' => 'Jogja Sound Project',
            'kontak' => 'halo@jogasound.test',
        ]);

        Konser::create([
            'promotor_id' => $nusantara->id,
            'nama' => 'Coldplay - Music of the Spheres',
            'kota' => 'Jakarta',
            'harga' => 1500000,
            'sisa' => 25,
            'tanggal' => '2027-03-15',
        ]);

        Konser::create([
            'promotor_id' => $nusantara->id,
            'nama' => 'NCT Dream - The Dream Show',
            'kota' => 'Jakarta',
            'harga' => 1200000,
            'sisa' => 30,
            'tanggal' => '2027-04-02',
        ]);

        Konser::create([
            'promotor_id' => $jogja->id,
            'nama' => 'Dewa 19 - Pesta Rakyat',
            'kota' => 'Yogyakarta',
            'harga' => 450000,
            'sisa' => 120,
            'tanggal' => '2027-02-20',
        ]);

        Konser::create([
            'promotor_id' => $harmoni->id,
            'nama' => 'Festival Musik Pantai',
            'kota' => 'Bali',
            'harga' => 600000,
            'sisa' => 8,
            'tanggal' => '2027-05-10',
        ]);

        Konser::create([
            'promotor_id' => $harmoni->id,
            'nama' => 'Malam Akustik Kota',
            'kota' => 'Bandung',
            'harga' => 250000,
            'sisa' => 60,
            'tanggal' => '2027-01-30',
        ]);

        $this->call(PesananSeeder::class); 

    }
}

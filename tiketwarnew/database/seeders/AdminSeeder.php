<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $email = config('admin.email');
        $password = config('admin.password');

        if (blank($email) || blank($password)) {
            $this->command->error('ADMIN_EMAIL dan ADMIN_PASSWORD belum diisi di .env.');

            return;
        }

        User::updateOrCreate(
            ['email' => $email],
            ['name' => config('admin.name'), 'password' => $password],
        );
    }
}
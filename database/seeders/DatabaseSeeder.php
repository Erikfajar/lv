<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Pelanggan::factory(20)->create();
        \App\Models\Produk::factory(20)->create();

        User::create([
            'username' => 'erikFajar',
            'email' => 'erik@gmail.com',
            'password' => Hash::make('12345678'),
            'nama_lengkap' => 'Erik Fajar Krisnawan',
            'role' => 'administrator'
        ]);

    }
}

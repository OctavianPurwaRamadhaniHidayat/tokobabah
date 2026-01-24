<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'nama' => 'Babah',
            'email' => 'babah@gmail.com',
            'password' => Hash::make('babah123'),
        ]);
    }
}
